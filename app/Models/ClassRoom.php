<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ClassRoom extends Model
{
    use HasTranslations;
    protected $table = 'classRooms';
    public $timestamps = true;
    protected $guarded=[];
    public $translatable = ['name'];
    public function grades()
    {
        return $this->belongsTo('App\Models\Grade', 'grades_id');
    }


}
