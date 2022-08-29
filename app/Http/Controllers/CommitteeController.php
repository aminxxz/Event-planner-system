<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use DB;
use App\Http\Requests;
use App\Models\Committee;
use Illuminate\Support\Facades\Auth;

class CommitteeController extends Controller
{
    public function index()
    {
        return view('others.login2');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required | email', // to do -  check email unique validation
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::guard('Committee')->attempt($credentials)) {
            if (Auth::guard('Committee')->user()->position == 'Committee' ){
            return redirect()->intended('dashboardCommittee')
                        ->withSuccess('Signed in');}
            // if (Auth::guard('committees')->user()->position == ''){
            //                return redirect()->intended('dashboardPD')
            //             ->withSuccess('Signed in');}
            if (Auth::guard('Committee')->user()->position == 'President'){
            $asd = Auth::guard('Committee')->user();
            //dd($asd);
            return redirect()->intended('dashboardPres')
                        ->withSuccess('Signed in');            
            }
        
        //dd($request);
        //echo 'akdlasjd';
        return redirect("login2")->withSuccess('Login details are not valid');
        }
    }
    public function registration()
    {
        return view('others.register2');
    }

    public function customRegistration(Request $request)
    {  
        $request->validate([
            'stud_id' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:Committees',
            'password' => 'required|min:6',
            'activation_status' => 'required',
            'position' => 'required'
            
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("login2")->withSuccess('You registration is successful');
        //echo 'ajskdashd';
    }

    public function create(array $data)
    {
      return Committee::create([
        'stud_id' => $data['stud_id'],
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'activation_status' => "Active",
        'position' => "Committee"
        
      ]);
      
      
    }    

    public function dashboard()
    {
        if(Auth::check()){
            return view('layouts.Master.dashboard');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login2');
    }

    //COMMITTEE FUNCTION
    //display committee's profile
    public function profileCommittee()
    {
        //$asd = committees::where(Auth::guard('committees')->user()->role_id);
        
        $profile = DB::table('committees')
                ->select('*')
                ->where('stud_id', '=', Auth::guard('Committee')->user()->stud_id)
                ->first();
                //dd($profile);
        //echo 'alskdj';
        return view ('Committee.commProfile', compact('profile'));
    }

    //Update Committee's profile
    public function updateProfileCommittee(Request $request, $stud_id)
    {
    
        $name = $request ->name;
        $email = $request->email;
        //$password = $request->password;
        if ($request-> password != null) {
            $password = Hash::make($request->password);
        }
        else{
            $password = Auth::guard('Committee')->user()->password;
        } 
        
        $updateCommittee = DB::table('committees')
                    ->where('stud_id', '=', Auth::guard('Committee')->user()->stud_id )
                    ->update(['name' => $name, 'email' => $email,
                     'password' => $password]);
                     return redirect ('Committee Profile')-> withArray(compact('updateCommittee'));
    }


    //PRESIDENT
     //Display president's profile
     public function profilePres()
     {
         //$asd = committees::where(Auth::guard('committees')->user()->role_id);
         
         $profile = DB::table('committees')
                 ->select('*')
                 ->where('stud_id', '=', Auth::guard('Committee')->user()->stud_id)
                 ->first();
                 ($profile);
         //echo 'alskdj';
         return view ('President.presProfile', compact('profile'));
     }
 
     //Update presidents profile
     public function updateProfilePres(Request $request, $stud_id)
     {
     
         $name = $request ->name;
         $email = $request->email;
         //$password = $request->password;
         if ($request-> password != null) {
             $password = Hash::make($request->password);
         }
         else{
             $password = Auth::guard('Committee')->user()->password;
         } 
         
 
         $updatePres = DB::table('committees')
                     ->where('stud_id', '=', Auth::guard('Committee')->user()->stud_id )
                     ->update(['name' => $name, 'email' => $email,
                      'password' => $password]);
                      return redirect ('Pres Profile')-> withArray(compact('updatePres'));
     }





}
