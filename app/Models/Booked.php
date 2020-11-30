<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booked extends Model
{
    use HasFactory;

    protected $table = 'bookeds';

    protected $fillable = [
        'check_in',
        'check_out',
        'guest_count',
        'booked_room_count',
        'category',
        'guest_name',
        'guest_phone_number',
        'guest_permanent_address',
        'guest_ID_proof'
    ];

    public $timestamps = false;

    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
