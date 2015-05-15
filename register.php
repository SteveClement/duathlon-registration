<?php
// mysqli connection variable
$connection = mysqli_connect('localhost', 'MD15', 'wellYouStoleThisUnprivil3ged ASSw0rd');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}

// select the correct db and die if something went wrong
$select_db = mysqli_select_db($connection, 'dbMD15');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}

    // If the values are posted, insert them into the database.
    if (isset($_POST['category']) && isset($_POST['fname']) && isset($_POST['country']) && isset($_POST['sex']) && isset($_POST['dobY'])){
        $category = $_POST['category'];
        $fname = $_POST['fname'];
        $street = $_POST['street'];
        $postcode = $_POST['postcode'];
        $locality = $_POST['locality'];
        $country = $_POST['country'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $dobY = $_POST['dobY'];
        $dobM = $_POST['dobM'];
        $dobD = $_POST['dobD'];
        $dob = $dobY . $dobM . $dobD;
        $sex = $_POST['sex'];
        $license = $_POST['license'];
        $club = $_POST['club'];
        $comment = $_POST['comment'];

        switch ($category) {
            case "c8_9":
                $ncat ="8&9 Kids B (2006-2007)";
                break;
            case "c10_11":
                $ncat ="10&11 Kids A (2004-2005)";
                break;
            case "c12_13":
                $ncat ="12&13 Youth C (2002-2003)";
                break;
            case "c14_15":
                $ncat ="14&15 Youth B (2000-2001)";
                break;
            case "c16_17":
                $ncat ="16&17 Youth A (1998-1999)";
                break;
            case "c18_19":
                $ncat ="18&19 Junior (1997-1997)";
                break;
            case "c18_24":
                $ncat ="18-24 mixed (1991-1997)";
                break;
            case "c25_29":
                $ncat ="27-29 mixed (1990-1986)";
                break;
            case "c30_34":
                $ncat ="30-34 mixed (1985-1981)";
                break;
            case "c35_39":
                $ncat ="35-39 mixed (1980-1976)";
                break;
            case "c40_44":
                $ncat ="40-44 mixed (1975-1971)";
                break;
            case "c45_49":
                $ncat ="45-49 mixed (1970-1966)";
                break;
            case "c50_54":
                $ncat ="50-54 mixed (1965-1961)";
                break;
            case "c55_59":
                $ncat ="55-59 mixed (1960-1956)";
                break;
            case "c60_64":
                $ncat ="60-64 mixed (1955-1951)";
                break;
            case "c65_69":
                $ncat ="65-69 mixed (1950-1946)";
                break;
            case "c70_74":
                $ncat ="70-74 mixed (1945-1941)";
                break;
            case "c75_79":
                $ncat ="75-79 mixed (1940-1936)";
                break;
            case "c80_":
                $ncat ="80+ mixed (1935 and earlier)";
                break;
            }
 
        $query = sprintf("INSERT INTO tblregistrations (category, fname, street, postcode, locality, country, tel, email, dob, sex, license, club, comment) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')", mysqli_real_escape_string($connection, $category) , mysqli_real_escape_string($connection, $fname), mysqli_real_escape_string($connection, $street), mysqli_real_escape_string($connection, $postcode), mysqli_real_escape_string($connection, $locality), mysqli_real_escape_string($connection, $country), mysqli_real_escape_string($connection, $tel), mysqli_real_escape_string($connection, $email),  mysqli_real_escape_string($connection, $dob), mysqli_real_escape_string($connection, $sex), mysqli_real_escape_string($connection, $license), mysqli_real_escape_string($connection, $club), mysqli_real_escape_string($connection, $comment));

        $result = mysqli_query($connection, $query);
        if($result){
            $msg = "Athlete " . $fname . " Registered Successfully. Please check your E-Mail (" . $email . ") for confirmation and further information.";
            // The headers
            $headers = 'From: register@duathlon.lu' . "\r\n" .
            //'Bcc: register@duathlon.lu' . "\r\n" .
            'Reply-To: register@duathlon.lu' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
            // The message
            $message = "Dear " . $fname . ",\r\nYou have register for the following age category: \r\n" . $ncat . "\r\nThe Mamer Duathlon will be on 18.06.2015 start ing at 11am with the Kids Races.\r\nMore information can be found here: http://duathlon.iondev.lu/fr/13/duathlon-mamer-2015/inscriptions/\r\n\r\n Until race-day rest well, train hard and most importantly have a lot of fun.\r\n\r\nSincerely yours, The Mamer Duathlon Orga Team";

            $message = wordwrap($message, 80, "\r\n");

            // Send
            mail($email, 'Mamer Duathlon 2015 registration', $message, $headers);
        } else {
            echo $query . "<br>";
            die('Invalid query execution: ' . mysqli_error($connection));
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
        echo "<h2><font color=#FF3131>" . $msg . "</font></h2>";
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
    <p><label>Full Name:&nbsp;</label>
    <input id="fname" type="text" name="fname" placeholder="Numm Virnumm" /></p>
    <p><label>Street:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input id="street" type="text" name="street" placeholder="Strooss" /></p>
    <p><label>Postcode:&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input id="postcode" type="text" name="postcode" placeholder="Postleetzuel" /></p>
    <p><label>Locality:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input id="locality" type="text" name="locality" placeholder="Uert" /></p>
    <p><label>Country:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input id="country" type="text" name="country" placeholder="Land" /></p>
    <p><label>Telephone:&nbsp;&nbsp;</label>
    <input id="tel" type="text" name="tel" placeholder="Telefon" /></p>
    <p><label>E-Mail:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input id="email" type="text" name="email" placeholder="ech@du.lu"/></p>
    <p><label>Date of Birth:</label>
    <input id="dobD" type="text" name="dobD" placeholder="01" maxlength="2" size="2" />
    <input id="dobM" type="text" name="dobM" placeholder="12" maxlength="2" size="2" />
    <input id="dobY" type="text" name="dobY" placeholder="1970" maxlength="4" size="4" /></p>
    <p><label>Gender:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input id="sex" type="radio" name="sex" value="male" >Male
    <input id="sex" type="radio" name="sex" value="female" checked>Female </p>
    <p><label>License:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input id="license" type="text" name="license" placeholder="Lizenz" /></p>
    <p><label>Club:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input id="club" type="text" name="club" placeholder="Club" /></p>
    <p><label>Comment:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
    <input id="comment" type="text" name="comment" placeholder="Kommentar" /></p>

    <input class="btn register" type="submit" name="submit" value="Register" />
    </form>
    
    <a class="twitter-follow-button"
      href="https://twitter.com/DuathlonLu"
      data-show-count="true"
      data-lang="en">
    Follow @DuathlonLu
    </a>

<p>
Les organisateurs déclinent toute responsabilité pour les éventuels accidents, vols ainsi que pour les dommages corporels ou matériels qui pourraient survenir lors de l’épreuve. Le participant déclare être en bonne santé et de participer à ces propres risques. Le port du casque lors de l’épreuve vélo est obligatoire et tout participant doit respecter les règles du Code de la Route, sous peine de pénalisation.
</p>

<p>
Der Teilnehmer erklärt dass er sich in einem gesunden Zustand befindet und dass er auf sein eigenes Risiko teilnimmt. Die Organisatoren lehnen jegliche Verantwortung ab für Unfälle, Diebstähle, sowie für körperliche und materielle Schäden, welche sich während des Wettbewerbs ereignen. Das Tragen eines Helmes während des Radrennens ist obligatorisch und jeder Teilnehmer muss sich an die Regeln der luxemburgischen Strassenverkehrsordnung halten, unter Ausschluss des Rennens.
</p>

<p>
The participant acknowledges his good health for this Duathlon event and that she will partake on her own responsibility. The organizer decline any personal responsibilities for accidents, thefts, as well ass material or physical damages to the athlete, that might happen during the event. The use of a helmet is obligatory during the road race and every participant has to respect the Luxembourgian traffic regulations, non-respect will lead to disqualification and exclusion of the race.
</p>

<p>
Attention: Pour les mineurs l‘autorisation parentale écrite est obligatoire. Les organisateurs déclinent toute responsabilité si le mineur a choisi de participer à une course d’une catégorie d’âge supérieur à celle prévue selon sa date de naissance.
</p>

<p>
Achtung: Für Jugendliche ist die schriftliche Zustimmung der Eltern erforderlich. Die Veranstalter lehnen jegliche Verantwortung ab wenn der Jugendliche in einer höher eingestuften Altersklasse als die nach seinem Geburtsdatum festgelegte Altersklasse starten möchte.
</p>

<p>
Attention: For Children and Youth &lt;18 years of age on race-day a written permission by their legal representative/parents is needed. The organizer decline any responsibilities if the under-age athlete decided to take part in a different age category.
</p>

</div>

</body>
</html>
