<?php


namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\ResultsController;
class StaticController extends Controller
{
    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

     public function index()
     {
        $total=User::count()-1;
        $userapp = User::where('user_type', 'user')->where('is_validated', true)->count();
        $usernoapp = User::where('user_type', 'user')->where('is_validated', false)->count();
        $admappr=User::where('user_type', 'admin')->where('is_validated', true)->count();
        $admnapp = User::where('user_type', 'admin')->where('is_validated', false)->count();

        $scorep =  User::where('user_type', 'user')
        ->where('is_validated', true)
        ->whereHas('results', function ($query) {
            $query->where('score', '>', 0);
        })
        ->count();
            

            $scoren = User::where('user_type', 'user')
            ->where('is_validated', true)
            ->whereHas('results', function ($query) {
                $query->where('results.score', 0);
            })
            ->count();
         return view('admin.static.index', compact('total','userapp', 'usernoapp' ,'admappr' ,'admnapp','scorep','scoren'));
     }
    
}