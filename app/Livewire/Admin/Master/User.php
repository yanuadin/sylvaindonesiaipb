<?php

namespace App\Livewire\Admin\Master;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Component;

class User extends Component
{
    use PasswordValidationRules;
    /**
     * @description : form
     */
    public string $name = '';
    public string $username = '';
    public string $password = '';
    public string $password_confirmation = '';
    public string $search = '';

    /**
     * @description : other
     */
    public string $titleModal = 'Tambah User';
    public string $dataModal = 'create-user-modal';
    public array $tableHead = ['name' => 'Name', 'username' => 'Username'];
    public string $submitMethod = 'store';
    public bool $isEditMode = false;
    public bool $isViewMode = false;
    public UserModel $user;

    public function render()
    {
        $search = $this->search;
        $users = UserModel::query()
            ->when(!empty($search), function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")->orWhere('username', 'like', "%{$search}%");
            })
            ->paginate(10)
            ->withQueryString();

        return view('livewire.admin.master.user')->with(['users' => $users]);
    }

    public function rules(UserModel $user = null): array
    {
        if ($user === null) {
            $rules = [
                'name' => ['required', 'string', 'max:255'],
                'username' => ['required', 'string', 'max:255', 'unique:users,username'],
                'password' => $this->passwordRules(),
                'password_confirmation' => ['required', 'string'],
            ];
        } else {
            $rules = [
                'name' => ['required', 'string', 'max:255'],
                'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            ];
        }

        return $rules;
    }

    public function store(): void
    {
        $validated = $this->validate($this->rules());

        UserModel::query()->create([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
        ]);

        $this->redirectRoute('admin.master.user');
    }

    public function update(): void
    {
        $validated = $this->validate($this->rules($this->user));

        $this->user->name = $validated['name'];
        $this->user->username = $validated['username'];
        $this->user->save();

        $this->redirectRoute('admin.master.user');
    }

    public function delete(UserModel $user): void
    {
        $user->delete();

        $this->redirectRoute('admin.master.user');
    }

    public function showViewModal(UserModel $user): void
    {
        $this->submitMethod = '';
        $this->titleModal = 'Lihat User';
        $this->isViewMode = true;

        $this->fillVariable($user);
    }

    public function showEditModal(UserModel $user): void
    {
        $this->submitMethod = 'update';
        $this->titleModal = 'Edit User';
        $this->isEditMode = true;

        $this->fillVariable($user);
    }

    private function fillVariable(UserModel $user): void
    {
        $this->name = $user->name;
        $this->username = $user->username;
        $this->user = $user;
    }

    /**
    * @description : default resetting all form
    */
    #[On('resetForm')]
    public function resetForm(): void
    {
        $this->reset();
    }
}
