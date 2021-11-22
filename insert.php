<!DOCTYPE html>
<html>
  
<head>
    <title>Insert Page page</title>
</head>
  
<body>
    <center>
        <?php
  
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "bankapp";
  
        $conn = mysqli_connect("localhost", "root", "", "bankapp");
          
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
          
        // Taking all 5 values from the form data(input)
        $name =  $_REQUEST['name'];
        $dob = $_REQUEST['dob'];
        $age =  $_REQUEST['age'];
        $present_address = $_REQUEST['present_address'];
        $contact_no = $_REQUEST['contact_no'];
        $gender = $_REQUEST['gender'];
        $hobby = $_REQUEST['hobby'];
          
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO b_ac_holder  VALUES ('$name', 
            '$dob','$age','$present_address','$contact_no','$gender','$hobby')";
          
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully." 
                . " Please browse your localhost php my admin" 
                . " to view the updated data</h3>"; 
  
            echo nl2br("\n$name\n $dob\n "
                . "$age\n $present_address\n $contact_no\n $gender\n $hobby");
        } else{
            echo "ERROR: $sql. " 
                . mysqli_error($conn);
        }
          
        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>
  
</html>