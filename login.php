<!DOCTYPE html>
<html>
<head>
<!--
 20SP-SWDV-210-001: Intro Server Side Programming 
 
 Author: Kait Low
 Date: 2/7/2020
 
 20SP-SWDV-210-001: Intro Server Side Programming 
 LAST MODIFIED: 2/7/2020
 
 Version: 5
 
 Filename: login.php
 
 Login Page to get to the admin page.
-->
   <title>Admin Login</title>
   
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <meta name="keywords" content="rising sun translations, japanese to english, manga, novels, english subs" />
   <meta name="description" content="Login at Rising Sun Translations!" />
   <link href="css/style1.css" rel="stylesheet" media="all" />
   <link rel="shortcut icon" href="images/favicon-16x16.png" sizes="16x16" type="image/png">
   <link rel="icon" href="images/favicon-32x32.png" sizes="16x16 32x32" type="image/png"> 
   
</head>
<main>
<header>		
	<div class="container">
	<div class="jumbotron">
		<figure>
			<img src="images/wave.jpg" alt="the great wave picture" />
		</figure>
	</div>
	
	<nav class="horizontal"> <a id="navicon" href="#"><img src="images/navicon.png" alt=""/></a>
		<ul>
		<li><a href="index.html">Home</a></li>
		<li><a href="seriesList.html">Novel List</a></li>
		<li><a href="mangaList.html">Manga List</a></li>
		<li><a href="contact.html">Contact</a></li>
                <li><a href="login.php">Admin</a></li>
		</ul>		
	</nav>
</header> 	
<article>
<h1>Rising Sun Translations</h1>
	<p>Please login to access the admin page!</p>

  <form  id="loginform" method="post" action="admin.php">
	<fieldset>
	<legend>Login!</legend>
<br />
        <div>
            <label for="name">Name<span style="color: #BC002D">*</span></label></br>
            <input name="name" id="name" type="text" required/>
        </div>
		
<br />
        <div>
            <label for="password">Password<span style="color: #BC002D">*</span></label></br>
            <input name="password" id="password" type="password" required/>
        </div>
		
<br />
		
    </fieldset>
		<div id="buttons">
                    <input id="submitButton" name="Submit" type="submit" value="Submit" />
                    
</form>
</article>
<footer>
	<p>Follow us on Facebook and Instagram!</p>
<a href="https://www.facebook.com/" target="_blank" ><img id="mediaLink" src="images/facebook.png" alt="Facebook" /></a> 
<a href="https://www.instagram.com/" target="_blank" ><img  src="images/instagram.png" alt="Instagram" /></a>
</footer>
</main>
</html>