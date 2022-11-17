<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Article extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    //protected $fillable = ['title', 'body'];
    protected $guarded = [];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function keywords()
    {
        return $this->belongsToMany(Keyword::class);
    }


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
