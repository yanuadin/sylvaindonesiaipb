<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $fillable = ['type', 'title', 'slug', 'tags', 'content', 'image', 'is_public', 'student_name', 'student_year', 'created_by', 'updated_by'];
    public const TYPE_ARTICLE = 'article';
    public const TYPE_SYLVA_NEWS = 'sylva_news';
    public const TYPE_SYLVA_DISCUSSION = 'sylva_discussion';
    public const TYPE_SYLVA_TRAINING = 'sylva_training';

    public static function getTypes(): array
    {
        return [
            self::TYPE_ARTICLE,
            self::TYPE_SYLVA_NEWS,
            self::TYPE_SYLVA_DISCUSSION,
            self::TYPE_SYLVA_TRAINING,
        ];
    }

    public function createdBy(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'created_by');
    }

    public function updatedBy(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'updated_by');
    }
}
