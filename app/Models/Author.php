<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Author extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = ['first_name', 'last_name','country','description','email','password'];
}
