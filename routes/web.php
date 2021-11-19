<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CatController as AdminCatController;
use App\Http\Controllers\Admin\ExamController as AdminExamController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\skillController as AdminSkillController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Web\CatController;
use App\Http\Controllers\Web\ExamController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\LangController;
use App\Http\Controllers\Web\profileController;
use App\Http\Controllers\Web\SkillController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('lang')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/categories/show/{id}', [CatController::class, 'show']);
    Route::get('/skill/show/{id}', [SkillController::class, 'show']);
    Route::get('/exams/show/{id}', [ExamController::class, 'show'])->middleware('auth', 'verified', 'student');
    Route::get('/exams/questions/{id}', [ExamController::class, 'questions']);
    Route::get('/contact', [ContactController::class, 'index']);
    Route::get('/profile', [profileController::class, 'index'])->middleware('auth', 'verified', 'student');
});
Route::post('exams/start/{id}', [ExamController::class, 'start'])->middleware('auth', 'verified', 'student', 'can-enter-exam');
Route::post('exams/submit/{id}', [ExamController::class, 'submit'])->middleware('auth', 'verified', 'student');
Route::post('/contact/message/send', [ContactController::class, 'send']);
Route::get('/lang/set/{lang}', [LangController::class, 'set']);

Route::prefix('dashboard')->middleware(['auth', 'verified', 'can-enter-dashboard'])->group(function () {
    Route::get('/', [AdminHomeController::class, 'index']);
    Route::get('/categories', [AdminCatController::class, 'index']);
    Route::post('/categories/store', [AdminCatController::class, 'store']);
    Route::post('/categories/update', [AdminCatController::class, 'update']);
    Route::get('/categories/delete/{cat}', [AdminCatController::class, 'delete']);
    Route::get('/categories/toggle/{cat}', [AdminCatController::class, 'toggle']);
    ////////////////////////////////////////////////////////
    Route::get('/skills', [AdminSkillController::class, 'index']);
    Route::post('/skills/store', [AdminSkillController::class, 'store']);
    Route::post('/skills/update', [AdminSkillController::class, 'update']);
    Route::get('/skills/delete/{skill}', [AdminSkillController::class, 'delete']);
    Route::get('/skills/toggle/{skill}', [AdminSkillController::class, 'toggle']);
    /////////////////////////////////////////////////////////////////////////
    Route::get('/exams', [AdminExamController::class, 'index']);
    Route::get('/exams/create', [AdminExamController::class, 'create']);
    Route::get('/exams/create-questions/{exam}', [AdminExamController::class, 'createQuestion']);
    Route::post('/exams/store-questions/{exam}', [AdminExamController::class, 'storeQuestion']);
    Route::get('/exams/show/{exam}', [AdminExamController::class, 'show']);
    Route::get('/exams/show/{exam}/questions', [AdminExamController::class, 'showQuestions']);
    Route::post('/exams/store', [AdminExamController::class, 'store']);
    Route::get('/exams/edit/{exam}', [AdminExamController::class, 'edit']);
    Route::post('/exams/update/{exam}', [AdminExamController::class, 'update']);
    Route::get('/exams/edit-questions/{exam}/{question}', [AdminExamController::class, 'editQuestions']);
    Route::post('/exams/update-questions/{exam}/{question}', [AdminExamController::class, 'updateQuestions']);
    Route::get('/exams/toggle/{exam}', [AdminExamController::class, 'toggle']);
    Route::get('/exams/delete/{exam}', [AdminExamController::class, 'delete']);
    Route::get('/students', [StudentController::class, 'index']);
    Route::get('/students/show-scores/{id}', [StudentController::class, 'showScores']);
    Route::get('/students/open-exam/{studentId}/{examId}', [StudentController::class, 'openExam']);
    Route::get('/students/close-exam/{studentId}/{examId}', [StudentController::class, 'closeExam']);
    Route::middleware('superAdmin')->group(function () {
        Route::get('admins', [AdminController::class, 'index']);
        Route::get('admins/create', [AdminController::class, 'create']);
        Route::post('admins/store', [AdminController::class, 'store']);
        Route::get('admins/promote/{id}', [AdminController::class, 'promote']);
        Route::get('admins/demote/{id}', [AdminController::class, 'demote']);
    });
    Route::get('messages',[MessageController::class,'index']);
    Route::get('messages/show/{message}',[MessageController::class,'show']);
    Route::post('messages/response/{message}',[MessageController::class,'response']);
});
