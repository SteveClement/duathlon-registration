<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Currently Registered Athletes at MD2016</title>
  <style type="text/css">
  body{
    font-family:Arial,Helvetica,Sans-serif;
    font-size:80%;
      font-color:#FF3131;
    }
    caption{
      padding-bottom:5px;
      font-weight:bold;
    }
    thead th,tfoot td{
      background:#00ACB9;
    }
    tr.ruled{
      background:#FF3131;
    }
    table{
      border:1px solid #000;
      border-collapse:collapse;
    }
    th,td{
      border:1px solid #000;
      border-collapse:collapse;
    }
    #mytable tr.ruled{
      background:#333;
      color:#ccc;
    }
  </style>
  <script type="text/javascript" src="tableruler.js"></script>
  <script type="text/javascript">
    window.onload=function(){tableruler();}
  </script>
</head>

<body>
<h1>Mamer Duathlon 2016 <br />Registered Athletes</h1>

<table class="ruler" id="mytable" summary="Table of registered athletes">
<caption>Athletes</caption>
<thead>
	<tr>
    <th scope="col">Athelete</th>
    <th scope="col">Category</th>
    <th scope="col">Country</th>
	</tr>
</thead>
<tbody>
<?php

// Make database connection
require('connect.php');

$sql = "SELECT id, category, fname, street, postcode, locality, country, tel, email, dob, sex, license, club, comment FROM tblregistrations where active=1 order by category";
$result = $connection->query($sql);

$c7 = $c8_9 = $c10_11 = $c12_13 = $c14_15 = $c16_17 = $c18_19 = $c18_24 = $c25_29 = $c30_34 = $c35_39 = $c40_44 = $c45_49 = $c50_54 = $c55_59 = $c60_64 = $c65_69 = $c70_74 = $c75_79 = $c80_ = 0;

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    switch ($row["category"]) {
      case "c7":
        $ncat = "7 Bambini (2009)";
        $c7++;
        break;
      case "c8_9":
        $ncat ="8&9 Kids B (2007-2008)";
        $c8_9++;
        break;
      case "c10_11":
        $ncat ="10&11 Kids A (2005-2006)";
        $c10_11++;
        break;
      case "c12_13":
        $ncat ="12&13 Youth C (2003-2004)";
        $c12_13++;
        break;
      case "c14_15":
        $ncat ="14&15 Youth B (2001-2002)";
        $c14_15++;
        break;
      case "c16_17":
        $ncat ="16&17 Youth A (1999-2000)";
        $c16_17++;
        break;
      case "c18_19":
        $ncat ="18&19 Junior (1998-1998)";
        $c18_19++;
        break;
      case "c18_24":
        $ncat ="18-24 mixed (1992-1997)";
        $c18_24++;
        break;
      case "c25_29":
        $ncat ="25-29 mixed (1991-1987)";
        $c25_29++;
        break;
      case "c30_34":
        $ncat ="30-34 mixed (1986-1982)";
        $c30_34++;
        break;
      case "c35_39":
        $ncat ="35-39 mixed (1981-1977)";
        $c35_39++;
        break;
      case "c40_44":
        $ncat ="40-44 mixed (1976-1972)";
        $c40_44++;
        break;
      case "c45_49":
        $ncat ="45-49 mixed (1971-1967)";
        $c45_49++;
        break;
      case "c50_54":
        $ncat ="50-54 mixed (1966-1962)";
        $c50_54++;
        break;
      case "c55_59":
        $ncat ="55-59 mixed (1961-1957)";
        $c55_59++;
        break;
      case "c60_64":
        $ncat ="60-64 mixed (1956-1952)";
        $c60_64++;
        break;
      case "c65_69":
        $ncat ="65-69 mixed (1951-1947)";
        $c65_69++;
        break;
      case "c70_74":
        $ncat ="70-74 mixed (1946-1942)";
        $c70_74++;
        break;
      case "c75_79":
        $ncat ="75-79 mixed (1941-1937)";
        $c75_79++;
        break;
      case "c80_":
        $ncat ="80+ mixed (1936 and earlier)";
        $c80_++;
        break;
      }
    echo "<tr>";
    echo "<td>" . ucfirst($row["fname"]) . "</td>";
    echo "<td>" . $ncat . "</td>";
    echo "<td>" . ucfirst(strtolower((substr($row["country"], 0, 3)))) . "</td>";
    echo "</tr>";

  }
} else {
  echo "0 results";
}

