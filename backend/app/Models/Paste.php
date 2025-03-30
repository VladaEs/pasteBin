<?php

namespace App\Models;
use App\Models\pasteSetting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Paste extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'pastes';
    protected $fillable = [
        "filename",
        'author_id',
    ];

    public function settings(){
        return $this->hasOne(pasteSetting::class, "paste_id", 'id');
    }
    public function scopePublicPastes($query){
        return $query
        ->leftJoin('paste_settings', "pastes.id", '=', 'paste_settings.paste_id')
        ->leftJoin("paste_categories", "paste_settings.category_id", '=', 'paste_categories.id')
        ->select(
            'pastes.id',
            'pastes.filename',
            'pastes.created_at',
            'pastes.updated_at',
            'paste_settings.paste_id',
            'paste_settings.category_id',
            'paste_categories.paste_category',
            'paste_settings.paste_custom_name',
        )
        ->where('paste_settings.paste_privacy', 1)
        ->where('pastes.created_at', '<', now())->limit(5);
    }

}
