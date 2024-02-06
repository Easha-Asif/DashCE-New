<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Course extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['user_id', 'category_id', 'name', 'date', 'expiration_date', 'renewal_date', 'exam','interaction' ,'length' ,'credit_earn' ,'module', 'cal_length', 'description', 'sub_title', 'state', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(CourseCategory::class, 'category_id');
    }
}
