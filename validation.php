<?php 

if($_SERVER['REQUEST_METHOD'] == "POST"){

 $name     = $_REQUEST['name'];
 $password = $_POST['password'];
 $email    = $_POST['email'];
 $address  = $_POST['address'];
 $linkedin = $_POST['linkedin'];
 
 $errors = []; 

  if(empty($name)){
    $errors['Name'] = " Field Required";
  }else{
    echo("welcome ". $name.'<br>');
  }



  if(empty($email)){
    $errors['Email'] = " Field Required";
  }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo("valid email address".'<br>');
  }




 if(empty($password)){
    $errors['Password'] = " Field Required";
 }
 elseif(strlen($password) < 6){
   echo("Have at least 6 characters".'<br>');
 }



 if(empty($address)){
  $errors['Address'] = " Field Required";
}
elseif(strlen($address) != 10){
 echo("Must have 10 characters".'<br>');
}



if(empty($linkedin)){
  $errors['Linkedin'] = " Field Required";
}
// elseif(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$linkedin)){
//   echo("Invalid URL");
// }



   if(count($errors) > 0){
    foreach($errors as $key => $val){
        echo $key.$val.'<br>';
    }
   }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Register</h2>
  
  <form   action="<?php echo $_SERVER['PHP_SELF'];?>"  method="post">

  <div class="form-group">
    <label for="exampleInputName">Name</label>
    <input type="text" class="form-control" name="name" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail">Email address</label>
    <input type="email"   class="form-control"  name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
  </div>
 
  <div class="form-group">
    <label for="exampleInputName">Address</label>
    <input type="text" class="form-control" name="address" id="exampleInputName" aria-describedby="" placeholder="Enter Address">
  </div>

  <div class="form-group">
    <label for="exampleInputName">Linkedin url</label>
    <input type="url" class="form-control" name="linkedin" id="exampleInputName" aria-describedby="" placeholder="Enter linkedin url">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>