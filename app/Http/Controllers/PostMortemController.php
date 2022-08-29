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
use PDF;

class PostMortemController extends Controller
{

    //PRESIDENT
    //display post mortem for the event
    public function viewPMPres($event_id)
    {
        $eventPM = DB::table('events')
                          ->join('roles', 'events.event_id', '=', 'roles.event_id')
                          ->join('post_mortems', 'roles.role_id', '=', 'post_mortems.role_id')
                          ->select('roles.role_name', 'post_mortems.issue',
                           'post_mortems.solution', 'post_mortems.suggestion')
                          //->groupBy('roles.role_name')
                          ->where('roles.event_id', '=', $event_id)
                          ->get();
        return view ('President.viewPMPres', compact('eventPM'));
    }

    //PD view post mortem on assigned event
    public function viewPMPDPres($event_id)
    {
        $eventID = $event_id;

        $eventPM = DB::table('events')
                          ->join('roles', 'events.event_id', '=', 'roles.event_id')
                          ->join('post_mortems', 'roles.role_id', '=', 'post_mortems.role_id')
                          ->select('events.event_name', 'roles.role_name', 'post_mortems.issue',
                           'post_mortems.solution', 'post_mortems.suggestion')
                          //->groupBy('roles.role_name')
                          ->where('roles.event_id', '=', $eventID)
                          ->get();
        return view ('President.viewPMPDPres', compact('eventPM', 'eventID'));
    }

    //Role view post mortem on assigned event
    public function viewPMRolePres($event_id)
    {
        $event = DB::table('events')
                ->join('roles', 'events.event_id', '=', 'roles.event_id')
                ->select('roles.event_id', 'events.event_name', 'roles.event_id', 'roles.role_id', 'roles.role_name')
                ->where('roles.event_id', '=', $event_id)
                //->dd();
                ->first();

        $PMRole = DB::table('events') 
                ->join('roles', 'events.event_id', '=', 'roles.event_id')
                ->join('post_mortems', 'roles.role_id', '=', 'post_mortems.role_id')
                ->select('events.event_name', 'roles.role_name', 'post_mortems.issue',
                           'post_mortems.solution', 'post_mortems.suggestion')
                ->where('roles.stud_id', '=', Auth::guard('Committee')->user()->stud_id)
                ->get();

                return view ('President.viewPMRolePres', compact('event', 'PMRole'));
    }

    //add post mortem comm
    public function addPMRolePres(Request $request, $role_id)
    {
          $data = $request->all();
          
          $issue = $data['issue'];
          $solution = $data['solution'];
          $suggestion = $data['suggestion'];
        
          $roleID = $role_id;
          
          $PM = PostMortem::create([
            'issue' => $data['issue'],
            'solution' => $data['solution'],
            'suggestion' => $data['suggestion'],
            'role_id' => $roleID 
          ]);

          return back();
    }

    //send event id to generate pdf
    // public function sendEventID($event_id)
    // {
    //     $eventid = $event_id;
    //     return view('President.viewPMPDPres', compact('eventid'));
    // }

    // PD pres generate pm to pdf 
    public function generatePMPres($event_id)
    {
        $event = DB::table('events')
                ->select('event_name')
                ->where('event_id', '=', $event_id)
                ->first();
                //dd($event);
        
        $taskEvent = DB::table('events')
                ->join('roles', 'events.event_id', '=', 'roles.event_id')
                ->join('tasks', 'roles.role_id', '=', 'tasks.role_id')
                ->join('committees', 'roles.stud_id', 'committees.stud_id')
                ->select('roles.role_name', 'tasks.task_name', 'tasks.task_status', 'committees.name', 'tasks.due_date')
                //->groupBy('roles.role_name')
                ->where('roles.event_id', '=', $event_id)
                ->get();       
        
        $PMEvent = DB::table('events') 
                ->join('roles', 'events.event_id', '=', 'roles.event_id')
                ->join('post_mortems', 'roles.role_id', '=', 'post_mortems.role_id')
                ->join('committees', 'roles.stud_id', 'committees.stud_id')
                ->select(  'roles.role_name', 'post_mortems.issue',
                 'committees.name', 'post_mortems.solution', 'post_mortems.suggestion')
                ->where('roles.event_id', '=', $event_id)
                ->get();
      
        $pdf = PDF::loadView('President.generatePMPres', compact('event', 'taskEvent', 'PMEvent'));
        return $pdf->download('PostMortem.pdf');
         
    }

