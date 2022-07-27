<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ParentAttachment extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function My_parent(){
        return $this->belongsTo(My_Parent::class,'parent_id');
    }
}
