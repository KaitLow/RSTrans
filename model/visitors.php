<?php
    function getVisitor(){
        global $db;
        if (!isset($employee_id)) {
            $employee_id = filter_input(INPUT_GET, 'employee_id', 
                    FILTER_VALIDATE_INT);
            if ($employee_id == NULL || $employee_id == FALSE) {
                $employee_id= 1;
            }
        }
           $query2 = 'SELECT * FROM visitor WHERE employeeID = :employeeID '
                     . 'ORDER BY visitorEmail;';
           $statement2 = $db->prepare($query2);
           $statement2->bindValue(":employeeID", $employee_id);
           $statement2->execute();   
           $visitors = $statement2;

           return $visitors;
    }
?>
