<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\PostMortemController;
use App\Http\Models\Committee;
use App\Http\Models\Admin;
use App\Http\Models\Task;
use App\Http\Models\Role;
use App\Http\Models\Event;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PDF;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Login committee
/*Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
Route::get('login2', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 

Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');*/


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//landing page
Route::get('/front', function () {
    return view('others.frontPage');
}); 

//ADMIN
//admin login page
Route::get('/adminLogin', function () {
    return view('others.adminLogin');
});

//Admin login
Route::get('/adminLogin', [AdminController::class, 'index2'])->name('login');
Route::post('/adminLogin', [AdminController::class, 'adminLogin'])->name('login-admin');

//Admin dashboard
Route::get('/dashboardAdmin', function () {
    return view('Admin.adminDash');
});

// Admin view committees list
Route::get('/dashboardAdmin', [AdminController::class, 'displayCommittee'])->name('display-committees');

//Assign president
//Route::get('/dashboardAdmin', [AdminController::class, 'assignPosition'])
Route::post('/assignPosition/{stud_id}', [AdminController::class, 'assignPosition']);

//Deactivate committee's activation status
Route::post('/deactivate/{stud_id}', [AdminController::class, 'deactivate']);

//------------------------------------------------------------------------------------------

//committee login page
Route::get('/login2', function () {
    return view('others.login2');
}); 




//Commmittee register, login and logout
Route::get('/register2', [CommitteeController::class, 'registration'])->name('sign up');
Route::post('/registration', [CommitteeController::class, 'customRegistration'])->name('register-user');

Route::get('/login2', [CommitteeController::class, 'index'])->name('login');
Route::post('/createLogin', [CommitteeController::class, 'customLogin'])->name('login-committee');

Route::post('/logout', [CommitteeController::class, 'logout'])->name('logout');
//Route::get('/register2', [committeeController::class, 'selectRole'])->name('register2');

//----------------------------------------------------------------------------------------------

//PATH FOR PROGRAM DIRECTOR
// Route::get('/dashboardPD', function () {
//     return view('Program Director.dashPD');
// });

// //Create event
// //Route::get('/Add Event', function(){
// //    return view('Program Director.addEvent', [eventController::class, 'displayBureauCommittee']);
// //});
// // display event form
// Route::get('/Add Event', function(){
//     return view('Program Director.addEvent3');
// });

// Route::get('/Add Bureau', [eventController::class, 'displayBureauCommittee']);

// //add event
// Route::post('/Add Event,', [eventController::class, 'createEvent2'])->name('create-event');

// Route::post('/Add Bureau', [eventController::class, 'addBureau'])->name('add-bureau');

// //display event list
// Route::get('/dashboardPD', [eventController::class, 'displayEvent'])->name('dashboardPD');

//  //Display Program Director's profile
// Route::get('/PD Profile', function() {
//     return view('Program Director.PDProfile');
//  }); 


// Route::get('/PD Profile',  [committeeController::class, 'profilePD']);

// //Update Program Director's profile
// Route::post('PD Profile/{stud_id}', [committeeController::class, 'updateProfilePD'])->name('update-PD');


//---------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------

//PATH FOR COMMITTEE
//dashboard
Route::get('/dashboardCommittee', function () {
    return view('Committee.dashCom');
}); 

//committee profile
Route::get('/Committee Profile', function() {
    return view('Committee.commProfile');
 }); 

Route::get('/Committee Profile',  [CommitteeController::class, 'profileCommittee']);

//Update committee's profile
Route::post('Committee Profile/{stud_id}', [CommitteeController::class, 'updateProfileCommittee'])->name('update-Committee');

//display event list
Route::get('/dashboardCommittee', [EventController::class, 'displayEvent2'])->name('dashboardCommittee');

// display event details
Route::get('/eventDetails2/{event_id}',[EventController::class,'displayEventDetails2']);

// display task of the event
Route::get('/viewTaskComm/{event_id}',[TaskController::class,'taskDisplayPres']);

// display post mortem of the event
Route::get('/viewPMComm/{event_id}',[PostMortemController::class,'viewPMComm']);

//-------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------

//PD - Committee

//display event for PD - Committee
Route::get('/myEventComm',[RoleController::class,'assignedPDEventDisplay1']);

//display event details for PD - Committee
Route::get('/eventDetailsPDC/{event_id}',[RoleController::class,'PDEventDetailsComm']);

//Update event details PD - Committee
Route::post('eventDetailsPDC/{event_id}', [EventController::class, 'updateEventPDComm']);

//display committee to assigned and page assigned 
Route::get('/createRolesComm/{event_id}',[RoleController::class,'displayCreateRolesComm']);

//assigning role to the committee in the event
Route::post('/myEventComm/{event_id}', [RoleController::class, 'createRolesComm']);

//display role assignee 
Route::get('/listRoleAssignedComm/{event_id}',[RoleController::class,'displayRolesAssigned2']);

//update event status - PD Comm
Route::post('completeEventComm/{event_id}',[EventController::class, 'completeEventComm']);

//display task in myEventComm
Route::get('/viewTaskPDComm/{event_id}',[TaskController::class,'PDCommTaskList']);

//display post-mortem - PD Comm
Route::get('/viewPMPDComm/{event_id}',[PostMortemController::class,'viewPMPDComm']);

//generate post mortem - pd comm
Route::get('/generatePMComm/{event_id}', [PostMortemController::class,'generatePMComm']);

//---------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------


//ROLE Comm

