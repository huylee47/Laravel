<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Accounts extends Authenticatable
{

   use HasFactory, HasApiTokens;
   protected $table = 'accounts';
   protected $fillable = [
      'account_id',
      'username',
      'password',
      'role',
   ];
   public function isAdmin()
   {
      return $this->role === 1;
   }
   public function isUser()
   {
      return $this->role === 0;
   }
}
