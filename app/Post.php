<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use Carbon\Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;

class Post extends Model
{
    use SoftDeletes;

    protected $dates = ['published_at'];
    protected $fillable = ['title'];

    public function getImageUrlAttribute($value)
    {

        $imageUrl = "";
        if (!is_null($this->image)) {

            $imagePath = public_path() . "/img/" . $this->image;
            if (file_exists($imagePath)) $imageUrl = asset("img/thumb_" . $this->image);
        }
        return $imageUrl;
    }


    public function user()

    {
        return $this->belongsTo(User::class);
    }
    public function setPublishedAtAttribute($value)
    {
        $this->attributes['published_at'] = $value ?: NULL;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function getDateAttribute($value)
    {
        return is_null($this->published_at) ? '' : $this->published_at->diffForHumans();
    }

    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
    public function scopePublished($query)
    {
        return $query->where("published_at", "<=", Carbon::now());
    }
    public function scopeScheduled($query)
    {
        return $query->where("published_at", ">=", Carbon::now());
    }
    public function scopeDraft($query)
    {
        return $query->whereNull("published_at");
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function dateFormatted($showTimes = false)
    {
        $format = "d/m/y";
        if ($showTimes) $fotmat = $format . "H:i:s";
        return $this->created_at->format($format);
    }
    public function isFuture()
    {
        return $this->published_at >= Carbon::now();
    }
    public function publicationLabel()
    {
        if (!$this->published_at) {
            return '<span class="label label-warning">Draft</span>';
        } elseif ($this->published_at && $this->published_at->isFuture()) {
            return '<span class="label label-info">Scheduled</span>';
        } else {
            return '<span class="label label-success">Published</span>';
        }
    }
    public function getBodyHtmlAttribute($value)
    {
        return $this->body ? Markdown::convertToHtml($this->body) : NULL;
    }
    public function getExcerptHtmlAttribute($value)
    {
        return $this->excerpt ? Markdown::convertToHtml($this->excerpt) : NULL;
    }
}
