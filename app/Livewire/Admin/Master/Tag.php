<?php

namespace App\Livewire\Admin\Master;

use App\Models\TagModel;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\Attributes\On;

class Tag extends Component
{
    /**
     * @description : form
     */
    public string $code = '';
    public string $name = '';
    public string $search = '';

    /**
     * @description : other
     */
    public string $titleModal = 'Tambah Tag';
    public string $dataModal = 'create-tag-modal';
    public array $tableHead = ['code' => 'Kode', 'name' => 'Nama Tag'];
    public string $submitMethod = 'store';
    public bool $isEditMode = false;
    public bool $isViewMode = false;
    public TagModel $tag;

    public function render()
    {
        $search = $this->search;

        $tags = TagModel::query()
            ->when(!empty($search), function ($q) use ($search) {
                $q->where('code', 'like', "%{$search}%")
                    ->orWhere('name', 'like', "%{$search}%");
            })
            ->orderBy('updated_at', 'DESC')
            ->paginate(10)
            ->withQueryString();

        return view('livewire.admin.master.tag')->with(['tags' => $tags]);
    }

    public function rules(TagModel $tag = null): array
    {
        $rule_code = $tag === null ?
            ['required', 'string', 'max:255', Rule::unique('tags')] :
            ['required', 'string', 'max:255', Rule::unique('tags')->ignore($tag->id)];

        return [
            'code' => $rule_code,
            'name' => ['required', 'string']
        ];
    }

    public function store(): void
    {
        $validated = $this->validate($this->rules());

        TagModel::query()->create([
            'code' => $validated['code'],
            'name' => $validated['name'],
        ]);

        $this->redirectRoute('admin.master.tag');
    }

    public function update(): void
    {
        $validated = $this->validate($this->rules());

        $this->tag->code = $validated['code'];
        $this->tag->name = $validated['name'];
        $this->tag->save();

        $this->redirectRoute('admin.master.tag');
    }

    public function delete(TagModel $tag): void
    {
        $tag->delete();

        $this->redirectRoute('admin.master.tag');
    }

    public function showViewModal(TagModel $tag): void
    {
        $this->submitMethod = '';
        $this->titleModal = 'Lihat Tag';
        $this->isViewMode = true;

        $this->fillVariable($tag);
    }

    public function showEditModal(TagModel $tag): void
    {
        $this->submitMethod = 'update';
        $this->titleModal = 'Edit Tag';
        $this->isEditMode = true;

        $this->fillVariable($tag);
    }

    private function fillVariable(TagModel $tag): void
    {
        $this->code = $tag->code;
        $this->name = $tag->name;
        $this->tag = $tag;
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
