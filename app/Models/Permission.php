<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Permission extends \Spatie\Permission\Models\Permission
{
    use LogsActivity;

    protected $primaryKey='id';
    public $incrementing=false;
    protected $guarded=[];

}
