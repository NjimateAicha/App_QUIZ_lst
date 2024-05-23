<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class QuestionsController extends Controller
{
// -----------------------------------------------------
    public function index()
    {
        return view('admin.questions.index')->with('questions', Question::paginate(4));
    }
// -----------------------------------------------------
    public function create()
    {
        $categories = Category::get();
        return view('admin.questions.create', compact('categories'));
    }
// -----------------------------------------------------
    public function store(Request $request)
    {
        $request->validate([
            'question_name'  =>  'required',
            'category_id'    =>  'required',
        ]);

        Question::create([
            'question_name'  =>  $request->input('question_name'),
            'category_id'    =>  $request->input('category_id'),
        ]);

        return redirect()->route('questions.create')->with('success','Question Added Successfully !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::get();
        return view('admin.questions.edit', compact('categories'))->with('questions', Question::get()->where('id', $id)->first());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'question_name'  =>  'required',
            'category_id'    =>  'required',
        ]);

        Question::where('id', $id)->update([
            'question_name'  =>  $request->input('question_name'),
            'category_id'    =>  $request->input('category_id'),
        ]);

        return redirect()->route('questions.index')->with('success','Question Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Question::where('id', $id)->delete();

        return redirect()->route('questions.index')->with('success','Question Deleted Successfully !');
    }
}
