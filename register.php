<?php

// Make database connection
require('connect.php');

    $categories = array(
        "c7"      =>  "7 Bambini (2008)",
        "c8_9"      =>  "8&9 Kids B (2006-2007)",
        "c10_11"    =>  "10&11 Kids A (2004-2005)",
        "c12_13"    =>  "12&13 Youth C (2002-2003)",
        "c14_15"    =>  "14&15 Youth B (2000-2001)",
        "c16_17"    =>  "16&17 Youth A (1998-1999)",
        "c18_19"    =>  "18&19 Junior (1997-1997)",
        "c18_24"    =>  "18-24 mixed (1991-1997)",
        "c25_29"    =>  "27-29 mixed (1990-1986)",
        "c30_34"    =>  "30-34 mixed (1985-1981)",
        "c35_39"    =>  "35-39 mixed (1980-1976)",
        "c40_44"    =>  "40-44 mixed (1975-1971)",
        "c45_49"    =>  "45-49 mixed (1970-1966)",
        "c50_54"    =>  "50-54 mixed (1965-1961)",
        "c55_59"    =>  "55-59 mixed (1960-1956)",
        "c60_64"    =>  "60-64 mixed (1955-1951)",
        "c65_69"    =>  "65-69 mixed (1950-1946)",
        "c70_74"    =>  "70-74 mixed (1945-1941)",
        "c75_79"    =>  "75-79 mixed (1940-1936)",
        "c80_"      =>  "80+ mixed (1935 and earlier)"
    );

    // If the values are posted, insert them into the database.
    if (
            isset( $_POST[ 'category'   ] )
        &&  isset( $_POST[ 'fname'      ] )
        &&  isset( $_POST[ 'country'    ] )
        &&  isset( $_POST[ 'sex'        ] )
        &&  isset( $_POST[ 'dobY'       ] )
    ) {
        $category   = $_POST[ 'category'    ];
        $fname      = $_POST[ 'fname'       ];
        $street     = $_POST[ 'street'      ];
        $postcode   = $_POST[ 'postcode'    ];
        $locality   = $_POST[ 'locality'    ];
        $country    = $_POST[ 'country'     ];
        $tel        = $_POST[ 'tel'         ];
        $email      = $_POST[ 'email'       ];
        $dobY       = $_POST[ 'dobY'        ];
        $dobM       = $_POST[ 'dobM'        ];
        $dobD       = $_POST[ 'dobD'        ];
        $dob        = $dobY . $dobM . $dobD;
        $sex        = $_POST[ 'sex'         ];
        $license    = $_POST[ 'license'     ];
        $club       = $_POST[ 'club'        ];
        $comment    = $_POST[ 'comment'     ];

        $ncat = $categories[ $category ];

        $query = sprintf("INSERT INTO tblregistrations (category, fname, street, postcode, locality, country, tel, email, dob, sex, license, club, comment) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')", mysqli_real_escape_string($connection, $category) , mysqli_real_escape_string($connection, $fname), mysqli_real_escape_string($connection, $street), mysqli_real_escape_string($connection, $postcode), mysqli_real_escape_string($connection, $locality), mysqli_real_escape_string($connection, $country), mysqli_real_escape_string($connection, $tel), mysqli_real_escape_string($connection, $email),  mysqli_real_escape_string($connection, $dob), mysqli_real_escape_string($connection, $sex), mysqli_real_escape_string($connection, $license), mysqli_real_escape_string($connection, $club), mysqli_real_escape_string($connection, $comment));

        $result = mysqli_query($connection, $query);
        if($result){
            $msg = "Athlete " . $fname . " Registered Successfully. Please check your E-Mail (" . $email . ") for confirmation and further information.";
            // The headers
            $headers = "From: register@duathlon.lu\r\n" .
            "Bcc: register@duathlon.lu\r\n" .
            "Reply-To: register@duathlon.lu\r\n" .
            "X-Mailer: PHP/" . phpversion();
            // The message
            $message = "Dear $fname,\r\n" .
                    "You have registered for the following age category: \r\n"
                .   "$ncat \r\n"
                .   "The Mamer Duathlon will be on the 28.06.2015 starting at 11am with the Kids Races.\r\n"
                .   "More information can be found here: http://duathlon.lu/fr/13/duathlon-mamer-2015/inscriptions/\r\n"
                .   "Until race-day rest well, train hard and most importantly have a lot of fun doing it.\r\n"
                .   "\r\n"
                .   "Sincerely yours,\r\n"
                .   "The Mamer Duathlon Orga Team";

            $message = wordwrap($message, 80, "\r\n");

            // Send
            mail($email, 'Mamer Duathlon 2015 registration', $message, $headers);
        } else {
            echo $query . "<br>";
            die('Invalid query execution: ' . mysqli_error($connection));
        }
    } else {
            echo "Make sure you have entered at least your full name, a category, date of birth, gender and your nationality. Press back to change details.";
        }
    ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
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
    <?php
        foreach ( $categories as $categoryId => $categoryName ) {

            echo '<input id="category" type="radio" name="category" value="' . $categoryId . '"> ' . $categoryName . '<br />';

        }
    ?>
    </p>
    <p><div class="label">Full Name:</div>
    <input id="fname" type="text" name="fname" placeholder="Numm Virnumm" /></p>
    <p><div class="label">Street:</div>
    <input id="street" type="text" name="street" placeholder="Strooss" /></p>
    <p><div class="label">Postcode:</div>
    <input id="postcode" type="text" name="postcode" placeholder="Postleetzuel" /></p>
    <p><div class="label">Locality:</div>
    <input id="locality" type="text" name="locality" placeholder="Uert" /></p>
    <p><div class="label">Country:</div>
    <input id="country" type="text" name="country" placeholder="Land" /></p>
    <p><div class="label">Telephone:</div>
    <input id="tel" type="text" name="tel" placeholder="Telefon" /></p>
    <p><div class="label">E-Mail:</div>
    <input id="email" type="text" name="email" placeholder="ech@du.lu"/></p>
    <p><div class="label">Date of Birth:</div>
    <input id="dobD" type="text" name="dobD" placeholder="01" maxlength="2" size="2" />
    <input id="dobM" type="text" name="dobM" placeholder="12" maxlength="2" size="2" />
    <input id="dobY" type="text" name="dobY" placeholder="1970" maxlength="4" size="4" /></p>
    <p><div class="label">Gender:</div>
    <input id="sex" type="radio" name="sex" value="male" >Male
    <input id="sex" type="radio" name="sex" value="female" checked>Female </p>
    <p><div class="label">License?:</div>
    <input id="license" type="text" name="license" placeholder="Lizenz" /></p>
    <p><div class="label">Club?:</div>
    <input id="club" type="text" name="club" placeholder="Club" /></p>
    <p><div class="label">Comment?:</div>
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
The participant acknowledges his good health for this Duathlon event and that she will partake on her own responsibility. The organizer decline any personal responsibilities for accidents, thefts, as well as material or physical damages to the athlete, that might happen during the event. The use of a helmet is obligatory during the road race and every participant has to respect the Luxembourgian traffic regulations, non-respect will lead to disqualification and exclusion of the race.
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

<p>
Special thanks to <a href="https://twitter.com/Kaweechelchen" target=_blank>@Kaweechelchen</a> for his code clean-up :)
</p>

</div>

</body>
</html>
