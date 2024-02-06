<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class CourseCategory extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['user_id', 'name', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
