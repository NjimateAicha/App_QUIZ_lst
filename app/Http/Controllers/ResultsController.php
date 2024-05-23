<?php

namespace App\Http\Controllers;

use App\Mail\ExamResult;

use App\Models\Category;
use App\Models\Option;

use App\Models\Question;
use App\Models\Result;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;







class ResultsController extends Controller
{
    public function index()
    {
    $users = User::where('is_validated', true)
                 ->where('id', '<>', Auth::id())
                 ->where('user_type', 'user')
                 ->has('results') // Récupère uniquement les utilisateurs ayant des résultats associés
                 ->get();

    return view('admin.results.index', compact('users'));
    }
    public function store(Request $request)
    {
        $this->middleware('auth');
        $submitQuestions = $request->input('questionId', []);
        $correct_answers = [];
    
        foreach ($submitQuestions as $submitQuestion) {
            $option_question_id = Option::find($submitQuestion);
            $correct_answers[$submitQuestion] = $option_question_id->correct_answer;
        }
     
        $result = new Result();
        $result->user_id = Auth::id();
        $result->score = 0; // Initialisez le score à 0
        $result->save();
    
        $score = 0;
    
        $userAnswers = $request->except('_token', '_method');
    
        foreach ($userAnswers as $questionId => $answer) {
            if (isset($correct_answers[$questionId]) && $answer == $correct_answers[$questionId]) {
                $score++;
            }
        
            // Récupérez l'option correspondant à la question
            $option = Option::find($questionId);
        
            // Attachez l'option sélectionnée à l'entité "Result"
            $result->options()->attach($option);
        }
        $result->score = $score; // Mettez à jour le score dans l'entité "Result"
        $result->save();
    
        $result->load('options');
        // dd($result->options);
        // dd($request->all());
        // dd($request=$result);
        
        // Redirection vers la route result.showResult avec l'ID de l'utilisateur
        return redirect()->route('result.showResult', ['userId' => $result->user_id]);
    }
    
    
    public function showResult($userId)
    {
        $result = Result::where('user_id', $userId)->first();
    
        if ($result) {
            $score = $result->score;
            $user = $result->user;
    
            // Charger les options associées
            $result->load('options');
    
            // Autres traitements ou envoi de courrier électronique si nécessaire
        } else {
            $score = 0;
        }
    
        return view('candidate.result.showResult', compact('score', 'result'));
    }







}