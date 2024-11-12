
<?php
include "header.php";
include "navbar.php";
include "dbConnection.php";
?>
<?php
if (isset($_POST['signup'])) {

  extract($_POST);
$errors= [];
if ($UserName=="") {
  $errors[]= "UserName is required";
}elseif(!is_string($UserName)){
$errors[]="UserName must be string";
}elseif(strlen($UserName)< 3){
  $errors[]="UserName must be more than 3 chars";
}

if ($email=="") {
  $errors[]="Email is required";
}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
  $errors[]="Email not valid";
}

if ($password=="") {
  $errors[]="Password is required";
}elseif(strlen($password) < 4){
  $errors[]="password must be more than 4 chars";
}

if ($phone=="") {
  $errors[] = "phone is required" ;
}elseif(!is_numeric($phone)){
  $errors[] = "phone must be numbers" ;
}

if ($address=="") {
  $errors[]="address is required";
}
if (empty($errors)) {
$newUser="insert into users(`name`,`email`,`password`,`phone`,`address`) VALUES ('$UserName','$email','$password','$phone','$address')";
$RunQuery= mysqli_query($conn,$newUser);

if ($RunQuery) {
  echo "data inserted sucess";
}else{
 echo "insert feild";
}
  
}else{
  foreach ($errors as $errors) {?>
    <div class="alert alert-danger"><?php echo $errors?></div>
  <?php
  }

}


}




?>

<div class="card-body px-5 py-5" style="background-color:darkgray;">



                <h3 class="card-title text-left mb-3">Register</h3>
                <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control p_input" name="UserName" value="">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control p_input" name="email">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control p_input" name="password">

                  </div>
                  <div class="form-group">
                    <label>Phone</label>
                    <input type="number" class="form-control p_input"name="phone">
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control p_input" name="address">
                  </div>
              
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                     
                  <div class="text-center">
                    <button type="submit" name="signup" class="btn btn-primary btn-block enter-btn">Signup</button>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-facebook col me-2">
                      <i class="mdi mdi-facebook"></i> Facebook </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> Google plus </button>
                  </div>
                  <p class="sign-up text-center">Already have an Account?<a href="login.php"> Login</a></p>
                  <p class="terms">By creating an account you are accepting our<a href="#"> Terms & Conditions</a></p>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

    <?php include "footer.php" ?>;


    <!-- regex 

  $regex = /^01[0,1,2,5][0-9]{8}$/

  preg_match($regex,) 
-->