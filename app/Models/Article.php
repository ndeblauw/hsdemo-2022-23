<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Article extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $guarded = [];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    // Custom attributes ------------------------------------------------------
    public function getSummaryAttribute()
    {
        return $this->title.' by '.$this->author->name;
    }

    public function getAgeAttribute(): string
    {
        return $this->published_at->diffInDays().' days';
    }

    // Model Relations ---------------------------------------------------------
    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function keywords()
    {
        return $this->belongsToMany(Keyword::class);
    }

    // Scopes --------------------------------------------------------------------
    public function scopeOutdated($query, $days = 20)
    {
        return $query->where('published_at', '<', today()->subDays($days));
    }

    public function scopeEditableByLoggedInUser($query)
    {
        if (auth()->user()->is_admin) {
            return $query;
        }

        return $query->where('author_id', auth()->id());
    }

    // Other functions -----------------------------------------------------------
    public function canEdit(?int $user_id = null)
    {
        // admins can always edit
        if (auth()->user()->is_admin) {
            return true;
        }

        // If no user is given, use the logged in user
        if ($user_id === null) {
            $user_id = auth()->id();
        }

        // Only author is allowed to edit
        return $this->author_id === $user_id;
    }

    // Media conversions ---------------------------------------------------------
    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('thumbnail')
            ->fit(Manipulations::FIT_CROP, 50, 50)
            ->nonQueued();
        $this
            ->addMediaConversion('header')
            ->fit(Manipulations::FIT_CROP, 800, 200)
            ->nonQueued();
    }
}
