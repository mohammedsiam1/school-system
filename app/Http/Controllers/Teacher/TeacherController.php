<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeachers;
use App\Repository\interfaces;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    protected $Teacher;
    public function __construct(interfaces $Teacher)
    {
        $this->Teacher=$Teacher;
    }


    public function index()
    {
       $Teachers= $this->Teacher->GetAllTEtcher();
        return view('pages.Teachers.Teachers',compact('Teachers'));
    }


    public function create()
    {

            $specializations = $this->Teacher->Getspecialization();
            $genders = $this->Teacher->GetGender();
            return view('pages.Teachers.create',compact('specializations','genders'));

    }


    public function store(StoreTeachers $request)
    {
        $this->Teacher->StoreTeacher($request);
    }


    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $Teachers = $this->Teacher->editTeachers($id);
        $specializations = $this->Teacher->Getspecialization();
        $genders = $this->Teacher->GetGender();
        return view('pages.Teachers.edit',compact('Teachers','specializations','genders'));
    }


    public function update(Request $request)
    {
        return $this->Teacher->UpdateTeachers($request);
    }


    public function destroy(Request $request)
    {
        return $this->Teacher->DeleteTeachers($request);
    }
}
