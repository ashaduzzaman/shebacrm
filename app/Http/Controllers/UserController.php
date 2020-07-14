<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Models\TicketType;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use Redirect;
use Hash;

class UserController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }
    public function index()
    {
    	// $users = User::with('ticketType')->get();
    	$users = User::get();
    	return view('user.index', compact('users'));
    }
    public function edit($id)
    {
    	$user = User::find($id);
        // $roleList = ['super_admin' => 'Super Admin', 'sheba_admin' => 'Sheba Admin', 'user' => 'User'];
    	$roleList = ['sheba_admin' => 'Sheba Admin', 'agent' => 'Agent', 'user' => 'User'];

    	return view('user.edit', compact('user', 'roleList'));
    }
    public function update(Request $request, $id)
    {
        $input = Input::all();
        $rules = [
            'phone_number' => 'required|numeric|digits_between:11,11',
            'name' => 'required',
            'role' => 'required'
        ];
        $messages = [
            
        ];
        
        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            flash()->error('Something Wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

    	$user = User::find($id);
        $user->name = $request->name;
        $user->role = $request->role;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->updated_by = Auth::id();
        $user->save();
        flash()->success('Successfully Updated');
        
        return redirect('user');
    }

    public function changePasswordForm()
    {
        return view('user.change_password_form');
    }

    public function changePasswordStore(Request $request)
    {
        $user = Auth::user();
        $rules = array(
            'old_password' => 'required|min:6',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
        {
            return Redirect::action('UserController@changePasswordForm',$user->id)->withErrors($validator);
        }
        else
        {
            if (!Hash::check(Input::get('old_password'), $user->password))
            {
                flash()->error('Old password not matched');

                return redirect()->back();
            }
            else
            {
                $user->password = Hash::make(Input::get('password'));
                $user->secret = base64_encode(Input::get('password'));
                $user->save();

                flash()->success('Password have been changed');

                return redirect('/');
            }
        }
    }
}
