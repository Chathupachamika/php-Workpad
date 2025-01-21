<?php
include 'connect.php';

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

</head>
<body>

<div class="container">
    <button>
        <a href="create.php" class="btn btn-primary my-5" class="text-light">Add New User</a>
    </button>

    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Sl No</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Password</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
    
  <?php
$sql = "Select * from 'crud'";
$result = mysqli_query($con,$sql);
if($result){
   while($row = mysqli_fetch_assoc($result)){
    $id = $row["id"];
    $name = $row["name"];
    $email = $row["email"];
    $phone = $row["phone"];
    $mobile = $row["mobile"];;
    echo '
    <tr>
       <th scope="row">'.$id.'</th>
       <td>'.$name.'</td>
       <td>'.$email.'</td>
       <td>'.$mobile.'</td>
       <td>'.$password.'</td>
       <td>
       <a href="update.php?updateid='.$id.'" class="btn btn-warning mr-2">Update</a>
       <a href="delete.php?deleteid='.$id.'" class="btn btn-danger">Delete</a>  </td>
       </td>
     </tr>
     ';
   }
}

?>
     
    // <tr>
    //   <th scope="row">3</th>
    //   <td colspan="2">Larry the Bird</td>
    //   <td>@twitter</td>
    // </tr>
  </tbody>
</table>
</div>

</body>
</html>