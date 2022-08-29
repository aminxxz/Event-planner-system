<!DOCTYPE html>
<html>
<head>
 <title>Post Mortem - {{$event->event_name}}</title>
</head>
<body>
 <h1>{{$event->event_name}}</h1>
 <h3>Task</h3>
 <table border="1">
     <thead>
         <tr>
     <th>Roles</th>
     <th>Task Name</th>
     <th>Task Status</th>
     <th>Committee</th>
         </tr> 
    </thead>
    <tbody>
    @foreach ($taskEvent as $task)
    @if ($task->role_name != 'Program Director')
        <tr>
         <td>{{$task->role_name}}</td>
         <td>{{$task->task_name}}</td>
         <td>{{$task->task_status}}</td>
         <td>{{$task->name}}</td>
        </tr>
        @endif
     @endforeach
    </tbody>
    <tfoot>
        <tr>
     <th>Roles</th>
     <th>Task Name</th>
     <th>Task Status</th>
     <th>Committee</th>
        </tr>
    </tfoot>
 </table>
<br><br>
 <h3>Post-Mortem</h3>
 <table border="1">
    <thead>
        <tr>
    <th>Roles</th>
    <th>Issue</th>
    <th>Solution</th>
    <th>Suggestion</th>
        </tr> 
   </thead>
   <tbody>
    @foreach ($PMEvent as $pm)
    @if ($pm->role_name != 'Program Director') 
    <tr>
        <td>{{$pm->role_name}}</td>
        <td>{{$pm->issue}}</td>
        <td>{{$pm->solution}}</td>
        <td>{{$pm->suggestion}}</td>
    </tr>
    @endif
    @endforeach
   </tbody>
   
</table>
</body>
</html>
