<?php 
session_start();

function clean($input){
      
  $input = trim($input);
  $input = htmlspecialchars($input);
  $input = stripcslashes($input);
  return $input; 
  }

 if($_SERVER['REQUEST_METHOD'] == "POST"){

  $_SESSION['name']       = $name      = $_POST['name'];
  $_SESSION['password']   = $password  = $_POST['password'];
  $_SESSION['email']      = $email     = $_POST['email'];
  $_SESSION['address']    = $address   = $_POST['address'];
  $_SESSION['linkedin']   = $linkedin  = $_POST['linkedin'];
 
 $errors  = [];

  if(empty($name)){
    $errors['Name'] = " Field Required";
  }elseif(stripos($name,'0-9_*%$@!(){}[]?=-')){
    $errors['Name'] = " Invalid ";
  }


  if(empty($email)){
    $errors['Email'] = " Field Required";
  }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['Email'] = " Invalid ";
  }

 
 if(empty($password)){
  $errors['Password'] = " Field Required";
 }elseif(strlen($password) < 6){
  $errors['Password'] = " must have at least 6 characters";
 }



 if(empty($address)){
  $errors['Address'] = " Field Required";
 }elseif(strlen($address) < 10){
  $errors['Address'] = " Have at least 10 characters";
 }



 if(empty($linkedin)){
  $errors['Linkedin'] = " Field Required";
 }elseif(!filter_var($linkedin,FILTER_VALIDATE_URL)){      
  $errors['Url'] = " Invalid";
 }



 if(empty($_SESSION['gender'] = $_POST["gender"])){
  $errors['Gender'] = " is Required";
}


  if(!empty($_SESSION['image'] = $_FILES['image']['name'])){

   $file_tmp  =  $_FILES['image']['tmp_name'];
   $file_name =  $_FILES['image']['name'];   
   $file_size =  $_FILES['image']['size'];
   $file_type =  $_FILES['image']['type'];   
  
 
   $file_ex    = explode('.',$file_name);
   $updated_ex = strtolower(end($file_ex));
   $allowed_ex = ["png","jpg"];
 
   if(in_array($updated_ex, $allowed_ex)){
    $finalName = rand().time().'.'.$updated_ex;
    $disPath = './uploads/'.$finalName;
 
   if(move_uploaded_file($file_tmp,$disPath)){
    $errors['Image'] = ' Uploaded';
   }else{
    $errors['Image'] = ' Error Try Again';
   }
 
   }else{
    $errors['Image'] ='* inValid Extension';
   }
 
   }else{
    $errors['Image'] = '* Field Required';
   }
 

   
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
  
  <form   action="<?php echo $_SERVER['PHP_SELF'];?>"  method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="exampleInputName">Name</label>
    <input type="text" class="form-control" name="name" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail">Email address</label>
    <input type="text"   class="form-control"  name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
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
    <input type="text" class="form-control" name="linkedin" id="exampleInputName" aria-describedby="" placeholder="Enter linkedin url">
  </div>

  <div class="group">
    <label for="exampleInputName">Gender</label><br>
    <input type="radio" class="form" name="gender" value="female">
    <label for="female">Female</label>
    <input type="radio" class="form" name="gender"  value="male">
    <label for="male">Male</label>
  </div>

  <div class="img">
  <h4>Upload Image</h4>
  <div class="form-group">
    <label for="exampleInputPassword">Image</label>
    <input type="file"  name="image">
  </div>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>