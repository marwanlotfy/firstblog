<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')-> except(['create','store','login']);
        $this->middleware('guest')->only(['create','store','login']);
    }
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator();
        $user =new User();
        $user->username=request('username');
        $user->firstname=request('firstname');
        $user->lastname=request('lastname');
        $user->email=request('email');
        $user->password=Hash::make(request('password'));
        $user->save();
        return redirect('/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update',$user);
        return view('user.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update',$user);
        request()->validate([
            'username'=>['required','min:5','max:50'],
            'firstname'=>['required','min:5','max:50'],
            'lastname'=>['required','min:5','max:50'],
            'password'=>['required','min:5','confirmed'],
            'old-password'=>['required','min:5'],
        ]);
        if(Hash::check(request('old-password'),$user->password)){
        $user->username=request('username');
        $user->firstname=request('firstname');
        $user->lastname=request('lastname');
        $user->password=Hash::make(request('password'));
        $user->save();
        return redirect('/post');
    }else{
            return view('user.edit',['user'=>$user]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete',$user);
        $user->delete();
        return redirect('/user/create');
    }
    public function login()
    {
        request()->validate(['email'=>'required|email','password'=>'required']);
        if(Auth::attempt(['email'=>request('email'),'password'=>request('password')])){
            return redirect()->intended('/post');

        }else{
            return redirect('/login');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
    public function validator()
    {
        request()->validate([
            'username'=>['required','min:5','max:50'],
            'firstname'=>['required','min:5','max:50'],
            'lastname'=>['required','min:5','max:50'],
            'password'=>['required','min:5','confirmed'],
            'email'=>['required','email','unique:users,email']
        ]);
    }
}
