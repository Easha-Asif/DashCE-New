<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class License extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['user_id', 'type', 'date', 'name', 'state', 'expiration_date', 'license', 'status', 'brokerage_name', 'Brokerage_id'];

    public function brokerageid()
    {
        return $this->belongsTo(User::class, 'Brokerage_id');
    }
}
