<?php
	require("config.php");
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$user_name = $_POST["user_name"];
		$password = $_POST["password"];
		$full_name = $_POST["full_name"];
		$email = $_POST["email"];
		$dd = $_POST["dd"];
		$mm = $_POST["mm"];
		$yyyy = $_POST["yyyy"];
		if($_POST["gender"] == "Male")
			$gender = 1;
		else
			$gender = 0;
		$sql = "insert into user (username, password, fullname, email, sex, dob, image) values ('$user_name', '$password', '$full_name', '$email', '$gender', '$yyyy'-'$mm'-'$dd', 'login.jpg')";
		if($conn->query($sql) == TRUE){
			$mess = "Sign up success";
			echo "<script> alert('$mess') </script>";
			header("Location: ../login.php");
		} else{
			$mess = "Sign up fail";
			echo "<script> alert('$mess') </script>";
		}
	}
?>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sign Up Form</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  
<div class="container">
  <form method="post" role="index" action="">
    <div class="row">
      <h4>Account</h4>
	  <div class="input-group ">
        <input name="user_name" type="text" placeholder="User Name"/>
      </div>
	  <div class="input-group">
        <input name="password" type="password" placeholder="Password"/>
      </div>
      <div class="input-group">
        <input name="full_name" type="text" placeholder="Full Name"/>
      </div>
      <div class="input-group">
        <input name="email" type="email" placeholder="Email Adress"/>
      </div>
    </div>
    <div class="row">
      <div class="col-half">
        <h4>Date of Birth</h4>
        <div class="input-group">
          <div class="col-third">
            <input name="dd" type="text" maxlength="2" placeholder="DD"/>
          </div>
          <div class="col-third">
            <input name="mm" type="text" maxlength="2" placeholder="MM"/>
          </div>
          <div class="col-third">
            <input name="yyyy" maxlength="4" type="text" placeholder="YYYY"/>
          </div>
        </div>
      </div>
      <div class="col-half">
        <h4>Gender</h4>
        <div class="input-group">
          <input type="radio" name="gender" value="male" id="gender-male"/>
          <label for="gender-male">Male</label>
          <input type="radio" name="gender" value="female" id="gender-female"/>
          <label for="gender-female">Female</label>
        </div>
      </div>
    </div>

    <div class="row">
	  <center><input type="submit" value="Sign Up" style="color:green;font-weight:bold;"></input></center> 
    </div>
  </form>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
