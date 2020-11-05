<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habits extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'habits';

    protected $fillable = [
        'title',
        'photo1x',
        'photo2x',
        'photo3x',
        'active',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
