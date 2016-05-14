<?php

// Make database connection
require('connect.php');

$sql = "SELECT id, category, fname, street, postcode, locality, country, tel, email, dob, sex, license, club, comment FROM tblregistrations";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        switch ($row["category"]) {
            case "c7A":
                $ncat = "7 Bambini (2009)";
            case "c8_9":
                $ncat ="8&9 Kids B (2007-2008)";
                break;
            case "c10_11":
                $ncat ="10&11 Kids A (2005-2006)";
                break;
            case "c12_13":
                $ncat ="12&13 Youth C (2003-2004)";
                break;
            case "c14_15":
                $ncat ="14&15 Youth B (2001-2002)";
                break;
            case "c16_17":
                $ncat ="16&17 Youth A (1999-2000)";
                break;
            case "c18_19":
                $ncat ="18&19 Junior (1997-1998)";
                break;
            case "cPromotion":
                $ncat ="Promotion mixed (=<1996)";
                break;
            case "cElites":
                $ncat ="Elites mixed (1977-1996)";
                break;
            case "cMasters":
                $ncat ="Masters mixed (=<1976)";
                break;
            }
        echo "id: " . $row["id"]. " - Name: " . $row["fname"] . " " . $ncat . "<br>";
    }
} else {
    echo "0 results";
}

$connection->close();
?>
