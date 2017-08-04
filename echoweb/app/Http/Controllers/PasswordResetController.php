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

class PasswordResetController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
	
	public function getForm(){
		return view('auth.reset');
	}
}
