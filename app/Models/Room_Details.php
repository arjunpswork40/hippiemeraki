<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room_Details extends Model
{
    use HasFactory;

    protected $table = 'room_details';

    protected $fillable = [
        'category',
        'total_room_count',
        'available_room_count',
        'thumbnail_image',
        'status',
        'rate',
        'priority',
    ];

    public $timestamps = false;

    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
