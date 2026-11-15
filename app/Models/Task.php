<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Task extends Model
{
use HasFactory;
   protected $fillable=[
    'title',
    'isCompleted',
    'team_user_id'

   ];

  public function team_user(): BelongsTo
    {
       return $this->belongsTo(Team_user::class);
    }

}
