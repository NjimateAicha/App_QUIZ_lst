<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\OptionsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Category;

class ImportOptionController extends Controller
{
    public function index()
    {
        return view('admin.import.index');
    }
    // --------------------------------------
    public function import(Request $request)
    {
        Excel::import(new OptionsImport,request()->file('file'));
    }
}
