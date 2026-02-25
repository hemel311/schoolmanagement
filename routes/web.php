<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\GroupController as ClassController;
use App\Http\Controllers\admin\TeacherController;
use App\Http\Controllers\admin\SectionController;
use App\Http\Controllers\admin\addmission\AddmissionController;
use App\Http\Controllers\admin\AccountantController;
use App\Http\Controllers\accountant\AccountantController as Accountant;
use App\Http\Controllers\admin\FeeheadController;
use App\Http\Controllers\accountant\FeesController;
use App\Http\Controllers\addmission\AddmissionController as Addmission;
use App\Http\Controllers\addmission\StudentAddController;
use App\Models\Fee;
use App\Http\Controllers\teacher\TeacherController as TeacherDashboardController;
use App\Http\Controllers\parents\ParentsController;
use App\Http\Controllers\student\StudentController;
use App\Http\Controllers\addmission\InvoiceController;
use App\Http\Controllers\accountant\StudentpaymentController;
use App\Http\Controllers\teacher\StudentDetailsController;
use App\Http\Controllers\admin\AdminExamController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('auth.login');
//});
Route::get('/invoice/{id}/download', [InvoiceController::class, 'download'])
    ->name('invoice.download');
Route::get('/invoice/{id}', [InvoiceController::class, 'show'])
    ->name('invoice.show');

Route::get('/',[\App\Http\Controllers\CommonLogin\CommonLoginCntroller::class,'loginPage'])->name('login.form');
Route::post('/common-login',[\App\Http\Controllers\CommonLogin\CommonLoginCntroller::class,'login'])->name('common.login');
Route::get('/common-logout',[\App\Http\Controllers\CommonLogin\CommonLoginCntroller::class,'logout'])->name('common.logout');
Route::get('/get-class-fee/{classId}', function ($classId) {
    return Fee::where('group_id',$classId)
        ->where('month',1)
        ->sum('amount');
});
Route::get('/get-monthly-fee/{classId}/{month}', function ($classId, $month) {
    $fee = \App\Models\Fee::where('group_id', $classId)
        ->where('month', $month)
        ->first();

    return response()->json([
        'amount' => $fee ? $fee->amount : 0
    ]);
});
//student
Route::prefix('student')->group(function (){
    Route::middleware('auth:student')->group(function (){
        Route::get('/dashboard',[StudentController::class,'dashboard'])->name('student.dashboard');
    });
});
//Parent Dashboard
Route::prefix('parents')->group(function (){
    Route::middleware('auth:parents')->group(function (){
        Route::get('/dashboard',[ParentsController::class,'dashboard'])->name('parents.dashboard');
    });
});
//Teacher Dashboard
Route::prefix('teacher')->group(function (){
    Route::middleware('auth:teacher')->group(function (){
       Route::get('/dashboard',[TeacherDashboardController::class,'dashboard'])->name('teacher.dashboard');
       Route::get('/student-search',[StudentDetailsController::class,'index'])->name('teacher.studentdetails.search');
       Route::post('/search-student-details',[StudentDetailsController::class,'searchStudent'])->name('teacher.studentdetails');
    });
    Route::middleware(['auth:teacher', 'section.teacher'])->group(function () {

    });
});
//Addmission Depertment
Route::prefix('addmission')->group(function (){
    Route::middleware('auth:addmission')->group(function (){
       Route::get('/dashboard',[Addmission::class,'AddmissionDashboard'])->name('addmission.dashboard');
       Route::get('/add-student',[StudentAddController::class,'addStudent'])->name('addstudent');
       Route::post('/create-student',[StudentAddController::class,'createStudent'])->name('createstudent');
       Route::get('/manage-student',[StudentAddController::class,'manageStudent'])->name('managestudent');
       Route::get('/delete-student/{id}',[StudentAddController::class,'deleteStudent'])->name('deletestudent');
       Route::get('/edit-student/{id}',[StudentAddController::class,'editstudent'])->name('editstudent');
       Route::post('/update-student/{id}',[StudentAddController::class,'updateStudent'])->name('updateStudent');




    });

});
//account
Route::prefix('account')->group(function (){
    Route::middleware('auth:accountant')->group(function (){

        Route::get('/dashboard',[Accountant::class,'accountantdashboard'])->name('account.dashboard');
        Route::get('/add-package',[FeesController::class,'index'])->name('addfees');
        Route::post('/create-package',[FeesController::class,'store'])->name('createfees');
        Route::get('/manage-package',[FeesController::class,'manageFees'])->name('managefees');
        Route::get('/delete-package/{id}',[FeesController::class,'deleteFees'])->name('deletefees');
        Route::get('/edit-package/{id}',[FeesController::class,'editFee'])->name('editfees');
        Route::post('/update-package/{id}',[FeesController::class,'updateFee'])->name('updatefee');
        Route::get('/student-search',[StudentpaymentController::class,'index'])->name('studentsearchpage');
        Route::post('/student-details',[StudentpaymentController::class,'searchStudent'])->name('studentpaymentdetails');
        Route::get('/get-monthly-fee/{classId}/{month}', function ($classId, $month) {
            $fee = \App\Models\Fee::where('group_id', $classId)
                ->where('month', $month)
                ->first();

            return response()->json([
                'amount' => $fee ? $fee->amount : 0
            ]);
        });
        Route::post('/create-payment',[StudentpaymentController::class,'createPayment'])->name('createpayment');
        Route::get('/invoice/{id}', [InvoiceController::class, 'show'])
            ->name('account.invoice.show');
        Route::get('/manage-payment',[StudentpaymentController::class,'managePayment'])->name('managepayment');

    });
});

