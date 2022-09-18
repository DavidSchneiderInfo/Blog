<?php

namespace App\Models;

use App\Models\Traits\ExportsDatetimeValues;
use DateTimeInterface;
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
    use ExportsDatetimeValues;

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

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden
        = [
            'id',
            'user_id',
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

    /**
     * Prepare a date for array / JSON serialization.
     */
    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }
}
