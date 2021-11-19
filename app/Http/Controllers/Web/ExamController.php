<?php

namespace App\Http\Controllers\Web;

use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    public function show($id)
    {
        $data['exam'] = Exam::findOrFail($id);
        $user = Auth::user();
        $data['canViewStartBtn'] = true;
        if ($user !== null) {
            $pivotRow = $user->exams()->Where('exam_id', $id)->first();
            if ($pivotRow !== null and $pivotRow->pivot->status == 'closed') {
                $data['canViewStartBtn'] = false;
            }
        }

        return view('web.exams.show')->with($data);
    }

    public function start($examId, Request $request)
    {
        $user = Auth::user();
        if (!$user->exams->contains($examId)) {
            $user->exams()->attach($examId);
        } else {
            $user->exams()->updateExistingPivot($examId, [
                'status' => 'closed',
            ]);
        }

        $request->session()->flash('prev', "start/$examId");
        return redirect(url("exams/questions/$examId"));
    }
    public function questions($examId, Request $request)
    {

        if (session('prev') !== "start/$examId") {
            return redirect(url("exams/show/$examId"));
        }

        $data['exam'] = Exam::findOrFail($examId);
        $request->session()->flash('prev', "questions/$examId");
        return view('web.exams.questions')->with($data);
    }
    public function submit($examId, Request $request)
    {
        if (session('prev') !== "questions/$examId") {
            return redirect(url("exams/show/$examId"));
        }

        $request->validate([
            'answers' => 'nullable|array',
            'answers.*' => 'nullable|in:1,2,3,4'
        ]);
        $exam = Exam::findOrFail($examId);
        $points = 0;
        $totalQuesNum = $exam->questions->count();
        foreach ($exam->questions as $questions) {
            if (isset($request->answers[$questions->id])) {
                $userAns = $request->answers[$questions->id];
                $rightAns = $questions->right_ans;
                if ($userAns == $rightAns) {
                    $points += 1;
                }
            }
        }
        $score = ($points / $totalQuesNum) * 100;

        /////clculating  Time Mins
        $user = Auth::user();
        $pivotRow = $user->exams()->Where('exam_id', $examId)->first();
        $startTime = $pivotRow->pivot->created_at;
        $submitTime = Carbon::now();
        $timeMins = $submitTime->diffInMinutes($startTime);
        if ($timeMins > $pivotRow->duration_mins) {
            $score = 0;
        }
        /////////////update
        $user->exams()->updateExistingPivot($examId, [
            'score' => $score,
            'time_mins' => $timeMins,

        ]);
        $request->session()->flash("success", "you fininsed exam successfully with score $score% ");
        return redirect(url("exams/show/$examId"));



        dd($timeMins);
    }
}
