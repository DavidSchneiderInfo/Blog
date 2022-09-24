<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static findOrFail(int $postId)
 * @property string $summary
 * @property string $content
 */
class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable
        = [
            'title',
            'content',
        ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getSummaryAttribute()
    {
        $summary = strip_tags($this->content);

        if (strlen($summary) < 250) {
            return $summary;
        }

        $summary = substr($summary, 0, 250);

        return substr($summary, 0, strrpos($summary, ' '));
    }
}
