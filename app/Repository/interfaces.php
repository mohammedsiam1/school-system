<?php
namespace App\Repository;
interface interfaces{

    public function GetAllTEtcher();

    public function StoreTeacher($request);

    public function Getspecialization();

    public function GetGender();

    // EditTeachers
    public function editTeachers($id);

    // UpdateTeachers
    public function UpdateTeachers($request);

    // DeleteTeachers
    public function DeleteTeachers($request);

}
