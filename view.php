<?php
    $title='View Record';
    require_once 'includes/header.php';
    require_once 'db/dbconfig.php';
    //get attendee by id

    if (!isset($_GET['id'])){
        include "includes/errormessage.php";


    }else{
        $id=$_GET['id'];
        $result =$crud->getAttendeesDetails($id); 
        include "includes/successmessage.php";
    ?>


<div class="card" style="width: 18rem;">
        <div class="card-body">
            <!-- the result array simlar column naming in database -->
            <h5 class="card-title">Full Name: 
                <?php echo $result['firstname'].' '. $result['lastname'] ; ?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">Date of Birth:
            <?php echo $result['dateofbirth'];?>
            </h6>
            <p class="card-text">Speciality: <?php echo $result['name'];?></p>
            
            <p class="card-text">Email: <?php echo $result['email'];?></p>
            <p class="card-text">Contact Number: <?php echo $result['phonenumber'];?></p>
        </div>
    </div>
    <br/>

                <a href="viewrecords.php" class="btn btn-info">Back to list</a>       
                <a href="edit.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-warning">Edit</a>
                <a onclick="return confirm('Are you sure you want to delete this record')" href="delete.php?id=<?php echo $result['attendee_id'] ?>" class="btn btn-danger">Delete</a>
        
    
    <?php } ?>
<br/>
    <br/>
    <br/>
    <br/>

    <?php
    require_once 'includes/footer.php';?>