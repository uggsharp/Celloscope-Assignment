<?php
$servername = "localhost";
//$username = "username";
//$password = "password";
$dbname = "bankapp";

// Create connection
$conn = new mysqli($servername, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



$conn->close();
?>
<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php


$nameErr = $dobErr = $ageErr = $present_addressErr = $contact_noErr = $genderErr = $hobbyErr = "";
$name = $dob = $age= $present_address = $contact_no = $gender = $hobby = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["dob"])) {
    $dobErr = "Date of Birth is required";
  } else {
    $dob = test_input($_POST["dob"]);
  }

  if (empty($_POST["age"])) {
    $ageErr = "Age is required";
  } else {
    $age = test_input($_POST["age"]);
  }
    
  if (empty($_POST["contact_no"])) {
    $contact_noErr = "Contact number is required";
  } else {
    $contact_no = test_input($_POST["contact_no"]);
  }

  if (empty($_POST["present_address"])) {
    $present_addressErr = "Present Address is required";
  } else {
    $present_address = test_input($_POST["present_address"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

if (empty($_POST["hobby"])) {
    $hobby = "";
  } else {
    $hobby = test_input($_POST["hobby"]);
  }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Entry form for bank account holder</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="insert.php">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  Date of Birth: <input type="date" name="dob" value="<?php echo $dob;?>">
  <span class="error">* <?php echo $dobErr;?></span>
  <br><br>
  Age: <input type="number" name="age" value="<?php echo $age;?>">
  <span class="error">* <?php echo $ageErr;?></span>
  <br><br>
  Present Address: <textarea name="present_address" rows="5" cols="40"><?php echo $present_address;?></textarea>
  <span class="error">* <?php echo $present_addressErr;?></span>
  <br><br>
  Contact No: <input type="text" name="contact_no" value="<?php echo $contact_no;?>">
  <span class="error">* <?php echo $ageErr;?></span>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="third gender") echo "checked";?> value="third gender">Third Gender  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  Hobby: <textarea name="hobby" rows="2" cols="40"><?php echo $hobby;?></textarea>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Entered Info:</h2>";
echo $name;
echo "<br>";
echo $dob;
echo "<br>";
echo $age;
echo "<br>";
echo $present_address;
echo "<br>";
echo $contact_no;
echo "<br>";
echo $gender;
echo "<br>";
echo $hobby;
echo "<br>";
?>

</body>
</html>