<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminControllerUsers extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::paginate(10);
        return view('manageusers.manageusers')->with('users', $users);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if (!isset($user)) {
            return redirect('/admin/usercontrol')->with('error', 'No user Found');
        }

        $user->delete();
        return redirect('/admin/usercontrol')->with('success', 'user Removed');

        //Check if user exists before deleting



        // return redirect('/manageusers')->with('error', 'No post Found');
    }
}
