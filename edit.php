<?php
    $title='Edit Record';
    require_once 'includes/header.php';
    require_once 'db/dbconfig.php';
    $result= $crud->getSpeciality();

    if(!isset($_GET['id'])){
        include "includes/errormessage.php";
        header("Location: viewrecords.php");

    }else{
        $id = $_GET['id'];
        $attendee=$crud->getAttendeesDetails($id);
 
    

?>
    <h1 class="text-center">Edit Record</h1>

    <form method="post" action="editpost.php">
        <input type="hidden" name="id" value=<?php echo $attendee['attendee_id']  ?>/>
        <div class="form-group">
            <label for="firstName">First Name</label>
            <input type="text" class="form-control" value=<?php echo $attendee['firstname']  ?> id="firstName" name="firstName">
        </div>
        <div class="form-group">
            <label for="lastName">Last Name</label>
            <input type="text" class="form-control"value=<?php echo $attendee['lastname']  ?> id="lastName" name="lastName">
        </div>
        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="text" class="form-control"value=<?php echo $attendee['dateofbirth']  ?> id="dob" name="dob">
        </div>
        <div class="form-group">
            <label for="speciality">Area of Expertise</label>
            <select class="form-control" id="speciality" name="speciality">
                <?php while($r =$result->fetch(PDO::FETCH_ASSOC)){  ?>
                <option value="<?php echo $r['speciality_id']?>" <?php if($r['speciality_id']==$attendee['speciality_id']) echo 'selected'  ?>>
                    <?php echo $r['name'] ?>
                </option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="phoneNumber">Contact Number</label>
            <input type="text" class="form-control"value=<?php echo $attendee['phonenumber']  ?> id="phoneNumber" name="phoneNumber" aria-describedby="phoneNumberHelp">
            <small id="phoneNumberHelp" class="form-text text-muted">We'll never share your number with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control"value=<?php echo $attendee['email']  ?> id="email" name="email" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <button type="submit" class="btn btn-success" name="submit">Save Changes</button>   
        <a href="viewrecords.php" class="btn btn-info">Back to list</a>   
    </form>

    <?php } ?>
    <br/>
    <br/>
    <br/>
    <br/>

    <?php
    require_once 'includes/footer.php';?>