<?php
//************************************************
//20SP-SWDV-210-001: Intro Server Side Programming 
//  Author: Kait Low
//  Date: ?
//
//  20SP-SWDV-210-001: Intro Server Side Programming 
//  LAST MODIFIED: 2/12/2020
//  
//  Filename: visitors.php
//  
// Retrieves visitor information from the database.
//************************************************
    function getVisitor(){
        global $db;
        if (!isset($employee_id)) {
            $employee_id = filter_input(INPUT_GET, 'employee_id', 
                    FILTER_VALIDATE_INT);
            if ($employee_id == NULL || $employee_id == FALSE) {
                $employee_id= 1;
            }
        }
           $query2 = 'SELECT * FROM visitorss WHERE employeeID = :employeeID '
                     . 'ORDER BY visitorEmail;';
           $statement2 = $db->prepare($query2);
           $statement2->bindValue(":employeeID", $employee_id);
           try {
                $count = $statement2->execute(); 
           } catch (Exception $ex){
                include('./database_error.php');
                exit();
           }   
           if ($count < 1){
                 include('./database_error.php');
                 exit();
           }
           $visitors = $statement2;

           return $visitors;
    }
?>
