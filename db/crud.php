<?php
class crud{
    //private database object
    private $db;

    //constructor to initialise private variable to database connection
    function __construct($dbconfig)
    {
        $this->db = $dbconfig;
    }

    //function to insert new record into attendee database
    public function insertAttendees($fname,$lname,$dob,$email,$phone,$speciality){
        try {
            //(`attendee_id`, `firstname`, `lastname`, `dateofbirth`, `email`, `phonenumber`, `speciality_id`
            $sql= "INSERT INTO attendee(firstname,lastname,dateofbirth,email,phonenumber,speciality_id) VALUE (:fname,:lname,:dob,:phone,:email,:speciality)";
            $stmt= $this->db->prepare($sql);

            $stmt->bindparam(':fname',$fname);
            $stmt->bindparam(':lname',$lname);
            $stmt->bindparam(':dob',$dob);
            $stmt->bindparam(':email',$email);
            $stmt->bindparam(':phone',$phone);
            $stmt->bindparam(':speciality',$speciality);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function editAttendee($id,$fname,$lname,$dob,$email,$phone,$speciality){
        try {
            $sql="UPDATE `attendee` SET `firstname`=:fname,`lastname`=:lname,`dateofbirth`=:dob,`email`=:email,`phonenumber`=:phone,`speciality_id`=:speciality WHERE attendee_id=:id";
            $stmt= $this->db->prepare($sql);
    
                $stmt->bindparam(':id',$id);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':phone',$phone);
                $stmt->bindparam(':speciality',$speciality);
    
                $stmt->execute();
                return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
             
    }

    public function deleteAttendee($id){
        try {
            $sql="delete from attendee where attendee_id=:id";
            $stmt= $this->db->prepare($sql);    
            $stmt->bindparam(':id',$id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }

    }

    public function getAttendees(){
     try{
        $sql = "SELECT * FROM `attendee` a inner join speciality s on a.speciality_id=s.speciality_id" ;
        $result = $this->db->query($sql);
        return $result;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
    }

    public function getAttendeesDetails($id){
     try{
        $sql = "select * from attendee  a inner join speciality s on a.speciality_id=s.speciality_id where attendee_id=:id";
        $stmt=$this->db->prepare($sql);
        $stmt->bindparam(':id', $id);
        $stmt->execute();
        $result=$stmt->fetch();//for 1 row
        return $result;  
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
    }

    public function getSpeciality(){
    try{
        $sql = "SELECT * FROM `speciality`";
        $result = $this->db->query($sql);
        return $result;  
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
    }

}
?>