//admin
Route::prefix('admin')->group(function(){
Route::get('/login',[AdminController::class,'Login'])->name('admin.login.form');
Route::post('/login',[AdminController::class,'adminLogin'])->name('admin.login');
Route::get('/logout',[AdminController::class,'adminLogout'])->name('admin.logout')->middleware('admin');
Route::middleware('auth:admin')->group(function (){
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::get('/add-class',[ClassController::class,'index'])->name('addclass');
    Route::post('/create-class',[ClassController::class,'store'])->name('createclass');
    Route::get('/manage-class',[ClassController::class,'manage'])->name('manageclass');
    Route::get('/delete-class/{id}',[ClassController::class,'delete'])->name('deleteclass');
    Route::get('/edit-class/{id}',[ClassController::class,'edit'])->name('editclass');
    Route::post('/update-class/{id}',[ClassController::class,'update'])->name('updateclass');
    //teacher
    Route::get('/add-teacher',[TeacherController::class,'index'])->name('addteacher');
    Route::post('/create-teacher',[TeacherController::class,'store'])->name('createteacher');
    Route::get('/manage-teacher',[TeacherController::class,'manage'])->name('manageteacher');
    Route::get('/delete-teacher/{id}',[TeacherController::class,'delete'])->name('delete');
    Route::get('/edit-teacher/{id}',[TeacherController::class,'edit'])->name('edit');
    Route::post('/update-teacher/{id}',[TeacherController::class,'update'])->name('update');
    //section
    Route::get('/add-section',[SectionController::class,'index'])->name('addsection');
    Route::post('/create-section',[SectionController::class,'store'])->name('createsection');
    Route::get('/manage-section',[SectionController::class,'manage'])->name('managesection');
    Route::get('/delete-section/{id}',[SectionController::class,'deleteSection'])->name('deletesection');
    Route::get('/edit-section/{id}',[SectionController::class,'edit'])->name('editsection');
    Route::post('/update-section/{id}',[SectionController::class,'update'])->name('update');
    //Addmission Officer
    Route::get('/add-officer',[AddmissionController::class,'index'])->name('addofficer');
    Route::post('/create-officer',[AddmissionController::class,'store'])->name('createaddmissionofficer');
    Route::get('/manage-officer',[AddmissionController::class,'manage'])->name('manageofficer');
    Route::get('/edit-officer/{id}',[AddmissionController::class,'edit'])->name('editaddmissionofficer');
    Route::post('/update-officer/{id}',[AddmissionController::class,'update'])->name('updateaddmissionofficer');
    Route::get('/delete-officer/{id}',[AddmissionController::class,'delete'])->name('deleteaddmissionofficer');
    //accountant
    Route::get('/add-accountant',[AccountantController::class,'index'])->name('addaccountant');
    Route::post('/create-accountant',[AccountantController::class,'store'])->name('createaccountant');
    Route::get('/manage-accountant',[AccountantController::class,'manage'])->name('manageaccountant');
    Route::get('/edit-accountant/{id}',[AccountantController::class,'edit'])->name('editaccountant');
    Route::post('/update-accountant/{id}',[AccountantController::class,'update'])->name('updateaccountant');
    Route::get('/delete-accountant/{id}',[AccountantController::class,'delete'])->name('deleteaccountant');
    //Feehead
    Route::get('/add-feehead',[FeeheadController::class,'index'])->name('addfeehead');
    Route::post('/create-feehead',[FeeheadController::class,'store'])->name('createfeehead');
    Route::get('/delete-feehead/{id}',[FeeheadController::class,'delete'])->name('deletefeehead');
    Route::get('/manage-feehead',[FeeheadController::class,'manage'])->name('managefeehead');

    //exam
    Route::get('/add-exam',[AdminExamController::class,'index'])->name('adminexam');
    Route::post('/create-exam',[AdminExamController::class,'store'])->name('ceateexam');
    Route::get('/manage-exam',[AdminExamController::class,'manage'])->name('manageexam');
    Route::get('/delete-exam/{id}',[AdminExamController::class,'delete'])->name('deleteexam');
    Route::get('/edit-exam/{id}',[AdminExamController::class,'edit'])->name('editexam');
    Route::post('/update-exam/{id}',[AdminExamController::class,'update'])->name('updateexam');
});















});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
