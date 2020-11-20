<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Kodeine\Metable\Metable;

class SiteSettings extends Model
{
    use Metable;

    protected $guarded = ['id'];

    protected $metaTable = 'site_settings_meta';
}
