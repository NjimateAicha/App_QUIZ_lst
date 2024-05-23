<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class CategoriesController extends Controller
{
// -----------------------------------------------------

    public function index()
    {
        return view('admin.categories.index')->with('categories', Category::paginate(4));
    }

// -----------------------------------------------------

    public function create()
    {
        return view('admin.categories.create');
    }
// -----------------------------------------------------

    public function store(Request $request)
    {
        $request->validate([
            'category_name'  =>  'required',
            'description'    =>  'required',
            'nb_question'    =>  'required|integer',
            'timer'          =>  'required|numeric',
        ]);

        Category::create([
            'category_name'  =>  $request->input('category_name'),
            'description'    =>  $request->input('description'),
            'nb_question'    =>  $request->input('nb_question'),
            'timer'          =>  $request->input('timer'),
        ]);

        return redirect()->route('categories.create')->with('success','Category Added Successfully !');
    }
// -----------------------------------------------------

    public function show($id)
    {
        // if(Option::question()->category->category_name == Category::category_name){
        $options = Option::paginate(1);
        // $options = Str::random();
        // }
        $questions = Question::get();
        return view('admin.categories.show', compact('options','questions'))->with('categories', Category::where('id', $id)->first());
    }
// -----------------------------------------------------

    public function edit($id)
    {
        return view('admin.categories.edit')->with('categories', Category::where('id', $id)->first());
    }

// -----------------------------------------------------

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name'  =>  'required',
            'description'    =>  'required',
            'nb_question'    =>  'required|integer',
            'timer'          =>  'required|numeric',
        ]);

        Category::where('id', $id)->update([
            'category_name'  =>  $request->input('category_name'),
            'description'    =>  $request->input('description'),
            'nb_question'    =>  $request->input('nb_question'),
            'timer'          =>  $request->input('timer'),
        ]);

        return redirect()->route('categories.index')->with('success','Category Added Successfully !');
    }

// -----------------------------------------------------

    public function destroy($id)
    {
        Category::where('id', $id)->delete();

        return redirect()->route('categories.index')->with('success','Category Deleted Successfully !');

    }
}
