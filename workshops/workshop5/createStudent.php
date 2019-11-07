<?php
  include('functions.php');

  if(isset($_POST['full_name']) && isset($_POST['email']) ) {
    $saved = saveStudent($_REQUEST);

    if($saved) {
      header('Location: /?status=success');
    } else {
      header('Location: /?status=error');
    }
  } else {
    header('Location: /?status=error');
  }
