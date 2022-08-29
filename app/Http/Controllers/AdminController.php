<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Hash;
use App\Http\Requests;
use App\Models\Committee;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    
    public function index2()
    {
        return view('others.adminLogin');
    }

    public function adminLogin(Request $request)
    {
        $request->validate([
            'admin_username' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('admin_username', 'password');
        if (Auth::guard('Admin')->attempt($credentials)) {
        
            return redirect()->intended('dashboardAdmin')
                        ->withSuccess('Signed in');}
           
        
        //dd($request);
        //echo 'akdlasjd';
        return redirect("adminLogin")->withSuccess('Login details are not valid');
        }
    
        // public function adminregister()
        // {
        //     return view('others.register3');
        // }
    
        // public function adminRegistration(Request $request)
        // {  
        //     $request->validate([
        //         'admin_username' => 'required',
        //         'admin_password' => 'required'
                
                
        //     ]);
               
        //     $data = $request->all();
        //     $check = $this->create($data);
             
        //     return redirect("adminLogin")->withSuccess('You registration is successful');
        //     //echo 'ajskdashd';
        // }
    
        // public function create(array $data)
        // {
        //   return Admin::create([
        //     'admin_username' => $data['admin_username'],
        //     'admin_password' => Hash::make($data['admin_password'])
            
            
        //   ]);
          
          
        // } 
        
        //display committee
        public function displayCommittee()
    {
        $committee = DB::table('committees')
                    ->select('*')
                    ->get();
        return view ('Admin.adminDash', compact('committee'));

        
        //echo 'sdkaljdka';
    }


    //Assign president to other committee
    public function assignPosition(Request $request, $stud_id)
    {   
        $position = $request -> position;
        
        $assign = DB::table('committees')
                    ->where('stud_id', '=', $stud_id )
                    ->update(['position' => $position]);
                     return redirect ('dashboardAdmin')-> withArray(compact('assign'));
    }

    //Deactivate committee
    public function deactivate(Request $request, $stud_id)
    {           
              
        $deactivate = DB::table('committees')
                    ->where('stud_id', '=', $stud_id )
                    ->update(['activation_status' => 'Inactive']);
                     return back();
    }
}
