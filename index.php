<?php
    $title='Home';
    require_once 'includes/header.php';
    require_once 'db/dbconfig.php';
    $result= $crud->getSpeciality();    
?>
    <h1 class="text-center">Registration for IT Conference</h1>

    <form method="post" action="success.php">
        <div class="form-group">
            <label for="firstName">First Name</label>
            <input required type="text" class="form-control" id="firstName" name="firstName">
        </div>
        <div class="form-group">
            <label for="lastName">Last Name</label>
            <input type="text"required class="form-control" id="lastName" name="lastName">
        </div>
        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="text"required class="form-control" id="dob" name="dob">
        </div>
        <div class="form-group">
            <label for="speciality">Area of Expertise</label>
            <select class="form-control" id="speciality" name="speciality">
                <?php while($r =$result->fetch(PDO::FETCH_ASSOC)){  ?>
                    <option value=<?php echo $r['speciality_id']  ?> ><?php echo $r['name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email"required class="form-control" id="email" name="email" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="phoneNumber">Contact Number</label>
            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" aria-describedby="phoneNumberHelp">
            <small id="phoneNumberHelp" class="form-text text-muted">We'll never share your number with anyone else.</small>
        </div>
        <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>   
    </form>
    <br/>
    <br/>
    <br/>
    <br/>

    <?php
    require_once 'includes/footer.php';?>