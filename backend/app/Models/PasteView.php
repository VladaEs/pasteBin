<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasteView extends Model
{
    protected $table = "paste_views";
    protected $fillable = [
        'paste_id', 'views',
    ];
}
