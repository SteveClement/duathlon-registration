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
                $ncat ="18&19 Junior (1998-1998)";
                break;
            case "c18_24":
                $ncat ="18-24 mixed (1992-1998)";
                break;
            case "c25_29":
                $ncat ="27-29 mixed (1991-1987)";
                break;
            case "c30_34":
                $ncat ="30-34 mixed (1986-1982)";
                break;
            case "c35_39":
                $ncat ="35-39 mixed (1981-1977)";
                break;
            case "c40_44":
                $ncat ="40-44 mixed (1976-1972)";
                break;
            case "c45_49":
                $ncat ="45-49 mixed (1971-1967)";
                break;
            case "c50_54":
                $ncat ="50-54 mixed (1966-1962)";
                break;
            case "c55_59":
                $ncat ="55-59 mixed (1961-1957)";
                break;
            case "c60_64":
                $ncat ="60-64 mixed (1956-1952)";
                break;
            case "c65_69":
                $ncat ="65-69 mixed (1951-1947)";
                break;
            case "c70_74":
                $ncat ="70-74 mixed (1946-1942)";
                break;
            case "c75_79":
                $ncat ="75-79 mixed (1941-1937)";
                break;
            case "c80_":
                $ncat ="80+ mixed (1936 and earlier)";
                break;
            }
        echo "id: " . $row["id"]. " - Name: " . $row["fname"] . " " . $ncat . "<br>";
    }
} else {
    echo "0 results";
}

$connection->close();
?>
