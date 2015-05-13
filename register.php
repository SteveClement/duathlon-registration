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
        $dob = "$_POST['dobY'] . $_POST['dobM'] . $_POST['dobD']";
        echo $dob;
        $sex = $_POST['sex'];
        $license = $_POST['license'];
        $club = $_POST['club'];
        $comment = $_POST['comment'];
 
        $query = sprintf("INSERT INTO tblregistrations (category, name, fname, street, postcode, locality, country, tel, email, dob, sex, license, club, comment) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')", mysql_real_escape_string($category) , mysql_real_escape_string($name), mysql_real_escape_string($fname), mysql_real_escape_string($street), mysql_real_escape_string($postcode), mysql_real_escape_string($locality), mysql_real_escape_string($country), mysql_real_escape_string($tel), mysql_real_escape_string($email),  mysql_real_escape_string($dob), mysql_real_escape_string($sex), mysql_real_escape_string($license), mysql_real_escape_string($club), mysql_real_escape_string($comment));

        $result = mysql_query($query);
        if($result){
            $msg = "User Created Successfully.";
        } else {
            echo $query . "<br>";
            die('Invalid query execution: ' . mysql_error());
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

<script>window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return t;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));</script>
<div class="register-form">
<?php
    if(isset($msg) & !empty($msg)){
        echo $msg;
    }
 ?>
<h1>Register</h1>
<form action="" method="POST">
    <p><label>Categories:</label> <br>
    <input id="category" type="radio" name="category" value="c8_9"> 8&amp;9 Kids B (2006-2007) <br>
    <input id="category" type="radio" name="category" value="c10_11"> 10&amp;11 Kids A (2004-2005) <br>
    <input id="category" type="radio" name="category" value="c12_13"> 12&amp;13 Youth C (2002-2003) <br>
    <input id="category" type="radio" name="category" value="c14_15"> 14&amp;15 Youth B (2000-2001) <br>
    <input id="category" type="radio" name="category" value="c16_17"> 16&amp;17 Youth A (1998-1999) <br>
    <input id="category" type="radio" name="category" value="c18_19"> 18&amp;19 Junior (1997-1997) <br>
    <input id="category" type="radio" name="category" value="c18_24"> 18-24 mixed (1991-1997) <br>
    <input id="category" type="radio" name="category" value="c25_29"> 27-29 mixed (1990-1986) <br>
    <input id="category" type="radio" name="category" value="c30_34"> 30-34 mixed (1985-1981) <br>
    <input id="category" type="radio" name="category" value="c35_39"> 35-39 mixed (1980-1976) <br>
    <input id="category" type="radio" name="category" value="c40_44"> 40-44 mixed (1975-1971) <br>
    <input id="category" type="radio" name="category" value="c45_49"> 45-49 mixed (1970-1966) <br>
    <input id="category" type="radio" name="category" value="c50_54"> 50-54 mixed (1965-1961) <br>
    <input id="category" type="radio" name="category" value="c55_59"> 55-59 mixed (1960-1956) <br>
    <input id="category" type="radio" name="category" value="c60_64"> 60-64 mixed (1955-1951) <br>
    <input id="category" type="radio" name="category" value="c65_69"> 65-69 mixed (1950-1946) <br>
    <input id="category" type="radio" name="category" value="c70_74"> 70-74 mixed (1945-1941) <br>
    <input id="category" type="radio" name="category" value="c75_79"> 75-79 mixed (1940-1936) <br>
    <input id="category" type="radio" name="category" value="c80_"> 80+ mixed (1935 and earlier)
    </p>
    <p><label>Name:</label>
    <input id="name" type="text" name="name" placeholder="Numm" /></p>
    <p><label>Family Name:</label>
    <input id="fname" type="text" name="fname" placeholder="Virnumm" /></p>
    <p><label>Street:</label>
    <input id="street" type="text" name="street" placeholder="Strooss" /></p>
    <p><label>Postal code:</label>
    <input id="postcode" type="text" name="postcode" placeholder="Postleitzahl" /></p>
    <p><label>Locality:</label>
    <input id="locality" type="text" name="locality" placeholder="Uert" /></p>
    <p><label>Country:</label>
    <input id="country" type="text" name="country" placeholder="Land" /></p>
    <p><label>Telephone:</label>
    <input id="tel" type="text" name="tel" placeholder="Telefon" /></p>
    <p><label>E-Mail : </label>
    <input id="email" type="text" name="email" placeholder="ech@du.lu"/></p>
    <p><label>Date of Birth:</label>
    <input id="dobD" type="text" name="dobD" placeholder="01" maxlength="2" size="2" />
    <input id="dobM" type="text" name="dobM" placeholder="12" maxlength="2" size="2" />
    <input id="dobY" type="text" name="dobY" placeholder="1970" maxlength="4" size="4" /></p>
    <p><label>Gender:</label>
    <input id="sex" type="radio" name="sex" value="male" >Male
    <input id="sex" type="radio" name="sex" value="female" checked>Female </p>
    <p><label>License:</label>
    <input id="license" type="text" name="license" placeholder="Lizenz" /></p>
    <p><label>Club:</label>
    <input id="club" type="text" name="club" placeholder="Club" /></p>
    <p><label>Comment:</label>
    <input id="comment" type="text" name="comment" placeholder="Kommentar" /></p>

    <input class="btn register" type="submit" name="submit" value="Register" />
    </form>
    
    <a class="twitter-follow-button"
      href="https://twitter.com/DuathlonLu"
      data-show-count="true"
      data-lang="en">
    Follow @DuathlonLu
    </a>
</div>

</body>
</html>