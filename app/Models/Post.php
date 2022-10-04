<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/* php artisan make:model Post -fc para crear modelo Post con su factory y controlador */

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'body',
    ];

    public function user(){
        return $this->BelongsTo(User::class);
    }
}
