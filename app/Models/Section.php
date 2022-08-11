<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $guarded=[];
    public $translatable = ['name_section'];


    public function classrooms()
    {
        return $this->belongsTo('App\models\ClassRoom', 'classRooms_id');
    }



    // علاقة الاقسام مع المعلمين
    public function teachers()
    {
        return $this->belongsToMany('App\Models\Teacher','teacher_section');
    }
    public function Grades()
    {
        return $this->belongsTo('App\Models\Grade','Grade_id');
    }
}
