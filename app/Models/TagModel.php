<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagModel extends Model
{
    use HasFactory;

    protected $table = 'tags';
    protected $fillable = ['code', 'name'];
}
