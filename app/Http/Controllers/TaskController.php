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

class TaskController extends Controller
{
    //PROGRAM DIRECTOR
    //President

    public function PDPresTaskList($event_id)
    {
      //  $eventPDPres = DB::table('events')
      //                  ->join('roles', 'events.event_id', '=', 'roles.event_id')
      //                 ->join('committees', 'roles.stud_id', '=','committees.stud_id' )
      //                 ->select('roles.event_id','events.event_name', 'committees.name', 'roles.role_id', 'roles.role_name')
      //                 ->where('roles.stud_id', '=', Auth::guard('Committee')->user()->stud_id )
      //                 ->where('events.event_id', '=', $event_id)
                     
      //                ->first();
      //                //->first();
      //                 //dd($event);
      //   $eventRoleListPres = DB::table('tasks')
      //                 ->join('roles', 'tasks.role_id', '=', 'roles.role_id')
      //                 //->join('events', 'roles.event_id', '=', 'events.event_id')
      //                 ->select('tasks.task_id', 'tasks.task_name', 'tasks.task_description',
      //                 'tasks.task_status', 'tasks.due_date', 'tasks.role_id', 'roles.role_name' )
      //                 //->where('events.event_id', '=', $event_id)
      //                 ->get();
            $eventRoles = DB::table('events')
                          ->join('roles', 'events.event_id', '=', 'roles.event_id')
                          ->join('tasks', 'roles.role_id', '=', 'tasks.role_id')
                          ->join('committees', 'roles.stud_id', '=', 'committees.stud_id')
                          ->select('committees.name', 'roles.role_name', 'tasks.task_name', 'tasks.task_status')
                          //->groupBy('roles.role_name')
                          ->where('roles.event_id', '=', $event_id)
                          ->get();
                        //->dd();
            // $taskList = DB::table('tasks')
            //               ->join('roles', 'tasks.role_id', '=', 'roles.role_id')
            //               ->select('tasks.task_name', 'tasks.task_status')
            //               ->where('roles.event_id', '=', $event_id)
            //               //->groupBy('roles.role_name')
            //               //->having('tasks.role_id', '=', 'tasks.role_id')
            //               ->get();
                      return view ('President.viewTaskPDPres2', compact('eventRoles'));      
    }

    public function PDCommTaskList($event_id)
    {
      $eventRolesC = DB::table('events')
                          ->join('roles', 'events.event_id', '=', 'roles.event_id')
                          ->join('tasks', 'roles.role_id', '=', 'tasks.role_id')
                          ->join('committees', 'roles.stud_id', '=', 'committees.stud_id')
                          ->select('committees.name', 'roles.role_name', 'tasks.task_name', 'tasks.task_status')
                          //->groupBy('roles.role_name')
                          ->where('roles.event_id', '=', $event_id)
                          ->get();

                          return view ('Committee.viewTaskPDComm', compact('eventRolesC')); 
    }


    //PRESIDENT

    //display task in event details
    public function taskDisplayPres($event_id)
    {
      $taskEvent = DB::table('events')
                ->join('roles', 'events.event_id', '=', 'roles.event_id')
                ->join('tasks', 'roles.role_id', '=','tasks.role_id' )
                ->select('roles.role_name', 'tasks.task_name', 'tasks.task_description',
                          'tasks.task_status')
                ->where('events.event_id', '=', $event_id )   
                ->get();

                return view ('President.viewTaskPres', compact('taskEvent'));
    }


