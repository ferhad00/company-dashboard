<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class User extends Authenticatable
{use HasFactory;
    protected $fillable=[
          'username',
          'password',
          'isAdmin'

    ];
    protected $hidden=['password'];

    public function team(): HasMany
    {
       return $this->hasMany(Team::class);
    }
    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class,'team_user','user_id','team_id')->withPivot('id');

    }

}
