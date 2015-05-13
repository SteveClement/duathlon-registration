<?php
    require('connect.php');
    // If the values are posted, insert them into the database.
    if (isset($_POST['category']) && isset($_POST['name']) && isset($_POST['fname']) && isset($_POST['country']) && isset($_POST['sex']) && isset($_POST['dob'])){
        $category = $_POST['category'];
        $name = $_POST['name'];
        $fname = $_POST['fname'];
        $street = $_POST['street'];
        $postcode = $_POST['postcode'];
        $locality = $_POST['locality'];
        $country = $_POST['country'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $sex = $_POST['sex'];
        $license = $_POST['license'];
        $club = $_POST['club'];
        $comment = $_POST['comment'];
 
        $query = "INSERT INTO tblregistrations (category, name, fname, street, postcode, locality, country, tel, email, dob, sex, license, club, comment) VALUES ('$category', $name', '$fname', '$street', '$postcode', '$locality', '$country', '$tel', '$email', '$dob', '$sex', '$license', '$club', '$comment')";
        $result = mysql_query($query);
        if($result){
            $msg = "User Created Successfully.";
        }
    }
    ?>

<!DOCTYPE html>
<html>
<head>
<title>Register for MD2015 - Duathlon.lu</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div class="register-form">
<?php
    if(isset($msg) & !empty($msg)){
        echo $msg;
    }
 ?>
<h1>Register</h1>
<form action="" method="POST">
    <p><label>Category:</label>
    <input id="category" type="text" name="category" placeholder="category" /></p>
    <p><label>Name:</label>
    <input id="name" type="text" name="name" placeholder="username" /></p>
    <p><label>Family Name:</label>
    <input id="fname" type="text" name="fname" placeholder="fname" /></p>
    <p><label>Street:</label>
    <input id="street" type="text" name="street" placeholder="street" /></p>
    <p><label>Postal code:</label>
    <input id="postcode" type="text" name="postcode" placeholder="postcode" /></p>
    <p><label>Locality:</label>
    <input id="locality" type="text" name="locality" placeholder="locality" /></p>
    <p><label>Country:</label>
    <input id="country" type="text" name="country" placeholder="country" /></p>
    <p><label>Telephone:</label>
    <input id="telephone" type="text" name="telephone" placeholder="telephone" /></p>
    <p><label>E-Mail : </label>
    <input id="email" type="email" name="email"/></p>
    <p><label>Date of Birth:</label>
    <input id="dob" type="text" name="dob" placeholder="dob" /></p>
    <p><label>Gender:</label>
    <input id="sex" type="radio" name="sex" value="male" placeholder="sex">Male
    <br>
    <input id="sex" type="radio" name="sex" value="female" checked>Female </p>
    <p><label>License:</label>
    <input id="license" type="text" name="license" placeholder="license" /></p>
    <p><label>Club:</label>
    <input id="club" type="text" name="club" placeholder="club" /></p>
    <p><label>Comment:</label>
    <input id="comment" type="text" name="comment" placeholder="comment" /></p>

    <a class="btn" href="login.php">Login</a>
    <input class="btn register" type="submit" name="submit" value="Register" />
    </form>
</div>
