<?php

namespace App\Imports;

use App\Models\Option;
use App\Models\Question;
use Illuminate\Support\Collection;
// use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Category;

class OptionsImport implements ToCollection
{
    use Importable;
// --------------------------------------------------
    public function collection(Collection $rows)
    {
        foreach ($rows as $row){

            // if(Question::findOrFail($row[0])->exists()){
                $category = Category::where('category_name', $row[0])->first();
                if($category){
                    $category ->update([
                        'category_name'      =>   $row[0],
                        'description'        =>   $row[1],
                        'nb_question'        =>   intval($row[2]),
                        'timer'              =>   intval($row[3]),
                    ]);
                    $question = Question::create([
                        'question_name'        =>   $row[4],
                        'category_id'          =>   $category->id,
                    ]);
                    $option = Option::create([
                        'question_id'        =>   $question->id,
                        'option_type'        =>   $row[5],
                        'option_1'           =>   $row[6],
                        'option_2'           =>   $row[7],
                        'option_3'           =>   $row[8],
                        'option_4'           =>   $row[9],
                        'correct_answer'     =>   $row[10],
                    ]);
                // return back()->with('success','Excel Imported Successfully !');
                    // // dd('exist name');
                }
                else{
                    $category = Category::create([
                        'category_name'      =>   $row[0],
                        'description'        =>   $row[1],
                        'nb_question'        =>   intval($row[2]),
                        'timer'              =>   intval($row[3]),
                       
                    ]);
                    // dd('$nb_question');
                    $question = Question::create([
                        'question_name'        =>   $row[4],
                        'category_id'          =>   $category->id,
                    ]);
                    $option = Option::create([
                        'question_id'        =>   $question->id,
                        'option_type'        =>   $row[5],
                        'option_1'           =>   $row[6],
                        'option_2'           =>   $row[7],
                        'option_3'           =>   $row[8],
                        'option_4'           =>   $row[9],
                        'correct_answer'     =>   $row[10],
                    ]);
                    // return redirect()->route('import.index')->with('success','Excel Imported Successfully !');
                }
               
        }
        return redirect()->route('import.index')->with('success','Excel Imported Successfully !')->send();

    }
   
}
