<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class PromoCode extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['user_id', 'name', 'code', 'discount_type', 'discount', 'status'];

    public function brokerageid()
    {
        return $this->belongsTo(User::class, 'Brokerage_id');
    }
}
