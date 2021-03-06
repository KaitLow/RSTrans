<?php
//************************************************
//20SP-SWDV-210-001: Intro Server Side Programming 
//  Author: Kait Low
//  Date: 8/22/2019
//
//  20SP-SWDV-210-001: Intro Server Side Programming 
//  LAST MODIFIED: 2/12/2020
//  
//  Filename: thanks.php
//  
//  Thank you page linked to contact page.
//************************************************
    require('./model/database.php');
    $visitorName = filter_input(INPUT_POST, 'name');
    $visitorEmail = filter_input(INPUT_POST, 'email');
    $visitorComm = filter_input(INPUT_POST, 'message');
    $Rating = filter_input(INPUT_POST, 'rate');
    $error_message = null;
    
    $visitorUpdates = filter_input(INPUT_POST, 'mailBack');
    
    // Validate inputs
    if ($visitorName == null || $visitorEmail == null) {
        $error_message = "Invalid input data. Check all fields and try again.";
        
        echo "Form Data Error: " . $error_message; 
        //exit();
        } else {
            //Allows access to database
            try {
                //$db = new PDO($dsn, $username, $password);
                $db = Database::getDB();

            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('./database_error.php'); 
                echo "DB Error: " . $error_message; 
                exit();
            }

    if(!$error_message){
      
        //Sends data back to database
        $query = 'INSERT INTO visitor
                     (visitorName, visitorEmail, visitorComm, Rating, visitorUpdates, employeeID)
                  VALUES
                     (:visitorName, :visitorEmail, :visitorComm, :Rating, :visitorUpdates, 1)';
        $statement = $db->prepare($query);
        $statement->bindValue(':visitorName', $visitorName );
        $statement->bindValue(':visitorEmail', $visitorEmail);
        $statement->bindValue(':visitorComm', $visitorComm);
        $statement->bindValue(':Rating', $Rating);  
        $statement->bindValue(':visitorUpdates', $visitorUpdates);
          try {
                $count = $statement->execute(); 
           } catch (Exception $ex){
                include('./database_error.php');
                exit();
           } 
        $statement->closeCursor();

        if($count < 1){
           include('database_error.php');
           exit();
       }else{
           $error_message = 'Thank you for contacting me, '. $visitorName.'! </br> You gave '. $Rating . '  points!';
       }
    }
 }
?>
<!DOCTYPE html>
<html>
<head>
   <title>Thank you!</title>
   
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
	<!--<h1>Thank you for your feedback!</h1>-->
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