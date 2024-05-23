<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowTestController extends Controller
{
    public function show($id)
    {
        echo "<script></script>";
        $nb_question = Category::where('id', $id)->first()->value('nb_question');
        $options = Option::get();
        $randomQuestion = Question::whereHas('category', function ($query) use ($id) {
            $query->where('category_id', '=', $id);
        })->inRandomOrder()->take($nb_question)->pluck('id');
        $questions = Question::whereIn('id', $randomQuestion)->get();
        // dd($nb_question);
        return view('candidate.tests.show', compact('options','questions'))->with('categories', Category::where('id', $id)->first());
    }
}
