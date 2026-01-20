<?php
$error_message="";
$success_message="";
require "db.php";
session_start();

if(isset($_POST['create'])){
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = md5($_POST['password']);
    $confirm_pw = md5($_POST['confirm_password']);

    if ($password !== $confirm_pw) {
        $error_message = "Passwords do not match!";
    } else {

        $sqlun = "SELECT username FROM users WHERE username=?";
        $stmt = $pdo->prepare($sqlun);
        $stmt->execute([$username]);
        $result_uncheck = $stmt->fetch(PDO::FETCH_ASSOC);

        $sqlemail = "SELECT email FROM users WHERE email=?";
        $stmt = $pdo->prepare($sqlemail);
        $stmt->execute([$email]);
        $result_emailcheck = $stmt->fetch(PDO::FETCH_ASSOC);

        if($result_uncheck){
            $error_message = "This username is already in use. Try another.";
        }
        else if($result_emailcheck){
            $error_message = "This email is already in use. Try another.";
        }
        else{
            $insertsql = "INSERT INTO users(username,email,password,created_at)
                          VALUES(?,?,?,NOW())";
            $stmt = $pdo->prepare($insertsql);
            $stmt->execute([$username,$email,$password]);
            $success_message = "Signup Successful";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign Up - City Information System</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

<style>
*{
  margin:0;
  padding:0;
  box-sizing:border-box;
  font-family:"Segoe UI", Arial, sans-serif;
}
body{
  background: linear-gradient(135deg,#0766a9ff,#032c5cff);
  height:100vh;
  display:flex;
  justify-content:center;
  align-items:center;
}
.form-container{
  background: rgba(255,255,255,0.15);
  backdrop-filter: blur(10px);
  border-radius:15px;
  padding:40px 30px;
  width:380px;
  color:white;
  text-align:center;
  box-shadow:0 8px 20px rgba(0,0,0,0.3);
}
.form-container h2{
  margin-bottom:20px;
}
.input-group{
  margin-bottom:15px;
  text-align:left;
}
.input-group label{
  display:block;
  margin-bottom:5px;
}
.input-group input{
  width:100%;
  padding:10px;
  border-radius:8px;
  border:none;
  outline:none;
}
.btn{
  width:100%;
  padding:10px;
  background:#ffe082;
  border:none;
  border-radius:8px;
  font-weight:600;
  cursor:pointer;
}
.btn:hover{
  background:#ffd54f;
}
.link-text{
  margin-top:10px;
  font-size:14px;
}
.link-text a{
  color:#ddd;
  text-decoration:none;
}
.link-text a:hover{
  text-decoration:underline;
}
.bottom-text{
  margin-top:15px;
  font-size:14px;
}
.bottom-text a{
  color:#ffe082;
  font-weight:bold;
  text-decoration:none;
}
.bottom-text a:hover{
  text-decoration:underline;
}
</style>
</head>

<body>

<div class="form-container">
  <h2><i class="fas fa-user-plus"></i> Sign Up</h2>

  <?php if($error_message!=""){ ?>
    <div style="color:#ffd54f;margin-bottom:10px;font-weight:bold;">
      <?php echo $error_message; ?>
    </div>
  <?php } ?>

  <?php if($success_message!=""){ ?>
    <div style="color:#00ff99;margin-bottom:10px;font-weight:bold;">
      <?php echo $success_message; ?>
    </div>
  <?php } ?>

  <form method="POST" onsubmit="return validateForm()" novalidate>

    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" id="username">
      <p id="un-err-msg" style="color:#ffd54f;"></p>
    </div>

    <div class="input-group">
      <label>Email</label>
      <input type="email" name="email" id="email">
      <p id="email-err-msg" style="color:#ffd54f;"></p>
    </div>

    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password" id="password">
      <p id="pw-err-msg" style="color:#ffd54f;"></p>
    </div>

    <div class="input-group">
      <label>Confirm Password</label>
      <input type="password" name="confirm_password" id="confirm_password">
      <p id="c_pw-err-msg" style="color:#ffd54f;"></p>
    </div>

    <button type="submit" name="create" class="btn">Create Account</button>

    <!-- FORGOT PASSWORD -->
    <div class="link-text">
      <a href="forgot_password.php">Forgot Password?</a>
    </div>
  </form>

  <div class="bottom-text">
    Already have an account? <a href="signin.php">Sign In</a>
  </div>

</div>

<script>
function validateForm(){
  let un=document.getElementById("username").value.trim();
  let email=document.getElementById("email").value.trim();
  let pw=document.getElementById("password").value.trim();
  let cpw=document.getElementById("confirm_password").value.trim();

  document.getElementById("un-err-msg").innerHTML="";
  document.getElementById("email-err-msg").innerHTML="";
  document.getElementById("pw-err-msg").innerHTML="";
  document.getElementById("c_pw-err-msg").innerHTML="";

  let valid=true;
  const pwPattern=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
  const emailPattern=/^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if(un===""){document.getElementById("un-err-msg").innerHTML="Enter username";valid=false;}
  if(email===""){document.getElementById("email-err-msg").innerHTML="Enter email";valid=false;}
  else if(!emailPattern.test(email)){document.getElementById("email-err-msg").innerHTML="Invalid email";valid=false;}

  if(pw===""){document.getElementById("pw-err-msg").innerHTML="Enter password";valid=false;}
  else if(!pwPattern.test(pw)){document.getElementById("pw-err-msg").innerHTML="Weak password";valid=false;}

  if(cpw===""){document.getElementById("c_pw-err-msg").innerHTML="Confirm password";valid=false;}
  else if(pw!==cpw){document.getElementById("c_pw-err-msg").innerHTML="Passwords do not match";valid=false;}

  return valid;
}
</script>

</body>
</html>
