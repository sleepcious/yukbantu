<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Redirect;
use Session;
use Validator;
use Response;
use Input;
use Carbon\Carbon;
use App\Notifications\Register;

class TamuController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
	
	public function resetForm(){
		return view('auth.reset');
	}
	
	public function resetPass(Request $request){
		$email = $request->email;
		$user = User::whereEmail($email)->first();
		if(!$user){
			return view('general.notregister');
		}else{
			$pass = str_random(6);
			$user->update(['password'=>bcrypt($pass)]);
			
			$user->notify(new Register($user->name, $pass));
		}
	}
	
	public function register(Request $request){
		$this->validate($request, [
			'name' => 'required|string|max:191',
			'email' => 'required|string|email|max:191|unique:users'
		],
		[
			'email.unique' => 'Email ini sudah terdaftar'
		]
		);
		$hitung = User::all()->count();
		$pass = str_random(6);
		$role = 2;
		$status = 1;
		if($hitung < 1){
			$role = 1;
			$status = 2;
			$pass = 'administrator';
		}
		$user = User::whereEmail($request->email)->first();
		if (!$user) {
			$user = User::create([
				'email' => $request->email,
				'name' => $request->name,
				'role' => $role,
				'password' => bcrypt($pass),
				'status' => $status
			]);

			$user->notify(new Register($user->name, $pass));
		}
		return Redirect::to('thankyou');
	}
	
	public function thanks(){
		return view('general.thankyou');
	}
	
	public function terdaftar(){
		return view('general.terdaftar');
	}
}
