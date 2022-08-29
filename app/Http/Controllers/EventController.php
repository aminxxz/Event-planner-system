<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Committee;
use App\Models\Role;
use App\Models\Event;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Session;

class EventController extends Controller
{
    
    //display list event pres page
    public function displayEvent1()
    {
        $event = DB::table('events')
                    ->select('*')
                    ->orderBy('event_id', 'desc')
                    ->get();
        
                    return view ('President.dashPres', compact('event'));
    }

    //display list event comm page
    public function displayEvent2()
    {
        $event = DB::table('events')
                    ->select('*')
                    ->orderBy('event_id', 'desc')
                    ->get();
        
                    return view ('Committee.dashCom', compact('event'));
    }

    //display event details pres page
    public function displayEventDetails1($event_id)
    {
        
        $eventDetailsPres = DB::table('events')
                      ->join('roles', 'events.event_id', '=', 'roles.event_id')
                     ->join('committees', 'roles.stud_id', '=','committees.stud_id' )
                     ->select('events.event_id', 'events.event_name', 'events.event_overview', 'events.event_guest',
                     'events.event_location', 'events.event_start_date', 'events.event_end_date', 'events.event_start_time',
                     'events.event_end_time', 'events.event_status', 'roles.role_name', 'committees.name')
                    ->where('events.event_id', '=', $event_id)
                     ->first();
                     
                    return view ('President.eventDetails', compact('eventDetailsPres'));
        // $event=Event::find($event_id);
        // $director=Role::find($role_id);
        // return view('President.eventDetails')
        // ->with(compact('event', 'director'));

    }
    
    //display event details comm page
    public function displayEventDetails2($event_id)
    {
        $eventDetailsComm = DB::table('events')
                      ->join('roles', 'events.event_id', '=', 'roles.event_id')
                     ->join('committees', 'roles.stud_id', '=','committees.stud_id' )
                     ->select('events.event_id', 'events.event_name', 'events.event_overview', 'events.event_guest',
                     'events.event_location', 'events.event_start_date', 'events.event_end_date', 'events.event_start_time',
                     'events.event_end_time', 'events.event_status', 'roles.role_name', 'committees.name')
                     ->where('events.event_id', '=', $event_id)
                     ->first();
                      //dd($event);
                    return view ('Committee.eventDetails2', compact('eventDetailsComm'));
    }
    
    //display people to assigned pd
    public function displayCommPD()
    {
        $committee = DB::table('committees')
        ->select('*')
        ->get();
        return view('President.createEvent', compact('committee'));
    }

    //pres create event
    public function createEvent1(Request $request)
    {
        $data = $request->all();   
        //dd($data);
        // $data['event_name'] = $event_name;
        // $data['event_overview'] = $event_overview;
        // $data['event_date'] = $event_date;
        
        $event_name = $data['event_name'];
        $event_overview = $data['event_overview'];
        $event_start_date = $data['event_start_date'];
        $event_end_date = $data['event_end_date'];
        $event_start_time = $data['event_start_time'];
        $event_end_time = $data['event_end_time'];
        $event_location = $data['event_location'];
        $event_guest = $data['event_guest'];
        $event_status = $data['event_status'];
        //$stud_id = $data['stud_id'];
        

        $event = Event::create([
            'event_name' => $data['event_name'],
            'event_overview' => $data['event_overview'],
            'event_start_date' => $data['event_start_date'],
            'event_end_date' => $data['event_end_date'],
            'event_start_time' => $data['event_start_time'],
            'event_end_time' => $data['event_end_time'],
            'event_location' => $data['event_location'],
            'event_guest' => $data['event_guest'],
            'event_status' => $data['event_status'],
            //'stud_id' => $data['stud_id']
        ]);

        $eventID = $event->event_id; 
        // dd($eventID);
        $director = Role::create([
            'role_name' => $data['role_name'],
            'event_id' => $eventID,
            'stud_id' => $data['stud_id'],
        ]);

       

        return redirect('dashboardPres');  
    }

    //------------------------------------------------------------------------
    //------------------------------------------------------------------------

    //Pd pres update event
    public function updateEventPDPres(Request $request, $event_id)
    {

        $event_name = $request ->event_name;
        $event_overview = $request->event_overview;
        $event_location = $request->event_location;
        $event_guest = $request->event_guest;
        $event_start_date = $request->event_start_date;
        $event_end_date = $request->event_end_date;
        $event_start_time = $request->event_start_time;
        $event_end_time = $request->event_end_time;
        //$password = $request->password; 
        

        $updateEvent = DB::table('events')
                    ->where('event_id', '=', $event_id)
                    ->update(['event_name' => $event_name, 'event_overview' => $event_overview, 'event_location' => $event_location,
                    'event_guest' => $event_guest, 'event_start_date' => $event_start_date, 'event_end_date' => $event_end_date, 
                    'event_start_time' => $event_start_time, 'event_end_time' => $event_end_time, ]);
                     return redirect ('eventDetailsPDP/'.$event_id)-> withArray(compact('updateEvent'));

         
    }

    //Comm pd update event
    public function updateEventPDComm(Request $request, $event_id)
    {

        $event_name = $request ->event_name;
        $event_overview = $request->event_overview;
        $event_location = $request->event_location;
        $event_guest = $request->event_guest;
        $event_start_date = $request->event_start_date;
        $event_end_date = $request->event_end_date;
        $event_start_time = $request->event_start_time;
        $event_end_time = $request->event_end_time;
        //$password = $request->password; 
        

        $updateEvent = DB::table('events')
                    ->where('event_id', '=', $event_id)
                    ->update(['event_name' => $event_name, 'event_overview' => $event_overview, 'event_location' => $event_location,
                    'event_guest' => $event_guest, 'event_start_date' => $event_start_date, 'event_end_date' => $event_end_date, 
                    'event_start_time' => $event_start_time, 'event_end_time' => $event_end_time, ]);
                     return redirect ('eventDetailsPDC/'.$event_id)-> withArray(compact('updateEvent'));

         
    }

    //--------------------------------------------------------------------------------------------------------------------------

    //Pd Pres complete event
    public function completeEventPres(Request $request, $event_id)
    {
      $updateEventStatus = DB::table('events')
                  ->where('event_id', '=', $event_id)
                  ->update(['event_status' => 'Complete']);
      
                  return back();
    }

    //Pd Comm complete event
    public function completeEventComm(Request $request, $event_id)
    {
      $updateEventStatus = DB::table('events')
                  ->where('event_id', '=', $event_id)
                  ->update(['event_status' => 'Complete']);
      
                  return back();
    }

    
    

}
