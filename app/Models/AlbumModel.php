<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlbumModel extends Model
{
    use HasFactory;

    protected $table = 'albums';
    protected $fillable = ['title', 'description', 'image', 'created_by', 'updated_by'];

    public function createdBy(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'created_by');
    }

    public function updatedBy(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'updated_by');
    }
}
