<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pasteSetting extends Model
{
    protected $table= "paste_settings";
    protected $fillable =[
        "paste_id", "category_id",
        'paste_expiration', 'paste_privacy',
        "password","paste_custom_name",
    ];

}
