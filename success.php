<?php
    $title='Success';
    require_once 'includes/header.php';
    require_once 'db/dbconfig.php';

    if(isset($_POST['submit'])){
        //extract value from $_POST array
        $fname=$_POST['firstName'];
        $lname=$_POST['lastName'];
        $dob=$_POST['dob'];
        $phone=$_POST['phoneNumber'];
        $email=$_POST['email'];
        $speciality=$_POST['speciality'];

        //call function  to insert and track if success or not
        $issuccess= $crud->insertAttendees($fname,$lname,$dob,$phone,$email,$speciality) ;

        if($issuccess){
            include "includes/successmessage.php";

        }else{
            include "includes/errormessage.php";
            header("Location: viewrecord.php");
        }
    }

    ?>

    
    <!-- This method GET -->
    <!-- <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                <?php //echo $_GET['firstName'].' '. $_GET['lastName'] ; ?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
            <?php //echo $_GET['dob'];?>
            </h6>
            <p class="card-text"><?php //echo $_GET['speciality'];?></p>
            <p class="card-text"><?php //echo $_GET['phoneNumber'];?></p>
            <p class="card-text"><?php //echo $_GET['email'];?></p>

            
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
        </div>
    </div> -->


    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Name: 
                <?php echo $_POST['firstName'].' '. $_POST['lastName'] ; ?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted"> DOB: 
            <?php echo $_POST['dob'];?>
            </h6>
            <p class="card-text">Speciality: <?php echo $_POST['speciality'];?></p>
            
            
            <p class="card-text">Phone: <?php echo $_POST['phoneNumber'];?></p>
            <p class="card-text">Email: <?php echo $_POST['email'];?></p>
        </div>
    </div>


    <?php
    //    echo $_GET['firstName'];
    //    echo $_GET['lastName'];
    //    echo $_GET['dob'];
    //    echo $_GET['speciality'];
    //    echo $_GET['phoneNumber'];
    //    echo $_GET['email'];
    ?>

<br/>
    <br/>
    <br/>
    <br/>

    <?php
    require_once 'includes/footer.php';?>