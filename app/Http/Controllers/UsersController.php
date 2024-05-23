<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //---------------------------------------
    public function index(){
        // $users = User::where('id', '!=', Auth::id())->get();
        if(Auth::user()->user_type == "owner"){
            $users = User::where('id', '!=', Auth::id())->paginate(4);
        }elseif(Auth::user()->user_type == "admin"){
            $users = User::where('id', '!=', Auth::id())->where('user_type', 'user')->paginate(4);
        }
        return view('admin.users.index', compact('users'));
    }

    public function update(Request $request){

        $userIds = $request->input('users', []);
        $submitBtn = $request->input('submit_btn');
        // dd($userIds);
        if($submitBtn == "approve"){
            User::whereIn('id', $userIds)->update([
                'is_validated'  =>  true
            ]);
            return redirect()->route('users.index')->with('success','Users Approved Successfully !');
        }elseif($submitBtn == "disapprove"){
            User::whereIn('id', $userIds)->update([
                'is_validated'  =>  false
            ]);
            return redirect()->route('users.index')->with('failed','Users Disapproved Successfully !');
        }


    }
    public function searchAjax(Request $request)
    {
        $search = $request->input('search');
        $users = User::where('name', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->get();

        return response()->json([
            'users' => $users,
        ]);
    }
            // public function searchAjax(Request $request)
            // {
            //     $search = $request->input('search');

            //     $users = User::query()
            //         ->where('name', 'LIKE', "%{$search}%")
            //         ->orWhere('email', 'LIKE', "%{$search}%")
            //         ->paginate(10);

            //     return view('users.index', compact('users'));
            // }


}