$sql = "SELECT count(*) FROM tblregistrations where active=1";
$result = $connection->query($sql);
$row = mysqli_fetch_row($result);
$num = $row[0];
echo "</tbody>";
echo "<tfoot>";
echo "  <tr>";
echo "    <td colspan=\"2\">Registered Athletes in all Categories: " . $num . "</td>";
$connection->close();
?>
  </tr>
<?php
echo "<tr>";
echo "    <td colspan=\"2\">Registered Athletes in Bambini: " . $c7 . "</td>";
echo "</tr>";
echo "<tr>";
echo "    <td colspan=\"2\">Registered Athletes in Kids B: " . $c8_9 . "</td>";
echo "</tr>";
echo "<tr>";
echo "    <td colspan=\"2\">Registered Athletes in Kids A: " . $c10_11 . "</td>";
echo "</tr>";
echo "<tr>";
echo "    <td colspan=\"2\">Registered Athletes in Youth C: " . $c12_13 . "</td>";
echo "</tr>";
echo "<tr>";
echo "    <td colspan=\"2\">Registered Athletes in Youth B: " . $c14_15 . "</td>";
echo "</tr>";
echo "<tr>";
echo "    <td colspan=\"2\">Registered Athletes in Youth A: " . $c16_17 . "</td>";
echo "</tr>";
echo "<tr>";
echo "    <td colspan=\"2\">Registered Athletes in Junior: " . $c18_19 . "</td>";
echo "</tr>";
echo "<tr>";
echo "    <td colspan=\"2\">Registered Athletes in 18-24: " . $c18_24 . "</td>";
echo "</tr>";
echo "<tr>";
echo "    <td colspan=\"2\">Registered Athletes in 25-29: " . $c25_29 . "</td>";
echo "</tr>";
echo "<tr>";
echo "    <td colspan=\"2\">Registered Athletes in 30-34: " . $c30_34 . "</td>";
echo "</tr>";
echo "<tr>";
echo "    <td colspan=\"2\">Registered Athletes in 35-39: " . $c35_39 . "</td>";
echo "</tr>";
echo "<tr>";
echo "    <td colspan=\"2\">Registered Athletes in 40-44: " . $c40_44 . "</td>";
echo "</tr>";
echo "<tr>";
echo "    <td colspan=\"2\">Registered Athletes in 45-49: " . $c45_49 . "</td>";
echo "</tr>";
echo "<tr>";
echo "    <td colspan=\"2\">Registered Athletes in 50-54: " . $c50_54 . "</td>";
echo "</tr>";
echo "<tr>";
echo "    <td colspan=\"2\">Registered Athletes in 55-59: " . $c55_59 . "</td>";
echo "</tr>";
echo "<tr>";
echo "    <td colspan=\"2\">Registered Athletes in 60-64: " . $c60_64 . "</td>";
echo "</tr>";
echo "<tr>";
echo "    <td colspan=\"2\">Registered Athletes in 65-69: " . $c65_69 . "</td>";
echo "</tr>";
echo "<tr>";
echo "    <td colspan=\"2\">Registered Athletes in 70-74: " . $c70_74 . "</td>";
echo "</tr>";
echo "<tr>";
echo "    <td colspan=\"2\">Registered Athletes in 75-79: " . $c75_79 . "</td>";
echo "</tr>";
echo "<tr>";
echo "    <td colspan=\"2\">Registered Athletes in 80+: " . $c80_ . "</td>";
echo "</tr>";
?>
</tfoot>
</table>
</body>
</html>
