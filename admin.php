<?php
    if (!isset($employee_id)) {
    $employee_id = filter_input(INPUT_GET, 'employee_id', 
            FILTER_VALIDATE_INT);
    if ($employee_id == NULL || $employee_id == FALSE) {
        $employee_id= 1;
    }
}

//    $visitorName = filter_input(INPUT_POST, 'name');
//    $visitorEmail = filter_input(INPUT_POST, 'email');
//    $visitorComm = filter_input(INPUT_POST, 'message');
//    $Rating = filter_input(INPUT_POST, 'rate');    
//    $visitorUpdates = filter_input(INPUT_POST, 'mailBack');
    
            //Allows access to the database
            $dsn = 'mysql:host=localhost;dbname=RSTrans';
            $username = 'root';
            $password = 'Pa$$w0rd';

            try {
                $db = new PDO($dsn, $username, $password);

            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                echo "DB Error: " . $error_message; 
                exit();
            }
            
            //Retrieves employee information from database
            $query = 'SELECT employeeID, employeeName FROM employee '
                    . 'ORDER BY employeeID';
            $statement = $db->prepare($query);
            $statement->execute();  
            $employees = $statement;
            
            //Retrieves visitor information from database
            $query2 = 'SELECT * FROM visitor WHERE employeeID = :employeeID '
                    . 'ORDER BY visitorEmail;';
            $statement2 = $db->prepare($query2);
            $statement2->bindValue(":employeeID", $employee_id);
            $statement2->execute();   
            $visitors = $statement2;
?>
<!DOCTYPE html>
<html>
<head>
<!--
 SWDV-210-001-Intro Server Side Programming:
 
 Author: Kait Low
 Date: 1/31/2020

 LAST MODIFIED: 1/31/2020
 Filename: admin.php
 
Admin page to view visitor information.
-->
   <title>Visitor Information</title>
   
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
            </ul>
	</nav>
</header> 
<article>
        <ul>
            <?php foreach ($employees as $employee) : ?>
            <li><a href="admin.php?employee_id=<?php echo $employee['employeeID']; ?>">
                    <?php echo $employee['employeeName']; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
            <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th class="right">Comments</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($visitors as $visitor) : ?>
            <tr>
                <td><?php echo $visitor['visitorName']; ?></td>
                <td><?php echo $visitor['visitorEmail']; ?></td>
                <td class="right"><?php echo $visitor['visitorComm']; ?></td>
                <td><form action="delete.php" method="post">
                    <input type="hidden" name="visitor_id"
                           value="<?php echo $visitor['visitorID']; ?>">
                    <input type="hidden" name="employee_id"
                           value="<?php echo $visitor['visitorUpdates']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>     
</article>
<footer>
    <p>Follow us on Facebook and Instagram!</p>
<a link href="https://www.facebook.com/" target="_blank" ><img id="mediaLink" src="images/facebook.png" alt="Facebook" /></a> 
<a link href="https://www.instagram.com/" target="_blank" ><img  src="images/instagram.png" alt="Instagram" /></a>

</footer>
</main>
</body>
</html>