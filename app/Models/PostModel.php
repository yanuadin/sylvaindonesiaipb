<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class PostModel extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $fillable = ['type', 'title', 'slug', 'tags', 'content', 'image', 'status', 'student_name', 'student_year', 'created_by', 'updated_by'];
    public const TYPE_ARTICLE = 'article';
    public const TYPE_SYLVA_NEWS = 'sylva_news';
    public const TYPE_SYLVA_DISCUSSION = 'sylva_discussion';
    public const TYPE_SYLVA_TRAINING = 'sylva_training';
    public const STATUS_PUBLIC = 'public';
    public const STATUS_PRIVATE = 'private';

    protected function tags(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => TagModel::query()->whereIn('code', json_decode($value))->get()->toArray(),
        );
    }

    public static function getTypes(): array
    {
        return [
            [
                'text' => 'Artikel',
                'value' => self::TYPE_ARTICLE,
            ],
            [
                'text' => 'Sylva News',
                'value' => self::TYPE_SYLVA_NEWS,
            ],
            [
                'text' => 'Silva Discussion',
                'value' => self::TYPE_SYLVA_DISCUSSION,
            ],
            [
                'text' => 'Sylva Training',
                'value' => self::TYPE_SYLVA_TRAINING,
            ],
        ];
    }

    public static function getStatuses(): array
    {
        return [
            [
                'text' => 'Publik',
                'value' => self::STATUS_PUBLIC,
            ],
            [
                'text' => 'Privat',
                'value' => self::STATUS_PRIVATE
            ],
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
