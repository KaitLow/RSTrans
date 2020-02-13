<?php
//************************************************
//20SP-SWDV-210-001: Intro Server Side Programming 
//  Author: Kait Low
//  Date: ?
//
//  20SP-SWDV-210-001: Intro Server Side Programming 
//  LAST MODIFIED: 2/12/2020
//  
//  Filename: employee.php
//  
//  Retrieves employee information from the database
//************************************************
    function getEmployee(){
        global $db;
            $query = 'SELECT employeeIDxx, employeeName FROM employee '
                    . 'ORDER BY employeeID';
            $statement = $db->prepare($query);
            try {
                $count = $statement->execute(); 
           } catch (Exception $ex){
                include('./database_error.php');
                exit();
           }  
            if ($count < 1){
                 include('./database_error.php');
                 exit();
           }
            $employees = $statement;
            return $employees;
   }
   
?>


