<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use GrahamCampbell\Markdown\Facades\Markdown;

class User extends Authenticatable
{
    use Notifiable;

/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name', 'email', 'password','bio', 'profile'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



public function posts()
    {
        return $this->hasMany(Post::class , 'author_id');
    }

    public function getBioHtmlAttribute($value){

    return $this->bio ? Markdown::convertToHtml(e($this->bio)): NULL;
}

public function getProfileUrlAttribute($value){

    $profileUrl = "";

    if ( ! is_null($this->profile))

  {

    $profilePath = public_path(). '/avatar/'.$this->profile;
    if (file_exists($profilePath)) $profileUrl = asset('avatar/'. $this->profile);
  }

  return $profileUrl;
}


public function setPasswordAttribute($value)
{
    if (!empty($value)) $this->attributes['password'] = bcrypt($value);
}




}