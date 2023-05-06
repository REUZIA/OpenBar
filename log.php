<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//-----------------------------------------------------------------------------------
//                         Credentials for database and salt
//-----------------------------------------------------------------------------------


//-----------------------------------------------------------------------------------
//                     !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//                     !!!                                !!!
//                     !!!  Absolutly remove before push  !!!
//                     !!!                                !!!
//                     !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//-----------------------------------------------------------------------------------


$dbhost = "localhost";
$dbport = "5432";
$dbname = "openbarista";
$dbuser = "openbarista";
$dbpass = "aEG5uXtBbywNyNn";

$salt="bp48!";

//-----------------------------------------------------------------------------------
//			                    Connection to the database
//-----------------------------------------------------------------------------------


$conn = pg_connect("host=$dbhost port=$dbport dbname=$dbname user=$dbuser password=$dbpass");
// Check for errors
if (!$conn) {
	die("Error: Unable to connect to database.");
}


//-----------------------------------------------------------------------------------
//                              Make hash password
//-----------------------------------------------------------------------------------


function password($uid, $password)
{
   $pass = $GLOBALS['salt'] . $password . $uid;
   $hashP = hash('sha256', $pass);
   return $hashP;
}


//-----------------------------------------------------------------------------------
//		                  	         Search User
//-----------------------------------------------------------------------------------
if (isset($_POST['submit'])){
   $password = trim($_POST['password']);
   $email = trim($_POST['email']);
   

	$sql = "SELECT uid, email, password FROM \"USER\" WHERE email = $1";
	$prep = pg_prepare($conn, "verifmel", $sql);
   $result = pg_execute($conn, "verifmel", array($email)); 
	if (pg_num_rows($result) == 1) {
      $row = pg_fetch_assoc($result);
      $hpassword = $row['password'];
      $uid = $row['uid'];
      $hpass = password($uid, $password);
      if ($hpass == $hpassword){
         echo "tu est bien Connecté";
      }
   }else{
      echo "Binôme identifient pot de passe non valide";

   }



}?>



<!DOCTYPE html>
<html lang="fr-FR">
<head>
	<title>Login</title>
</head>
<body>
      <form action="#" method="post">
		   <label for="email">Email:</label>
		   <input type="email" name="email" id="email" required>
		   <br>
		   <label for="password">Password:</label>
		   <input type="password" name="password" id="password" required>
		   <br>
		   <input type="submit" name='submit' value="log">
      </form>
    </div>
</body>

</html>
