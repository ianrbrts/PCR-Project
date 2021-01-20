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

}
