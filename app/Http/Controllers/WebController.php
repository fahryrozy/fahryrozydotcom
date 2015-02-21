<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class WebController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
        public function master() {
            return view('layouts.master');
        }
	public function index() {
            return view('home.index');
	}
        
        public function resume() {
            return view('home.resume');
        }

        public function login() {
            return view('home.login');
        }
        
        public function doLogin() {
            $input = Request::all();
            $rules = array('email' => 'required|email', 'password' => 'required');
            
            $v = Validator::make($input, $rules);
            
            if($v->passes()) {
                $credentials = array('email' => $input['email'], 'password' => $input['password']);
                
                if(Auth::attempt($credentials)) {
                    return redirect('/');
                }else {
                    return redirect('login')->withInput()->withErrors($v);
                }
                
            }else {
                return redirect('login')->withInput()->withErrors($v);
            }
        }
        
        public function register() {
            return view('home.register');
        }
        
        public function doRegister() {
            $input = Input::all();
            $rules = array('name' => 'required|unique:users', 'email' => 'required|unique:users|email',
                           'password' => 'required', 'cpassword' => 'required');
            
            $v = Validator::make($input, $rules);
            
            if($v->passes()) {
                $password = $input['password'];
                $password = Hash::make($password);
                
                $user = new User();
                $user->name = $input['name'];
                $user->email = $input['email'];
                $user->password = $password;
                $user->save();
                
                return Redirect::to('login');
            }else {
                return Redirect::to('register')->withInput()->withErrors($v);
            }
        }

        public function logout() {
            Auth::logout();
            return redirect('/');
        }
}
