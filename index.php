<?php
header("Location: login.php");
exit;
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

  <!-- <header>
    <div id="animationTete" class="tete">
      <div id="animationConteneurLogo" class="conteneurLogo">
        <img src="../../public/img/OpenBar_ALPHA.png" width="5027" height="2845" class="logo"   alt="OpenBar_ALPHA"/>
      </div>
    </div>
  </header> -->

  <!-- je doit fair vraiment du js pour bien le faire => faut faire calcule  -->

  <header>
    <div class="animationTete" id="tete" style="background-color: aqua;" >
      <div class="conteneurLogo"  id="animationConteneurLogo" style="background-color: red" >
        <img src="other/public/img/OpenBar_ALPHA.png" width="5027" height="2845" class="logo"   alt="OpenBar_ALPHA" style="background-color: wheat"/>
      </div>
    </div>
  </header>

  <script>
    // Get the browser window size
    var windowWidth = window.innerWidth;
    var windowHeight = window.innerHeight;
    if (windowHeight>windowWidth) {//tel
      document.getElementById("tete").style.height="auto";
    }
    else
    {
      document.getElementById("tete").style.height="100%";
    }

    document.getElementById("body").style.height=windowHeight+"px";

  </script>

</body>
</html>
