<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class MiniModule extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['course_id', 'module_id', 'user_id', 'name', 'display_name', 'time', 'status'];

    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }
}
