<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Team;
use App\Models\Team_user;
class UserController extends Controller
{
  public function show_login()
  {
  return view('user.login');

  }
  public function show_signup(){
   return view('user.signup');

  }
  public function show_admin(){

   $users=User::all();
   $teams=Team::with('manager')->get();
   return view('user.admin',compact('users','teams'));

  }
  public function show_user(){
    $user=User::with('teams')->find(auth()->user()->id);
    return view('user.user',compact('user'));


  }

 public function login(UserRequest $request)
 {
   $credentials=$request->validated();
   $user=User::where('username',$credentials['username'])->first();
   if(!Auth::attempt($credentials))
   {
    return redirect('/')->withErrors('Inavlid username and/or password.');
   }
    if(isset($validate))
  return redirect()->back()->withErrors($validate)->withInput();
else
 return $user->isAdmin? redirect('/admin') : redirect('/user');
 }
 public function logout(Request $request)
 {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');


 }
 public function signup(UserRequest $request){
  $validated=$request->validated();
  $validated['password']=Hash::make($validated['password']);

  User::create($validated);
  if(isset($validate))
 return redirect()->back()->withErrors($validate)->withInput();
 elseif(auth()->check())
  return redirect('/admin');
 else
   return redirect()->back();

 }
 public function destroy(string $id )
 {
  $data=User::find($id);
  $data->delete();
   return redirect()->back();
 }
public function edit(string $id)
{
    $user=User::find($id);
  return  view('user.editUser',compact('user'));
}
public function update(UserRequest $request,string $id)
{
    $user=User::find($id);
    $validate=$request->validated();
    if(!$request->filled('password'))
    $user->update(['username'=>$validate['username']]);
    else
    {
        $validate['password']=Hash::make($validate['password']);
        $user->update($validate);}
    return redirect('/admin');
}
}