    //display event and task for the role
    public function assignedRoleEventDisplay()
    {
        $eventListRolePres = DB::table('events')
                      ->join('roles', 'events.event_id', '=', 'roles.event_id')
                     ->join('committees', 'roles.stud_id', '=','committees.stud_id' )
                     ->select('events.event_status', 'roles.event_id', 'events.event_id',
                     'events.event_name', 'roles.role_name', 'committees.name', 'roles.role_id')
                     ->where('roles.stud_id', '=', Auth::guard('Committee')->user()->stud_id )   
                     ->get();
                    // ->first();
                      //dd($event);
        $eventTaskListPres = DB::table('tasks')
                      ->join('roles', 'tasks.role_id', '=', 'roles.role_id')
                      ->select('tasks.task_id', 'tasks.task_name', 'tasks.task_description',
                      'tasks.task_status', 'tasks.due_date', 'tasks.role_id')
                      ->where('roles.stud_id', '=', Auth::guard('Committee')->user()->stud_id)
                      ->get();  
                    
                      return view ('President.myTaskPres', compact('eventListRolePres','eventTaskListPres'));
    }

    //display add task form
    public function displayFormWithRole(Request $request, $role_id)
    {
        $roleID = $role_id;
        return view('President.addTaskPres', compact('roleID'));
    }

    //add Task role pres
    public function addTaskRolePres(Request $request, $role_id)
    {
          $data = $request->all();
          
          $task_name = $data['task_name'];
          $task_description = $data['task_description'];
          $task_status = $data['task_status'];
          $due_date = $data['due_date'];
          $roleID = $role_id;
          
          $task = Task::create([
            'task_name' => $data['task_name'],
            'task_description' => $data['task_description'],
            'task_status' => $data['task_status'],
            'due_date' => $data['due_date'],
            'role_id' => $roleID 
          ]);

          return $this->assignedRoleEventDisplay();
    }

    //role president view task details 
    public function roleViewTaskPres($task_id)
    {
          $roleViewTask = DB::table('tasks')
                          ->join('roles', 'tasks.role_id', '=', 'roles.role_id')
                          ->join('events', 'roles.event_id', '=', 'events.event_id')
                          ->select('tasks.task_id', 'tasks.task_name', 'tasks.task_description', 'tasks.task_status',
                          'tasks.due_date',  'events.event_name', )
                          ->where('tasks.task_id', '=', $task_id)
                          ->first();

                          return view ('President.roleViewTaskPres', compact('roleViewTask'));
    }

    //role president update task details
    public function updateTaskRolePres(Request $request, $task_id)
    {

        $task_name = $request ->task_name;
        $task_description = $request->task_description;
        $due_date = $request->due_date; 

        $updateTask = DB::table('tasks')
                    ->where('task_id', '=', $task_id)
                    ->update(['task_name' => $task_name, 'task_description' => $task_description, 
                    'due_date' => $due_date ]);
                     return redirect ('roleViewTaskPres/'.$task_id)-> withArray(compact('updateTask'));
    }

    //task complete role pres
    public function taskCompletePres(Request $request, $task_id)
    {
     
      $updateTaskStatus = DB::table('tasks')
                  ->where('task_id', '=', $task_id)
                  ->update(['task_status' => 'Complete']);

                  return back();
    }

    public function taskDeletePres(Request $request, $task_id)
    {
     // $task_status = $request->task_status;

      $deleteTask = DB::table('tasks')
                  ->where('task_id', '=', $task_id)
                  ->delete();

                  return back();
    }

    //------------------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------

    //COMMITTEE

    //display task in event details
    public function taskDisplayComm($event_id)
    {
      $taskEvent = DB::table('events')
                ->join('roles', 'events.event_id', '=', 'roles.event_id')
                ->join('tasks', 'roles.role_id', '=','tasks.role_id' )
                ->select('roles.role_name', 'tasks.task_name', 'tasks.task_description',
                          'tasks.task_status')
                ->where('events.event_id', '=', $event_id )   
                ->get();

                return view ('Committee.viewTaskComm', compact('taskEvent'));
    }


