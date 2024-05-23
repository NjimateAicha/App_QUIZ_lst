<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Result;
use App\Models\User;

class TestsController extends Controller
{
    //------------------------------------------------------------
    public function index(){
        $categories = Category::get();
        return view('candidate.tests.index', compact('categories'));
    }
  // ...

}

