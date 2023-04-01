<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Handle form submission
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  // Do something with email and password, like check against a database
  // or authenticate against a third-party service
  
  // Redirect to a success page
  header('Location: success.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Landing Page</title>
  <link rel="stylesheet" href="other/public/css/style.css">

</head>


<body id="body">
  <script>
  
    // Get the browser window size
    var windowWidth = window.innerWidth;
    var windowHeight = window.innerHeight;
    document.getElementById("body").style.height=windowHeight+"px";

    //password
    function show() {
      var x = document.getElementById("myPsw");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    } 

    //faire fonction suprimmer texte

  </script>

    <header>
      <div id="tete">
        <div class="conteneurLogo">
           <img src="other/public/img/OpenBar_ALPHA.png" width="5027" height="2845" class="logo"   alt="OpenBar_ALPHA"/>
        </div>
      </div>
    </header>
    
    <div class="loginconteneur">
      <form class="box" action="login.php" method="post">
          <h1 style="text-align: center;margin: -10px;">Login </h1>
          <p class="soustitrelogin">Email </p>
          <div type="contain">
            <input type="email" name="email" placeholder="email" required>
            <div type="item">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="#F79725" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 6 6 18M6 6l12 12"/>
              </svg>
            </div>
          </div>
          <p class="soustitrelogin">Password </p>
          <div type="contain">
            <input type="password" id="myPsw" name="password" placeholder="password" required>
            <div type="item">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="3" stroke="#F79725" stroke-width="2"/>
                <path stroke="#F79725" stroke-width="2" d="M20.188 10.934c.388.472.582.707.582 1.066 0 .359-.194.594-.582 1.066C18.768 14.79 15.636 18 12 18c-3.636 0-6.768-3.21-8.188-4.934-.388-.472-.582-.707-.582-1.066 0-.359.194-.594.582-1.066C5.232 9.21 8.364 6 12 6c3.636 0 6.768 3.21 8.188 4.934Z"/>
              </svg>
            </div>
          </div>
          <input type="submit" id="test" name="" value="Login">            
          <div type="end">
            <a href="#" type="fp">forgot password ? </a>
            <a href="#" type="r">Register</a>
          </div>
      </form>
    </div>
</body>