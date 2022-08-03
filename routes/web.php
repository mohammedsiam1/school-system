<?php



use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

//Auth::routes();
Route::get('/', 'HomeController@index')->middleware('guest')->name('selection');

Route::group(['namespace' => 'Auth'], function () {

    Route::get('/login/{type}','LoginController@loginForm')->middleware('guest')->name('login.show');
    Route::post('/login','LoginController@login')->name('login');
    Route::get('/logout/{type}', 'LoginController@logout')->name('logout');

});


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ]
    ], function(){
    /*   Route::get('/', function()
    {
        return view('auth.login');
    });*/
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name(   'dashboard');

    Route::group(['namespace' => 'Grade'], function () {
        Route::resource('Grades', 'GradeController');
    });
        Route::group(['namespace' => 'ClassRooms'], function () {
        Route::resource('classroom', 'ClassRoomController');
        Route::post('delete_all', 'ClassRoomController@delete_all')->name('delete_all');
        Route::post('Filter_Classes', 'ClassRoomController@Filter_Classes')->name('Filter_Classes');
    });

        Route::group(['namespace' => 'Sections'], function () {
        Route::resource('Sections', 'SectionController');
        Route::get('/classes/{id}', 'SectionController@getclasses');
        });
    Route::view('add_parent','livewire.show_Form')->name('add_parent');

    //==============================Teachers============================
    Route::group(['namespace' => 'Teacher'], function () {
        Route::resource('Teachers', 'TeacherController');
    });

    //==============================Students============================
    Route::group(['namespace' => 'Students'], function () {
        Route::resource('Students', 'StudentController');
        Route::resource('Graduated', 'GraduatedController');
        Route::resource('Promotion', 'PromotionController');
        Route::get('/Get_classrooms/{id}', 'StudentController@Get_classrooms');
        Route::get('/Get_Sections/{id}', 'StudentController@Get_Sections');
        Route::post('Upload_attachment', 'StudentController@Upload_attachment')->name('Upload_attachment');
        Route::get('Download_attachment/{studentsname}/{filename}', 'StudentController@Download_attachment')->name('Download_attachment');
        Route::post('Delete_attachment', 'StudentController@Delete_attachment')->name('Delete_attachment');
        Route::GET('student/Graduated', 'GraduatedController@graduatedstudent')->name('student.Graduated');
        Route::resource('Fees', 'FeesController');
        Route::resource('Fees_Invoices', 'FeesInvoicesController');
        Route::resource('receipt_students', 'ReceiptStudentsController');
        Route::resource('ProcessingFee', 'ProcessingFeeController');
        Route::resource('Payment_students', 'PaymentController');
        Route::resource('Attendance', 'AttendanceController');
        Route::get('/indirect', 'OnlineClasseController@indirectCreate')->name('indirect.create');
        Route::post('/indirect', 'OnlineClasseController@storeIndirect')->name('indirect.store');
        Route::resource('online_classes', 'OnlineClasseController');
        Route::get('download_file/{filename}', 'LibraryController@downloadAttachment')->name('downloadAttachment');
        Route::resource('library', 'LibraryController');

    });
    //==============================subjects============================
    Route::group(['namespace' => 'Subjects'], function () {
        Route::resource('subjects', 'SubjectController');
    });
    //==============================Quizzes============================
    Route::group(['namespace' => 'Quizzes'], function () {
        Route::resource('Quizzes', 'QuizzController');
    });

    //==============================questions============================
    Route::group(['namespace' => 'questions'], function () {
        Route::resource('questions', 'QuestionController');
    });

    //==============================Setting============================
    Route::resource('settings', 'SettingController');



});






