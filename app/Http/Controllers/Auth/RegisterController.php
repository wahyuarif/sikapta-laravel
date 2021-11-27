<?php

namespace App\Http\Controllers\Auth;

use Session;
use App\Models\User;
use App\Mahasiswa;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Symfony\Component\HttpFoundation\Request;

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

    // use RegistersUsers;
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request)
    {
        
        $this->validate($request,[
            'nim' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|st ring|min:4|confirmed',
        ]);




        $mhs = Mahasiswa::where('nim', $request['nim'])->first();
        $user = User::where('mahasiswa_id', $mhs['id'])->first();
        
        if ($user['id'] != null) {
            Session::flash('msg', 'Nim Anda Sudah terdafatar silahkan login');
            return redirect()->back()->withInput($request->only('email', 'nim'));
        }

        if ($mhs['nim'] == null){
            Session::flash('msg', 'Nim Anda Tidak Terdaftar di Database Kami');
            return redirect()->back()->withInput($request->only('email', 'nim'));
        }else{

            User::create([
                'mahasiswa_id' => $mhs['id'],
                'email' => $request['email'],
                'password' => bcrypt($request['password']),
            ]);
    
            Session::flash('success', 'Berhasil membuat akun , silahkan Login');
    
            return redirect('login');
        }

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
            'nim' => 'required|string|max:255|unique:mahasiswas',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed',
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    // protected function create(array $data)
    // {

    //     // dd($id);
    //     $mhs = Mahasiswa::where('nim', $data['nim'])->first();


    //     if ($mhs['nim'] == null) {
    //         Session::flash('msg', 'Nim Anda Tidak Terdaftar di Database Kami');
    //         redirect()->back();
    //         return false;
    //     }else{
    //         return User::create([
    //             'mahasiswa_id' => $mhs['id'],
    //             'email' => $data['email'],
    //             'password' => bcrypt($data['password']),
    //         ]);
    //     }
        


    // }
}
