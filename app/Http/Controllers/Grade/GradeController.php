<?php

namespace App\Http\Controllers\Grade;

use App\Http\Controllers\Controller;
use App\Http\Requests\GradeRequest;
use App\models\ClassRoom;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{

    public function index()
    {
        $Grades =Grade::all();
        return view('pages.Grades.Grades',compact('Grades'));
    }

    public function create()
    {
        //
    }


    public function store(GradeRequest $request)
    {
        if(Grade::where('name->ar',$request->Name)->orWhere('name->en',$request->Name_en)->exists()){
            return redirect()->back()->withErrors(trans('Grades_trans.exists'));
        }
        $validated = $request->validated();
        try {
            $Grade = new Grade();

            $Grade->name = ['en' => $request->Name_en, 'ar' => $request->Name];
            $Grade->note = $request->Notes;
            $Grade->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Grades.index');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }


    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(GradeRequest $request)
    {
        try {

            $validated = $request->validated();
            $Grades = Grade::findOrFail($request->id);
            $Grades->update([
                $Grades->name = ['ar' => $request->Name, 'en' => $request->Name_en],
                $Grades->note = $request->Notes,
            ]);
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Grades.index');
        }
        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {
        $id=$request->id;
        $idInClassRoom=ClassRoom::where('grades_id',$id)->first();
        if($idInClassRoom){
            toastr()->error(trans('messages.exists_classrooms'));
            return redirect()->route('Grades.index');
        }
       $grades=Grade::find($id);
       if($grades){
           $grades->delete();
           toastr()->error(trans('messages.Delete'));
           return redirect()->route('Grades.index');
       }


    }
}
