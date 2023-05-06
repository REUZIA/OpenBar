
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//-----------------------------------------------------------------------------------
//            		  	     Credentials for database and salt
//		                 !!!  Absolutly remove before push  !!!
//-----------------------------------------------------------------------------------


$dbhost = "";
$dbport = "";
$dbname = "";
$dbuser = "";
$dbpass = "";

$salt="";


//-----------------------------------------------------------------------------------
//			                    Connection to the database
//-----------------------------------------------------------------------------------


$conn = pg_connect("host=$dbhost port=$dbport dbname=$dbname user=$dbuser password=$dbpass");
// Check for errors
if (!$conn) {
	die("Error: Unable to connect to database.");
}


//-----------------------------------------------------------------------------------
//		                  	         Insert new user
//-----------------------------------------------------------------------------------


function newUser($uid, $firstname, $lastname, $email, $permission, $hashed_password)
{

	
	$sql = "INSERT INTO \"USER\" (uid, firstname, lastname, email, permission, password) VALUES ($1, $2, $3, $4, $5, $6)";
	//Request to db
	$prep = pg_prepare($GLOBALS['conn'], "insertion",  $sql);
   $result = pg_execute($GLOBALS['conn'], "insertion", array($uid, $firstname, $lastname, $email, $permission, $hashed_password));

	// Check for errors
	if (!$result) {
		$message = "Error: Unable to create user.";
      return $message;
	} else {
		$message = "User created successfully.";
      return $message;
	}

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
//			                       Prepare variables 
//-----------------------------------------------------------------------------------


if (isset ($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['permission']) && isset($_POST['password']) && isset($_POST['confirmpassword']))
{
   $firstname = trim($_POST['firstname']);
   $lastname = trim($_POST['lastname']);
   $email = trim($_POST['email']);
   $permission = trim($_POST['permission']);
   $password = trim($_POST['password']);
   $confirmpassword = trim($_POST['confirmpassword']);
   
   // Check if the passwords match
   if ($password != $confirmpassword) 
   {
   	die("Error: Passwords do not match.");
   }



//-----------------------------------------------------------------------------------
//             			   Verrify if user dosen't exist 
//-----------------------------------------------------------------------------------


	$ext = "SELECT email FROM \"USER\" WHERE email = $1";
	$prep = pg_prepare($conn, "verifmel", $ext);
   $result = pg_execute($conn, "verifmel", array($email)); 
	if (pg_num_rows($result) > 0) {
		echo "Error: User with email $email already exists.";
		exit;
	}


//-----------------------------------------------------------------------------------
//			                    Get last uid in database
//-----------------------------------------------------------------------------------


	$select = "SELECT uid FROM \"USER\" ORDER BY uid DESC LIMIT 1";
	$res = pg_query($conn, $select);
	$row = pg_fetch_assoc($res);
	$lastUid = $row['uid'];
	// Determine the new UID for the user
	if (isset($lastUid)) 
	{
		// If there is a last UID, increment it by 1
		$newUid = ($lastUid < 32767) ? ($lastUid + 1) : null;

      $hashP = password($newUid, $password);
		$rez = newUser($newUid, $firstname, $lastname, $email, $permission, $hashP);
      echo $rez;
	
   } else 
	{
	      	// If there are no UIDs in the table, set the new UID to 1
		$newUid = 1;
      $hashP = password($newUid, $password);
		$rez = newUser($newUid, $firstname, $lastname, $email, $permission, $hashP);
      echo $rez;
	}
	
	// If the new UID is null, return an error message
	if (!$newUid) 
	{
	        echo "Error: Maximum UID value exceeded.";
	        exit;
	}	
}

?>




<!DOCTYPE html>
<html>
<head>
	<title>Create User</title>
</head>
<body>
	<h1>Create User</h1>
	<?php if(isset($message)) { ?>
		<p><?php echo $message; ?></p>
	<?php } ?>
	<form method="POST" action="#">
		<label for="firstname">First Name:</label>
		<input type="text" name="firstname" id="firstname" required>
		<br>
		<label for="lastname">Last Name:</label>
		<input type="text" name="lastname" id="lastname" required>
		<br>
		<label for="email">Email:</label>
		<input type="email" name="email" id="email" required>
		<br>
		<label for="permission">Permission:</label>
		<select name="permission" id="permission" required>
			<option value="">Choose a permission level</option>
			<option value="NC">Non cotisant</option>
			<option value="C">Cotisant</option>
			<option value="B">Bureau</option>
			<option value="A">Admin</option>
		</select>
		<br>
		<label for="password">Password:</label>
		<input type="password" name="password" id="password" required>
		<br>
		<label for="confirmpassword">Confirm Password:</label>
		<input type="password" name="confirmpassword" id="confirmpassword" required>
		<br>
		<input type="submit" value="Create User">
	</form>
</body>
</html>