//view task list Role Comm
Route::get('/myTaskComm',[TaskController::class,'assignedRoleEventDisplay2']);

//view add task form
Route::get('/addTaskComm/{role_id}',[TaskController::class,'displayFormWithRoleC']);

//role add task
Route::post('/myTaskComm1/{role_id}',[TaskController::class,'addTaskRoleComm']);

//role view task pres 
Route::get('/roleViewTaskComm/{task_id}',[TaskController::class,'roleViewTaskComm']);

//Update task details - role Pres
Route::post('roleViewTaskComm/{task_id}', [TaskController::class, 'updateTaskRoleComm']);

//Update task status
Route::post('/taskCompleteComm/{task_id}', [TaskController::class, 'taskCompleteComm']);

//Delete task 
Route::post('/taskDeleteComm/{task_id}', [TaskController::class, 'taskDeleteComm']);

//Role view post mortem page
Route::get('/viewPMRoleComm/{event_id}',[PostMortemController::class, 'viewPMRoleComm']);

//display post mortem add form
Route::get('/addPMComm/{role_id}',[PostMortemController::class,'displayPMFormComm']);

//add pm roles comm
Route::post('/myTaskComm2/{role_id}',[PostMortemController::class,'addPMRoleComm']);

//---------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------

//PATH FOR PRESIDENT
Route::get('/dashboardPres', function() {
    return view('President.dashPres');
});

// display event form
Route::get('Add Event', [eventController::class, 'displayCommPD']);

//add event
Route::post('create Event', [eventController::class, 'createEvent1'])->name('add-event');

// display event details
Route::get('/eventDetails/{event_id}',[EventController::class,'displayEventDetails1']);

//assign program director
Route::get('/assign Director/{eventID}', [RoleController::class, 'displayCommPD'])->name('assignPD');
Route::post('/dashboardPres', [RoleController::class, 'assignPD'])->name('assign-PD');

// display task of the event
Route::get('/viewTaskPres/{event_id}',[TaskController::class,'taskDisplayPres']);

// display post mortem of the event
Route::get('/viewPMPres/{event_id}',[PostMortemController::class,'viewPMPres']);

//President's profile
Route::get('/Pres Profile', function() {
    return view('President.presProfile');
 }); 
 
 Route::get('/Pres Profile',  [CommitteeController::class, 'profilePres']);
 
 //Update President's profile
 Route::post('Pres Profile/{stud_id}', [CommitteeController::class, 'updateProfilePres'])->name('update-pres');
 
 // //Deactivate committee's activation status
 // Route::post('/deactivate/{stud_id}', [committeeController::class, 'deactivate']);


//---------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------

//PD - PRESIDENT

//display event list
Route::get('/dashboardPres', [EventController::class, 'displayEvent1'])->name('dashboardPres');

//display event for PD - President
Route::get('/myEventPres2',[RoleController::class,'assignedPDEventDisplay']);

//display event details for PD - President
Route::get('/eventDetailsPDP/{event_id}',[RoleController::class,'PDEventDetailsPres']);

//Update event details - PD Pres
Route::post('eventDetailsPDP/{event_id}', [EventController::class, 'updateEventPDPres']);

//update event status - PD Pres
Route::post('completeEventPres/{event_id}',[EventController::class, 'completeEventPres']);

//display create roles form
 Route::get('/createRolePres/{event_id}',[RoleController::class,'displayCreateRolesPres']);

//Route::get('/createRolePres/{event_id}',[RoleController::class,'displayCommRole']);
Route::post('/myEventPres2/{event_id}', [RoleController::class, 'createRolesPres']);

//display role assignee 
Route::get('/listRoleAssignedPres/{event_id}',[RoleController::class,'displayRolesAssigned']);

//display task in myEventPres2
Route::get('/viewTaskPDPres2/{event_id}',[TaskController::class,'PDPresTaskList']);

//display post-mortem - PD Pres
Route::get('/viewPMPDPres/{event_id}',[PostMortemController::class,'viewPMPDPres']);

//send event id to generate pm
//Route::get('/viewPMPDPres/{event_id}',[PostMortemController::class,'sendEventID']);

//generate post mortem - pd pres
Route::get('/generatePMPres/{event_id}', [PostMortemController::class,'generatePMPres']);

//----------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------
//PRES - ROLE

//view task list Role Pres
Route::get('/myTaskPres',[TaskController::class,'assignedRoleEventDisplay']);

//view add task form
Route::get('/addTaskPres/{role_id}',[TaskController::class,'displayFormWithRole']);

//role add task
Route::post('/myTaskPres/{role_id}',[TaskController::class,'addTaskRolePres']);

//role view task pres 
Route::get('/roleViewTaskPres/{task_id}',[TaskController::class,'roleViewTaskPres']);

//Update task details - role Pres
Route::post('roleViewTaskPres/{task_id}', [TaskController::class, 'updateTaskRolePres']);

//Update task status
Route::post('/taskCompletePres/{task_id}', [TaskController::class, 'taskCompletePres']);

//Delete task 
Route::post('/taskDeletePres/{task_id}', [TaskController::class, 'taskDeletePres']);

//Role view post mortem page
Route::get('/viewPMRolePres/{event_id}',[PostMortemController::class, 'viewPMRolePres']);

//add pm roles pres
Route::post('/myTaskPres2/{role_id}',[PostMortemController::class,'addPMRolePres']);

Route::get('/taskListComplete2', function(){
    return view('President.taskListComplete2');
});