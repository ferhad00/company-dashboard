<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasMany;
use \Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Team_user extends Pivot
{
    use HasFactory;
    protected $table='team_user';
    protected $fillable=[
        'user_id',
        'team_id',
    ];
    public function tasks(): HasMany
    {
       return $this->hasMany(Task::class,'team_user_id');
    }



}

