<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
          'fname' => 'required|string|max:50',
          'lname' => 'required|string|max:50',
          'email' => 'required|string|email|max:100',
          'password' => 'required|string|min:6',
          'employee_id' => 'required|string|max:50',
          'phone' => 'nullable|string|max:25',
          'photo' => 'string|max:150',
          'role' => 'required|numeric',
          'assembly_access' => 'numeric|max:1',
          'repair_access' => 'numeric|max:1',
          'instructions_access' => 'numeric|max:1',
          'active' => 'numeric|max:1'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
          'fname' => $data['fname'],
          'lname' => $data['lname'],
          'email' => $data['email'],
          'password' => bcrypt($data['password']),
          'employee_id' => $data['employee_id'],
          'phone' => $data['phone'],
          // 'photo' => $data['photo'],
          'role' => $data['role'],
          'assembly_access' => $data['assembly_access'],
          'repair_access' => $data['repair_access'],
          'instructions_access' => $data['instructions_access'],
          'active' => 1
        ]);
    }
}
