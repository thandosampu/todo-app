<?php

// Add task
function add($task) {
  // Initialize
  //$tasklist = array();

  $tasklist = array();
  // Check if the session variable exist
  if (isset($_SESSION['tasks'])) {
    // Set our array to session variable
    $tasklist = $_SESSION['tasks'];
  }
  // Add our task to our array

  array_push($tasklist, $task);
 
  // Save our array back to our session
  $_SESSION['tasks'] = $tasklist;
}

// Delete task
function delete($task) {
  // Initialize our list
  $tasklist = $_SESSION['tasks'];

  foreach($tasklist as $key=>$val) {
    

    if(isset($val['task'])){
       if ($val['task'] == $task) {
      unset($tasklist[$key]);
    }
    }
   
  }
  // Check if the list is set
  //if (isset($tasklist)) {
    // Find task in tasklist return position
    //$position = array_search($task, $tasklist);
    // If the position is found = > 0
    //if ($position >= 0) {
      // delete task
      //unset($tasklist[$position]);
   // }
    // Save back to session
    $_SESSION['tasks'] = $tasklist;
  //}
}

function edit($updatetaskname, $newtaskname, $newduedate) {
  $tasklist =  $_SESSION['tasks'];
foreach($tasklist as $task) {
  if ($task['name'] == $updatetaskname) {
    $task['name'] = $newtaskname;
   array_replace($updatetaskname,$newtaskname, $newduedate);

  }
}
$_SESSION['tasks'] = $tasklist;
}

?>