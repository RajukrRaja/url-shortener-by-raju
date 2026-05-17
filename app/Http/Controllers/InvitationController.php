<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class InvitationController extends Controller{

public function create(){

 return view('invite.create');

}

public function store(Request $request){

$request->validate([

'name' => 'required',
'email' => 'required|email|unique:users,email',
'password' => 'required|min:6',
'role'=> 'required',

]);


$authUser = auth()->user();

if($authUser->role ==='superadmin'){

 $request->validate([

 'company_name' => 'required',

 ]);


 $company = Company::create([

 'name' => $request->company_name,
 ]);

 $user = User::create([

'name' => $request->name,
'email' => $request->email,
'password' => Hash::make($request->password),
'role' => $request->role,
'company_id' => $company->id,

 ]);

 $user->assignRole($request->role);

}


elseif($authUser->role === 'admin'){

if(! in_array($request->role, ['admin', 'member'])){

abort(403);

}

$user = User::create([

'name' => $request->name,
'email' => $request->email,
'password' => Hash::make($request->password),
'role' => $request->role,
'company_id' => $authUser->company_id,

]);

$user->assignRole($request->role);

} else {

abort(403);

}

return redirect()->back()->with('success', 'User invited successfully');

}

}