    //COMMITTEE
    
    
    //display post mortem for the event
    public function viewPMComm($event_id)
    {
        $eventPM = DB::table('events')
                        ->join('roles', 'events.event_id', '=', 'roles.event_id')
                        ->join('post_mortems', 'roles.role_id', '=', 'post_mortems.role_id')
                        ->select('roles.role_name', 'post_mortems.issue',
                        'post_mortems.solution', 'post_mortems.suggestion')
                        //->groupBy('roles.role_name')
                        ->where('roles.event_id', '=', $event_id)
                        ->get();
        return view ('Committee.viewPMComm', compact('eventPM'));
    }

    //PD view post mortem on assigned evennt
    public function viewPMPDComm($event_id)
    {
        $eventID = $event_id;

        $eventPM = DB::table('events')
                          ->join('roles', 'events.event_id', '=', 'roles.event_id')
                          ->join('post_mortems', 'roles.role_id', '=', 'post_mortems.role_id')
                          ->select('events.event_name', 'roles.role_name', 'post_mortems.issue',
                           'post_mortems.solution', 'post_mortems.suggestion')
                          //->groupBy('roles.role_name')
                          ->where('roles.event_id', '=', $event_id)
                          ->get();
        return view ('Committee.viewPMPDComm', compact('eventID', 'eventPM'));
    }

    //Role view post mortem on assigned event
    public function viewPMRoleComm($event_id)
    {
        $event = DB::table('events')
                ->join('roles', 'events.event_id', '=', 'roles.event_id')
                ->select('roles.event_id', 'events.event_name', 'roles.event_id', 'roles.role_id', 'roles.role_name')
                ->where('roles.event_id', '=', $event_id)
                //->dd();
                ->first();

        $PMRole = DB::table('roles') 
                ->join('events', 'roles.event_id', '=', 'events.event_id')
                ->join('post_mortems', 'roles.role_id', '=', 'post_mortems.role_id')
                ->select( 'post_mortems.issue', 'post_mortems.solution', 'post_mortems.suggestion', 'roles.role_name')
                ->where('roles.stud_id', '=', Auth::guard('Committee')->user()->stud_id)
                ->where('roles.event_id', '=', $event_id)
                ->get();
                //->dd();
                //dd($PMRole);
        //         $viewShareVars = array_keys(get_defined_vars());
        // return view('Committee.viewPMRoleComm', compact($viewShareVars))->with(array('eventID' => $event_id));
              return view ('Committee.viewPMRoleComm', compact('event', 'PMRole'));
    }

    //display add Post mortem form
    // public function displayPMFormComm(Request $request, $role_id)
    // {
    //     $roleID = $role_id;
    //     return view('Committee.addPMComm', compact('roleID'));
    // }

    //add post mortem comm
    public function addPMRoleComm(Request $request, $role_id)
    {
          $data = $request->all();
          
          $issue = $data['issue'];
          $solution = $data['solution'];
          $suggestion = $data['suggestion'];
        
          $roleID = $role_id;
          
          $PM = PostMortem::create([
            'issue' => $data['issue'],
            'solution' => $data['solution'],
            'suggestion' => $data['suggestion'],
            'role_id' => $roleID 
          ]);

          return back();
    }

    // PD comm generate pm to pdf 
    public function generatePMComm($event_id)
    {
        $event = DB::table('events')
                ->select('event_name')
                ->where('event_id', '=', $event_id)
                ->first();
                //dd($event);
        
        $taskEvent = DB::table('events')
                ->join('roles', 'events.event_id', '=', 'roles.event_id')
                ->join('tasks', 'roles.role_id', '=', 'tasks.role_id')
                ->join('committees', 'roles.stud_id', 'committees.stud_id')
                ->select('roles.role_name', 'tasks.task_name', 'tasks.task_status', 'committees.name', 'tasks.due_date')
                //->groupBy('roles.role_name')
                ->where('roles.event_id', '=', $event_id)
                ->get();       
        
        $PMEvent = DB::table('events') 
                ->join('roles', 'events.event_id', '=', 'roles.event_id')
                ->join('post_mortems', 'roles.role_id', '=', 'post_mortems.role_id')
                ->join('committees', 'roles.stud_id', 'committees.stud_id')
                ->select(  'roles.role_name', 'post_mortems.issue',
                 'committees.name', 'post_mortems.solution', 'post_mortems.suggestion')
                ->where('roles.event_id', '=', $event_id)
                ->get();
      
        $pdf = PDF::loadView('Committee.generatePMComm', compact('event', 'taskEvent', 'PMEvent'));
        return $pdf->download('PostMortem.pdf');
         
    }

}
