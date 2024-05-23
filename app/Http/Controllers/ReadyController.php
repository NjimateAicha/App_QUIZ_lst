<?php

namespace App\Http\Controllers;

// use App\Models\Option;
use App\Models\Category;
// use App\Models\Question;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Models\User;

class ReadyController extends Controller
{
    public function index($id)
{
    $user = Auth::user();

    // Vérifier si l'utilisateur a le rôle de propriétaire ou d'administrateur
    if ($user->user_type === 'owner' || $user->user_type === 'admin') {
        return redirect()->route('results.index'); // Rediriger vers une autre page appropriée
    }

    Cookie::queue('test_data', '', 120);

    return view('candidate.tests.ready')->with('categories', Category::where('id', $id)->first());
}
    
}
