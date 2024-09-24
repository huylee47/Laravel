<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    protected $table = 'account';
    use SoftDeletes;
     protected $fillable = [
        'account_id',
        'username',
        'password',
        'role',

     ];
}
