<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class PostModel extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $fillable = ['type', 'title', 'slug', 'tags', 'content', 'image', 'is_public', 'student_name', 'student_year', 'created_by', 'updated_by'];
    public const TYPE_ARTICLE = 'article';
    public const TYPE_SYLVA_NEWS = 'sylva_news';
    public const TYPE_SYLVA_DISCUSSION = 'sylva_discussion';
    public const TYPE_SYLVA_TRAINING = 'sylva_training';
    public const TAG_NEWS = 'news';
    public const TAG_SCIENCE = 'sains';
    public const TAG_HOT = 'hot';

    protected function tags(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => array_map(function ($tag) {
                return self::getTag($tag)[0];
            }, json_decode($value)),
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

    public static function getTags(): array
    {
        return [
            [
                'text' => 'Berita',
                'value' => self::TAG_NEWS,
            ],
            [
                'text' => 'Sains',
                'value' => self::TAG_SCIENCE,
            ],
            [
                'text' => 'Trending',
                'value' => self::TAG_HOT,
            ],
        ];
    }

    public static function getTag($tagValue): array
    {
        return array_values(array_filter(PostModel::getTags(), function ($tag) use ($tagValue) {
            return $tag['value'] == $tagValue;
        }));
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
