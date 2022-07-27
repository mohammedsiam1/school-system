<?php

namespace App\Http\Controllers\ClassRooms;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClassRoomsRrequest;
use App\models\ClassRoom;
use App\Models\Grade;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class ClassRoomController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $List_Classes=ClassRoom::paginate(10);
      $Grades =Grade::paginate(10);
return view('pages.My_Classes.My_Classes',compact('List_Classes','Grades'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(ClassRoomsRrequest $request)
  {

      $List_Classes = $request->List_Classes;

      try {
          foreach ($List_Classes as $List_Class) {
              $My_Classes = new Classroom();
              $My_Classes->name = ['en' => $List_Class['Name_class_en'], 'ar' => $List_Class['Name']];
              $My_Classes->grades_id = $List_Class['Grade_id'];
              $My_Classes->save();
          }
          toastr()->success(trans('messages.success'));
          return redirect()->route('classroom.index');
      } catch (\Exception $e) {
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }
  }

  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(ClassRoomsRrequest $request)
  {
      try {
      $id=$request->id;
     $classroom=ClassRoom::findOrFail($id);
      $classroom-> update([
         $classroom->name = ['ar' => $request->Name, 'en' => $request->Name_en],
         $classroom->grades_id=$request->Grade_id,
     ]);
     $classroom->save();
      toastr()->success(trans('messages.update'));
      return redirect()->back();
  }catch (\Exception $e){
          return redirect()->back()->withErrors($e->getMessage());
      }
  }

  public function destroy(Request $request)
  {
      $id=$request->id;
      $classroom=ClassRoom::findOrFail($id)->delete();

      if ($classroom){
          toastr()->success(trans('messages.delete'));
          return redirect()->back();
      }
  }

  public function  delete_all(Request $request)
  {

      $id=$request->delete_all_id;
      if($id){
         $explode_id=explode(',', $id);
         $delete_all=ClassRoom::whereIn('id',$explode_id)->delete();
         if($delete_all) {
             toastr()->success(trans('messages.delete'));
             return redirect()->back();
         }
          return redirect()->back();
      }
      return redirect()->back();
  }
public function Filter_Classes(Request $request){

    $Grades = Grade::all();
    $Search = Classroom::select('*')->where('grades_id',$request->Grade_id)->get();
    return view('pages.My_Classes.My_Classes',compact('Grades'))->withDetails($Search);

}

}


