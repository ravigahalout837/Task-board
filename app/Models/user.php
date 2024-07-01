<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class user extends Model
{
    use HasFactory;
    use HasApiTokens;
    protected $fillable = ['name', 'email', 'password'];

    
    public function boards()
    {
        return $this->hasMany(Board::class);
    }
}
