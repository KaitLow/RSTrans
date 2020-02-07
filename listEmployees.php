<?php
class Database {
    private static $dsn = 'mysql:host=localhost;dbname=RSTrans';
    private static $username = 'root';
    private static $password = 'Pa$$w0rd';
    private static $db;

    private function __construct() {}

    public static function getDB () {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                     self::$username,
                                     self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                //include('../errors/database_error.php');
                echo '</br>'.$error_message;
                exit();
            }
        }
        return self::$db;
    }
}
class Employee {
    private $id;
    private $name;

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function getID() {
        return $this->id;
    }

    public function setID($value) {
        $this->id = $value;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($value) {
        $this->name = $value;
    }
}
class EmployeeDB {
    public static function getEmployees() {
        $db = Database::getDB();
        $query = 'SELECT * FROM employee
                  ORDER BY employeeID';
        $statement = $db->prepare($query);
        $statement->execute();
        
        $employees = array();
        foreach ($statement as $row) {
            $employee = new Employee($row['employeeID'],
                                     $row['employeeName']);
            $employees[] = $employee;
        }
        return $employees;
    }
}
$employees = EmployeeDB::getEmployees();
?>
<!DOCTYPE html>
<html>
<head>
<!--
 Author: Kait Low
 Date: 2/5/2020
 
 LAST MODiFIED: 
 20SP-SWDV-210-001: Intro Server Side Programming 
 LAST MODIFIED: 2/7/2020

 Filename: listEmployees.php

Lists all employees.
-->
   <title>Employees</title>
   
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
	
	<table id="listEmployees">
            <?php foreach ($employees as $employee) : ?>
            <td>        
                    <?php echo $employee->getName(); ?>              
            </td>
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