    //display event and task for the role
    public function assignedRoleEventDisplay2()
    {
        $eventListRoleComm = DB::table('events')
                      ->join('roles', 'events.event_id', '=', 'roles.event_id')
                     ->join('committees', 'roles.stud_id', '=','committees.stud_id' )
                     ->select('events.event_status','roles.event_id','events.event_name', 'events.event_id',
                      'roles.role_name', 'committees.name', 'roles.role_id')
                     ->where('roles.stud_id', '=', Auth::guard('Committee')->user()->stud_id )
                     
                    ->get();
                    //->first();
                      //dd($eventListRoleComm);
        $eventTaskListComm = DB::table('tasks')
                      ->join('roles', 'tasks.role_id', '=', 'roles.role_id')
                      ->select('tasks.task_id', 'tasks.task_name', 'tasks.task_description',
                      'tasks.task_status', 'tasks.due_date', 'tasks.role_id')
                      ->where('roles.stud_id', '=', Auth::guard('Committee')->user()->stud_id)
                      //->where('tasks.role_id', '=', 'roles.role_id')
                      ->get();  
                 //->dd();
        // $eventTaskListComm = DB::table('tasks')
        //               ->join('roles', 'tasks.role_id', '=', 'roles.role_id')
        //               ->join('events', 'roles.event_id', '=', 'events.event_id')
        //               ->select('events.event_name', 'roles.role_name', 'tasks.task_id', 'tasks.task_name', 'tasks.task_description',
        //               'tasks.task_status', 'tasks.due_date', 'tasks.role_id')
        //               ->where('roles.stud_id', '=', Auth::guard('Committee')->user()->stud_id)
        //               //->get();  
        //              ->dd();
                      return view ('Committee.myTaskComm', compact('eventListRoleComm','eventTaskListComm'));
    }

    //display add task form
    public function displayFormWithRoleC(Request $request, $role_id)
    {
        $role_ID = $role_id;
        return view('Committee.addTaskComm', compact('role_ID'));
    }

    //add Task role comm
    public function addTaskRoleComm(Request $request, $role_id)
    {
          $data = $request->all();
          
          $task_name = $data['task_name'];
          $task_description = $data['task_description'];
          $task_status = $data['task_status'];
          $due_date = $data['due_date'];
          $roleID = $role_id;
          
          $task = Task::create([
            'task_name' => $data['task_name'],
            'task_description' => $data['task_description'],
            'task_status' => $data['task_status'],
            'due_date' => $data['due_date'],
            'role_id' => $roleID 
          ]);

          return $this->assignedRoleEventDisplay2();
    }

    //role comm view task details 
    public function roleViewTaskComm($task_id)
    {
          $roleViewTask = DB::table('tasks')
                          ->join('roles', 'tasks.role_id', '=', 'roles.role_id')
                          ->join('events', 'roles.event_id', '=', 'events.event_id')
                          ->select('tasks.task_id', 'tasks.task_name', 'tasks.task_description', 'tasks.task_status',
                          'tasks.due_date',  'events.event_name', )
                          ->where('tasks.task_id', '=', $task_id)
                          ->first();

                          return view ('Committee.roleViewTaskComm', compact('roleViewTask'));
    }

    //role Comm update task details
    public function updateTaskRoleComm(Request $request, $task_id)
    {

        $task_name = $request ->task_name;
        $task_description = $request->task_description;
        $due_date = $request->due_date; 

        $updateTask = DB::table('tasks')
                    ->where('task_id', '=', $task_id)
                    ->update(['task_name' => $task_name, 'task_description' => $task_description, 
                    'due_date' => $due_date ]);
                     return redirect ('roleViewTaskPres/'.$task_id)-> withArray(compact('updateTask'));
    }

    //task role comm complete
    public function taskCompleteComm(Request $request, $task_id)
    {
     // $task_status = $request->task_status;

      $updateTaskStatus = DB::table('tasks')
                  ->where('task_id', '=', $task_id)
                  ->update(['task_status' => 'Complete']);

                  return back();
    }

    //role comm delete task
    public function taskDeleteComm(Request $request, $task_id)
    {
     // $task_status = $request->task_status;

      $deleteTask = DB::table('tasks')
                  ->where('task_id', '=', $task_id)
                  ->delete();

                  return back();
    }

}
