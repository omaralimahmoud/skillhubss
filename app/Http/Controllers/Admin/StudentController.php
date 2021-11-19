<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $studentRole = Role::Where('name', 'student')->first();
        $data['students'] = User::Where('role_id', $studentRole->id)->orderBy('id', 'DESC')->paginate(10);
        return view('admin.student.index')->with($data);
    }
    public function showScores($id)
    {
        $student = User::findOrFail($id);
        if ($student->role->name !== 'student') {
            return back();
        }
        $data['student'] = $student;
        $data['exams'] = $student->exams;
        return view('admin.student.show-scores')->with($data);
    }
    public function openExam($studentId, $examId)
    {
        $student = User::findOrFail($studentId);
        $student->exams()->updateExistingPivot($examId, [
            'status' => 'opend',
        ]);
        return back();
    }
    public function closeExam($studentId, $examId)
    {
        $student = User::findOrFail($studentId);
        $student->exams()->updateExistingPivot($examId, [
            'status' => 'closed',
        ]);
        return back();
    }
}
