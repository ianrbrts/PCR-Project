<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;

    protected $fillable = [
        'taskdesc',
        'priority',
        'dueDate',
        'status',
        'assignedto',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    // method for checking if a task has been created by the logged in user
    // here for delete button functionality
    public function createdByMe(User $user){
        return $user->id == $this->user_id;
    }

}
