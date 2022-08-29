<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\PostMortem;
use App\Models\Event;
use App\Models\Committee;
use App\Models\Role;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
  //PRESIDENT 's Page
  
  //display list event for PD - Pres
    public function assignedPDEventDisplay()
    {
        $eventListPDPres = DB::table('events')
                      ->join('roles', 'events.event_id', '=', 'roles.event_id')
                     ->join('committees', 'roles.stud_id', '=','committees.stud_id' )
                     ->select('roles.event_id','events.event_name', 'events.event_overview', 'events.event_guest',
                     'events.event_location', 'events.event_start_date', 'events.event_end_date', 'events.event_start_time',
                     'events.event_end_time', 'events.event_status', 'roles.role_name', 'committees.name')
                     ->where('committees.stud_id', '=', Auth::guard('Committee')->user()->stud_id )
                     
                    ->get();
                    // ->first();
                      //dd($event);
                    return view ('President.myEventPres2', compact('eventListPDPres'));
    }

    //display list event details for PD - Pres
    public function PDEventDetailsPres($event_id)
    {
        $event = DB::table('events')
                      ->join('roles', 'events.event_id', '=', 'roles.event_id')
                     ->join('committees', 'roles.stud_id', '=','committees.stud_id' )
                     ->select('roles.event_id', 'events.event_name', 'events.event_overview', 'events.event_guest',
                     'events.event_location', 'events.event_start_date', 'events.event_end_date', 'events.event_start_time',
                     'events.event_end_time', 'events.event_status', 'roles.role_name', 'committees.name')
                     ->where('roles.stud_id', '=', Auth::guard('Committee')->user()->stud_id )
                     ->where('events.event_id', '=', $event_id)
                    //get();
                     ->first();
                      //dd($event);
                    return view ('President.eventDetailsPDP', compact('event'));
    }

    //display create roles form - Pres PD
    public function displayCreateRolesPres(Request $request, $event_id)
    {
        $eventID = $event_id;
        $committee = DB::table('committees')
        ->select('*')
        ->get();
        return view ('President.createRolePres')->with(array('event_id' => $event_id, 'committee' => $committee));
    }

    //create roles - pres PD
    public function createRolesPres(Request $request, $event_id)
    {
        $eventID = $event_id;
        $roles = $request->role;
        $role_names = $request->role_name;
        $stud_id = $request->stud_id;
        //dd($role_names);
        for ($i = 0; $i < count($role_names); $i++)
        {
        $roles = new Role([
          'event_id' => $eventID,  
          'role_name' => $role_names[$i],
          'stud_id' => $stud_id[$i]
        ]);
        $roles->save();
        }
        
        return $this->assignedPDEventDisplay();        
    }

    //display assigned roles
    public function displayRolesAssigned($event_id)
    {
        $event = DB::table('events')
                  ->select('event_name')
                  ->where('event_id', '=', $event_id)
                  ->first();  

        $assignee = DB::table('roles')
                  ->join('events', 'roles.event_id', '=', 'events.event_id')
                  ->join('committees', 'roles.stud_id', '=', 'committees.stud_id')
                  ->select('committees.name', 'roles.role_name')
                  ->where('roles.event_id', '=', $event_id)
                  ->get();
                  
        return view('President.listRoleAssignedPres', compact('event', 'assignee'));          
    }

//--------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------

    //COMMITTEE's Page

    //display list event for PD - Comm
    public function assignedPDEventDisplay1()
    {
        $eventListPDComm = DB::table('events')
                      ->join('roles', 'events.event_id', '=', 'roles.event_id')
                     ->join('committees', 'roles.stud_id', '=','committees.stud_id' )
                     ->select('events.event_id', 'events.event_name', 'events.event_overview', 'events.event_guest',
                     'events.event_location', 'events.event_start_date', 'events.event_end_date', 'events.event_start_time',
                     'events.event_end_time', 'events.event_status', 'roles.role_name', 'committees.name')
                     ->where('roles.stud_id', '=', Auth::guard('Committee')->user()->stud_id )
                    ->get();
                    // ->first();
                      //dd($event);
                    return view ('Committee.myEventComm', compact('eventListPDComm'));
    }

    //display event details for Pd - Comm
    public function PDEventDetailsComm()
    {
        $eventDetailsPDComm = DB::table('events')
                      ->join('roles', 'events.event_id', '=', 'roles.event_id')
                     ->join('committees', 'roles.stud_id', '=','committees.stud_id' )
                     ->select('events.event_id', 'events.event_name', 'events.event_overview', 'events.event_guest',
                     'events.event_location', 'events.event_start_date', 'events.event_end_date', 'events.event_start_time',
                     'events.event_end_time', 'events.event_status', 'roles.role_name', 'committees.name')
                     ->where('roles.stud_id', '=', Auth::guard('Committee')->user()->stud_id )
                    //get();
                     ->first();
                      //dd($event);
                    return view ('Committee.eventDetailsPDC', compact('eventDetailsPDComm'));
    }

     //display create roles form - Comm PD
     public function displayCreateRolesComm(Request $request, $event_id)
     {
         $eventID = $event_id;
         $committee = DB::table('committees')
         ->select('*')
         ->get();
         return view ('Committee.createRolesComm')->with(array('event_id' => $event_id, 'committee' => $committee));
     }
 
     
 
     //create roles - Comm PD
     public function createRolesComm(Request $request, $event_id)
     {
         $eventID = $event_id;
         $roles = $request->role;
         $role_names = $request->role_name;
         $stud_id = $request->stud_id;
         //dd($role_names);
         for ($i = 0; $i < count($role_names); $i++)
         {
         $roles = new Role([
           'event_id' => $eventID,  
           'role_name' => $role_names[$i],
           'stud_id' => $stud_id[$i]
         ]);
         $roles->save();
         }
         
         return $this->assignedPDEventDisplay1();
        
         
     }

     //display assigned roles
    public function displayRolesAssigned2($event_id)
    {
        $event = DB::table('events')
                  ->select('event_name')
                  ->where('event_id', '=', $event_id)
                  ->first();  

        $assignee = DB::table('roles')
                  ->join('events', 'roles.event_id', '=', 'events.event_id')
                  ->join('committees', 'roles.stud_id', '=', 'committees.stud_id')
                  ->select('committees.name', 'roles.role_name')
                  ->where('roles.event_id', '=', $event_id)
                  ->get();
                  
        return view('Committee.listRoleAssignedComm', compact('event', 'assignee'));          
    }
//----------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------


    
}
