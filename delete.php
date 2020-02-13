<?php
        //Allows access to the database
            $dsn = 'mysql:host=localhost;dbname=RSTrans';
            $username = 'root';
            $password = 'Pa$$w0rd';

            try {
                $db = new PDO($dsn, $username, $password);

            } catch (PDOException $e) {
                include('database_error.php');
                exit();
            }

    $visitor_id = filter_input(INPUT_POST, 'visitor_id', FILTER_VALIDATE_INT);
    //$employee_id = filter_input(INPUT_POST, 'employee_id', FILTER_VALIDATE_INT);  
    
        //Deletes visitor information from the database
            if ($visitor_id != false) {
            $query = 'DELETE FROM visitor
                      WHERE visitorID = :visitor_id';
            $statement = $db->prepare($query);
            $statement->bindValue(':visitor_id', $visitor_id);
            try {
                $statement->execute(); 
           } catch (Exception $ex){
                  include('database_error.php');
                exit();
           }      
            $statement->closeCursor();
            }
    // Display the admin page
    include('admin.php');
?>
