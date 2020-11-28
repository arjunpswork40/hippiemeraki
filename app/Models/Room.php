<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;


    protected $table = 'rooms';

    protected $fillable = [
        'thumbnail_image',
        'category_name',
        'status',
    ];

    public $timestamps = false;

    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
