<?php
//************************************************
//20SP-SWDV-210-001: Intro Server Side Programming 
//  Author: Kait Low
//  Date: 8/22/2019
//
//  20SP-SWDV-210-001: Intro Server Side Programming 
//  LAST MODIFIED: 2/7/2020
//  
//  Filename: admin.php
//  
//  Admin page to view visitor information.
//************************************************
    require_once('./model/database.php');
    require('./model/employee.php');
    require('./model/visitors.php');

        if (!isset($employee_id)) {
        $employee_id = filter_input(INPUT_GET, 'employee_id', 
                FILTER_VALIDATE_INT);
        if ($employee_id == NULL || $employee_id == FALSE) {
            $employee_id= 1;
        }
    }
         $password = 'Pa$$w0rd';

            try {
                $db = Database::getDB();   //function 1

            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                echo "DB Error: " . $error_message; 
                exit();
            }
            
            //Retrieves employee information from database
            $employees = getEmployee();    //function 2 
            
            //Retrieves visitor information from database
            $visitors = getVisitor();  //function 3
            
?>
<!DOCTYPE html>
<html>
<head>
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
            <li><a href="index.html">Home</a></li>
            <li><a href="seriesList.html">Novel List</a></li>
            <li><a href="mangaList.html">Manga List</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="login.php">Admin</a></li>
            </ul>
	</nav>
</header> 
<article>
    </br>
            <?php foreach ($employees as $employee) : ?>
     <div id="employeeList"><a href="admin.php?employee_id=<?php echo $employee['employeeID']; ?>">
                    <?php echo $employee['employeeName']; ?>
     </div> 
            <?php endforeach; ?>
    </br>
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