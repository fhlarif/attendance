<?php
    require_once 'db/dbconfig.php';
    if (!$_GET['id']){
        include "includes/errormessage.php";
        header("Location: viewrecords.php");
    }else{
        //get id value
        $id=$_GET['id'];

        //call delete function
        $result=$crud->deleteAttendee($id);

        //redirect the list
        if($result){
            header("Location: viewrecords.php");
            include "includes/successmessage.php";
        }
        else{
            include "includes/errormessage.php";
            header("Location: viewrecords.php");
        }
    }
    ?>