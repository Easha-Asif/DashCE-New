<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Exam extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['course_id', 'user_id', 'name', 'where', 'type', 'placement', 'status'];
}
