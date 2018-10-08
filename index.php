<?php
session_start();

require 'functions.php';


//echo '$_GET: ';
//print_r($_GET);
//echo '$_POST: ';
//print_r($_POST);


// check if the delete and task is set in the GET / URL
if (isset($_GET['delete']) && isset($_GET['task'])) {
  // Call delete function with task
  delete($_GET['task']);
}

// check if the form has been submitted
if (isset($_POST['submit'])) {
  // Call add function with task
  $task = array ('task'=> $_POST['task'], 'duedate'=>$_POST['duedate']);
  add($task);
}

//edit called
$edittask = '';
if (isset($_GET['edit'])) {
   $edittask = $_GET['task'];
}
if (isset($_POST['submit'])) {
   if (isset($_POST['edit']) && $_POST['edit'] != ‘’) {
      edit($_POST['task']);
   }
   else {


   }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<form action="" method="POST">
  <label>Add Task:</label> <input type="text" name="task" class="taskname" value = "<?php echo $edittask;?>">
  <label>Due Date:</label> <input type="date" name="duedate" class="taskdate">
  
  <input type="submit" name="submit" class="btn" />
</form>
<ul>
  <?php
  if (isset($_SESSION['tasks'])) {
    echo 'No of tasks: ' . count($_SESSION['tasks']);
    foreach ($_SESSION['tasks'] as $task) {
      //var_dump ($task);
  ?>
    <li>
        <?php echo $task['task']; ?> <?php echo $task['duedate']; ?>
        <a class= "del" href="todo.php?delete=1&task=<?php echo $task['task']; ?>">
        <img src="https://vignette.wikia.nocookie.net/criminal-case-grimsborough/images/b/b1/Delete_Icon.png/revision/latest?cb=20141216101607" ></a>
      
        <a href="todo.php?edit=1&task=<?php echo $task['task']; ?>">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTv8nAYp_s-GPnpw6I-226nKMzfbnVE8CEJt0b1bzoXJRYN12dD9Q" ></a>
    </li>
  <?php
    }
  } ?>
</ul>
</body>
</html>