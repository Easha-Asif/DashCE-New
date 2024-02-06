<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Interaction extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['course_id', 'module_id', 'mini_module_id', 'user_id', 'name', 'badge', 'type', 'time', 'status'];

    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }

    public function minimodule()
    {
        return $this->belongsTo(MiniModule::class, 'mini_module_id');
    }
}
