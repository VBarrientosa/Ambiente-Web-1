
<?php
  require('functions.php');
 $message=" ";
  if(!empty($_REQUEST['status'])) {
    switch($_REQUEST['status']) {
      case 'success':
        $message = 'succesfully';
      break;
      case 'error':
        $message = 'Problems to do the action';
      break;
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
    <div class="msg">
      <h3 style="color:blue"><?php echo $message ?></h3>
    </div>
    <h1>Create Students</h1>
    <form action="/createStudent.php" method="POST" class="form-inline" role="form">
      <div class="form-group">
        <label class="sr-only" for="">Full Name</label>
        <input type="text" class="form-control" id="" name="full_name" placeholder="Full Name">
      </div>
      <div class="form-group">
        <label class="sr-only" for="">Email</label>
        <input type="email" class="form-control" id="" name="email" placeholder="Email">
      </div>

      <button type="submit" class="btn btn-primary">Save</button>
    </form>
    <table class="table table-light">
      <tbody>
        <tr>
          <td>Id</td>
          <td>Full Name</td>
          <td>Email</td>
          <td>Actions</td>
        </tr>
        <?php
          $students = getStudents();
          $studentsHtml = "";
          foreach ($students as $student) {
            $studentsHtml .= "<tr><td>{$student['id']}</td><td>{$student['full_name']}</td><td>{$student['email']}</td><td> <a href='/editStudent.php?id={$student['id']}'>Edit</a> | <a href='deleteStudent.php?id={$student['id']}'>Delete</a></td></tr>";
          }
          echo $studentsHtml;
        ?>
      </tbody>
    </table>
</div>

</body>
</html>

