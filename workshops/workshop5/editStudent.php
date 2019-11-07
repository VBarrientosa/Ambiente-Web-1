<?php
  include('functions.php');

  $id=isset($_GET['id']);
  if($id) {
    $student = getStudent($_GET['id']);
      
  } else {
  //  header('Location: /index.php');
  }

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

   $full_name = filter_input(INPUT_POST, 'full_name', FILTER_SANITIZE_STRING);
   $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
   $update = updateStudent($full_name,$email,$student['id']);
   if($update){
   
    header('Location: /?status=success ');
   }else{
        header('Location: /?status=success ');
   }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

  <title>Document</title>
</head>
<body>
<div class="container">
  
    <h1>Edit Student</h1>
    <form  method="POST" class="form-inline" role="form">
      <div class="form-group">
        <label class="sr-only" for="">Full Name</label>
        <input type="text" class="form-control" id="" name="full_name" placeholder="Full Name" value="<?php echo $student['full_name'] ?>">
      </div>
      <div class="form-group">
        <label class="sr-only" for="">Email</label>
        <input type="email" class="form-control" id="" name="email" placeholder="Email" value="<?php echo $student['email'] ?>">
      </div>

      <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>

</body>
</html>