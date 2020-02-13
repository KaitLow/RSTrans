<?php
//************************************************
//20SP-SWDV-210-001: Intro Server Side Programming 
//  Author: Kait Low
//  Date: 2/12/2020
//
//  20SP-SWDV-210-001: Intro Server Side Programming 
//  LAST MODIFIED: 2/12/2020
//  
//  Filename: database_error.php
//  
//Page showing a database error.
//************************************************

$error_message = "We are experiencing technical difficulties. </br>Please try again later.";
?>
<!DOCTYPE html>
<html>
<head>
   <title>Uh oh!</title>
   
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <meta name="keywords" content="rising sun translations, japanese to english, manga, novels, english subs" />
   <meta name="description" content="Thank you!" /> 
   <link href="css/style1.css" rel="stylesheet" media="all" />
   <link rel="shortcut icon" href="images/favicon-16x16.png" sizes="16x16" type="image/png">
   <link rel="icon" href="images/favicon-32x32.png" sizes="16x16 32x32" type="image/png"> 
   
</head>
<body>   
<main>
<header>

    <div class="container">
    <div class="jumbotron">
            <figure>
                    <img src="images/wave.jpg" alt="the great wave picture" />
            </figure>
    </div>

      <nav class="horizontal"> <a id="navicon" href="#"><img src="images/navicon.png" alt="" /></a>
            <ul>
            <li><a link href="index.html">Home</a></li>
            <li><a link href="seriesList.html">Novel List</a></li>
            <li><a link href="mangaList.html">Manga List</a></li>
            <li><a link href="contact.html">Contact</a></li>
            <li><a href="login.php">Admin</a></li>
            </ul>
	</nav>
</header> 
<article>
          <h1><?php echo $error_message; ?></h1>	           
</article>
<footer>
    <p>Follow us on Facebook and Instagram!</p>
<a link href="https://www.facebook.com/" target="_blank" ><img id="mediaLink" src="images/facebook.png" alt="Facebook" /></a> 
<a link href="https://www.instagram.com/" target="_blank" ><img  src="images/instagram.png" alt="Instagram" /></a>

</footer>
</main>
</body>
</html>

