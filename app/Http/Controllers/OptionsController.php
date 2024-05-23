<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Category;

class OptionsController extends Controller
{
// --------------------------------------
    public function index()
    {
        return view('admin.options.index')->with('options', Option::paginate(4));
    }
// --------------------------------------

    public function create()
    {
        $questions = Question::get();
        return view('admin.options.create', compact('questions'));
    }
// --------------------------------------
    public function store(Request $request)
    {
        $request->validate([
            'question_id'         =>  'required',
            'option_type'         =>  [
                'required',
                Rule::in(['multipleOptions','singleOption']),
            ],
            'option_1'            =>  'sometimes|required',
            'option_2'            =>  'sometimes|required',
            'option_3'            =>  'nullable',
            'option_4'            =>  'nullable',
            'correct_answer' => [
                'required',
                'sometimes',
                function ($attribute, $value, $fail) use ($request){
                    $option_1 = $request->input('option_1');
                    $option_2 = $request->input('option_2');
                    $option_3 = $request->input('option_3');
                    $option_4 = $request->input('option_4');
                    if ($request->input('correct_answer') !== $option_1 && $request->input('correct_answer') !== $option_2 && $request->input('correct_answer') !== $option_3 && $request->input('correct_answer') !== $option_4){
                        $fail("The :attribute does not match any option! ");
                    }
                },
            ],
        ]);

        Option::create([
            'question_id'         =>  $request->input('question_id'),
            'option_type'         =>  $request->input('option_type'),
            'option_1'            =>  $request->input('option_1'),
            'option_2'            =>  $request->input('option_2'),
            'option_3'            =>  $request->input('option_3'),
            'option_4'            =>  $request->input('option_4'),
            'correct_answer'      =>  $request->input('correct_answer'),
        ]);

        return redirect()->route('options.create')->with('success','Options Added Successfully !');
    }
// --------------------------------------

    public function show(string $id)
    {
        //
    }
// --------------------------------------

    public function edit(string $id)
    {
        $questions = Question::get();
        return view('admin.options.edit', compact('questions'))->with('options', Option::get()->where('id', $id)->first());
    }
// --------------------------------------

    public function update(Request $request, string $id)
    {
        $request->validate([
            'question_id'         =>  'required',
            'option_type'         =>  [
                'required',
                Rule::in(['multipleOptions','singleOption']),
            ],
            'option_1'            =>  'sometimes|required',
            'option_2'            =>  'sometimes|required',
            'option_3'            =>  'nullable',
            'option_4'            =>  'nullable',
            'correct_answer' => [
                'required',
                'sometimes',
                function ($attribute, $value, $fail) use ($request){
                    $option_1 = $request->input('option_1');
                    $option_2 = $request->input('option_2');
                    $option_3 = $request->input('option_3');
                    $option_4 = $request->input('option_4');
                    if ($request->input('correct_answer') !== $option_1 && $request->input('correct_answer') !== $option_2 && $request->input('correct_answer') !== $option_3 && $request->input('correct_answer') !== $option_4){
                        $fail("The :attribute does not match any option! ");
                    }
                },
            ],
        ]);

        Option::where('id', $id)->update([
            'question_id'         =>  $request->input('question_id'),
            'option_type'         =>  $request->input('option_type'),
            'option_1'            =>  $request->input('option_1'),
            'option_2'            =>  $request->input('option_2'),
            'option_3'            =>  $request->input('option_3'),
            'option_4'            =>  $request->input('option_4'),
            'correct_answer'      =>  $request->input('correct_answer'),
        ]);

        return redirect()->route('options.index')->with('success','Options Updated Successfully !');
    }
// --------------------------------------

    public function destroy(string $id)
    {
        Option::where('id', $id)->delete();

        return redirect()->route('options.index')->with('success','Options Deleted Successfully !');
    }

}
