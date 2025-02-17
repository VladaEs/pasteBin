<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paste_Tag extends Model
{
    protected $table = "paste_tags";
    protected $fillable = [
        'paste_id',
        'tag_id',
    ];
}
