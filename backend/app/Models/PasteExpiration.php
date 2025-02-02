<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasteExpiration extends Model
{
    protected $table = "paste_expiration";
    protected $fillable = [
        "expiration_name",

        ];
}
