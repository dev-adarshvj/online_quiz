<?php

namespace App\Http\Controllers;
use App\Models\Question;
use App\Models\Options;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function create(){
        return view('quiz.create');
    }

  public function store(Request $request)
{
    $request->validate([
        'question' => 'required',
        'option' => 'required|array|min:4',
        'option.*' => 'required|string',
        'correct' => 'required|in:0,1,2,3',
    ]);

    $question = Question::create([
        'question' => $request->question
    ]);

    foreach ($request->option as $index => $text) {
    Options::create([
        'question_id' => $question->id,
        'option_text' => $text,
        'is_correct' => $index == $request->correct
    ]);
}

    return redirect()->back()->with('success', 'Question created successfully');
}


    public function takeQuiz(){
        $questions = Question::with('options')->inRandomOrder()->get();
        return view('quiz.take-quiz', compact('questions'));
    }
    public function submitQuiz(Request $request){

 $score = 0;
            foreach($request->answers as $question_id => $option_id){
                $option = Options::find($option_id);
                if($option && $option->is_correct){
                    $score++;
                }
                return view('quiz.result',['score' => $score, 'total' => count($request->answers)]);
            }
    }
}
