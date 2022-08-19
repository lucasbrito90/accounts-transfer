<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Transaction extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'amount', 'type'
    ];

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
}
