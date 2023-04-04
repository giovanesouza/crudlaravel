<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // fillable => Ao instanciar o basta passar os dados para o construtor 
    protected $fillable = [
        'title', 'content', 'author'
    ];

    use HasFactory;
}
