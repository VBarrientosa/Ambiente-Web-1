<?php
/**
 *  Gets a new mysql connection
 */
function getConnection() {
  $connection = new mysqli('localhost:3306', 'root', 'root', 'web');
  if ($connection->connect_errno) {
    printf("Connect failed: %s\n", $connection->connect_error);
    die;
  }
  return $connection;
}

/**
 * Inserts a new student to the database
 *
 * @student An associative array with the student information
 */
function saveStudent($student) {
  $conn = getConnection();
  $sql = "INSERT INTO students( `full_name`, `email`)
          VALUES ('{$student['full_name']}','{$student['email']}')";

  $conn->query($sql);
  if ($conn->connect_errno) {
    $conn->close();
    return false;
  }
  $conn->close();
  return true;
}


/**
 * Get all students from the database
 *
 */
function getStudents(){
  $conn = getConnection();
  $sql = "SELECT * FROM students";
  $result = $conn->query($sql);

  if ($conn->connect_errno) {
    $conn->close();
    return [];
  }
  $conn->close();
  return $result;
}

/**
 * Get one specific student from the database
 *
 * @id Id of the student
 */
function getStudent($id){
  $conn = getConnection();
  $sql = "SELECT * FROM students WHERE id = $id";
  $result = $conn->query($sql);

  if ($conn->connect_errno) {
    $conn->close();
    return [];
  }
  $conn->close();
  return $result->fetch_array();
}

function updateStudent($full_name,$email,$id){
  echo $id;
  $conn = getConnection();
  $sql = "UPDATE students SET full_name= '$full_name',email='$email' WHERE id=$id";
  $conn->query($sql);
  if ($conn->connect_errno) {
    $conn->close();
    return false;
  }
  $conn->close();
  return true;
  }
 

 function deleteStudent($id){
  $conn = getConnection();
  echo $id;
  $sql = "DELETE FROM students WHERE id = $id";
  $result = $conn->query($sql);

  if ($conn->connect_errno) {
    $conn->close();
    return false;
  }
  $conn->close();
  return true;
}