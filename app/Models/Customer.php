<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    use HasFactory;
    use Notifiable;

    protected $with = ['wallets'];

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password'
    ];
    public function wallets()
    {
        return $this->hasOne(Wallet::class);
    }
}
