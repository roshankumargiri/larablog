<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Post;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use LaratrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function getImageUrlAttribute($value)
    {

        $imageUrl = "";
        if (!is_null($this->gavatar)) {

            $imagePath = public_path() . "/img/" . $this->gavatar;
            if (file_exists($imagePath)) $imageUrl = asset("img/thumb_" . $this->gavatar);
        }
        return $imageUrl;
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
