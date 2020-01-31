<?php
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

    $visitor_id = filter_input(INPUT_POST, 'visitor_id', FILTER_VALIDATE_INT);
    //$employee_id = filter_input(INPUT_POST, 'employee_id', FILTER_VALIDATE_INT);  
    
        //Deletes visitor information from the database
            if ($visitor_id != false) {
            $query = 'DELETE FROM visitor
                      WHERE visitorID = :visitor_id';
            $statement = $db->prepare($query);
            $statement->bindValue(':visitor_id', $visitor_id);
            $sucess = $statement->execute();        
            $statement->closeCursor();
            }
    // Display the Product List page
    include('admin.php');
?>
