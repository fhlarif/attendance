<?php
   
    require_once 'db/dbconfig.php';

    if(isset($_POST['submit'])){
        //extract value from $_POST array
        $id=$_POST['id'];
        $fname=$_POST['firstName'];
        $lname=$_POST['lastName'];
        $dob=$_POST['dob'];
        
        $email=$_POST['email'];
        $phone=$_POST['phoneNumber'];
        $speciality=$_POST['speciality'];

        //call crud function

        $result= $crud->editAttendee($id,$fname,$lname,$dob,$email,$phone,$speciality);

        if ($result){
            header("Location: viewrecords.php");
        }else{
            include "includes/errormessage.php";}
            header("Location: viewrecord.php");
    }
        else{
            include "includes/errormessage.php";
            header("Location: viewrecord.php");
        }
        ?>