<?php
  include('functions.php');

$id=isset($_GET['id']);
  if($id) {
    $student = getStudent($_GET['id']);
      var_dump($student['id']);
  } else {
  //  header('Location: /index.php');
  }
    $saved = deleteStudent($student['id']);

    if($saved) {
     header('Location: /?status=success');
    } else {
     header('Location: /?status=error');
    }

