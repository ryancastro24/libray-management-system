<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use PDO;

use function PHPUnit\Framework\throwException;

class AuthController extends Controller
{
    
    public function register(){

        return view('auth/register');
    }



    public function registerSave(Request $request){


        Validator::make($request->all(), [
            'name' =>  'required',
            'idnumber' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();

        User::create([
            'name' => $request->name,
            'idnumber' => $request->idnumber,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user'
        ]);

    return redirect()->route('usermanagement');
        
    }

    public function login(){
        return view('auth/login');
    }

    public function loginAction(Request $request){

        Validator::make($request->all(),[
            'idnumber' => 'required',
            'password' => 'required'
        ])->validate();

        if(!Auth::attempt($request->only('idnumber','password'),$request->boolean('remember'))){
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }

        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }


    public function logout(Request $request){
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            
            return redirect('/');
    }

    public function deleteUser($id){
        $user = User::findOrFail($id);

        // Check if the book exists
        if($user){
            $user->delete();
            // Redirect to a page or return a response
            return redirect()->route('usermanagement');
            // Redirect to a page or return a response for non-existing book
        }
    }

    public function userupdate(Request $request){
        $id = $request->input('id');

        $data =  User::find($id);

        return view('user-update',compact('data') );
    }

    public function  userupdateSave(Request $request){
        $user = User::find($request->id);
        $data = [
            'idnumber' => $request->update_idnumber,
            'name' => $request->update_name,
            'email' => $request->update_email,
        ];

        $user->update($data);

        return redirect()->route('usermanagement');
    }
}
