<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\UploadController;
use Illuminate\Http\Request;
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
        
       return Validator::make($data,[
            'file_number' => 'required|numeric|unique:users',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'nationality' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'gender' => 'required|boolean',
            'graduation_degree' => 'required|string|max:255',
            'personal_photo' =>'required|image|mimes:jpeg,bmp,png|max:2048',
            'passport_photo' =>'required|image|mimes:jpeg,bmp,png|max:2048',
            'graduation_photos'=>'required',
            'graduation_photos.*'=>'image|mimes:jpeg,bmp,png|max:2048'
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
        
        $user = User::create([
            'file_number' => $data['file_number'],
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'surname' => $data['surname'],
            'date_of_birth' => $data['date_of_birth'],
            'password' =>bcrypt($data['date_of_birth']),
            'nationality' => $data['nationality'],
            'country' => $data['country'],
            'gender' => $data['gender'],
            'graduation_degree' => $data['graduation_degree'], 
        ]);

        $this->upload($data,$user->id); 
        return $user;  
    }
}
