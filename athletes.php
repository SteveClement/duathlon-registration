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

    $c7 = $c8_9 = $c10_11 = $c12_13 = $c14_15 = $c16_17 = $c18_19 = $c18_24 = $cPromotion = $cElites = $cMasters = 0;

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
        $ncat ="18&19 Junior (1997-1998)";
        $c18_19++;
        break;
      case "cPromotion":
        $ncat ="Promotion mixed (=<1996)";
        $cPromotion++;
        break;
      case "cElites":
        $ncat ="Elites mixed (1977-1996)";
        $cElites++;
        break;
      case "cMasters":
        $ncat ="Elite mixed (=<1976)";
        $cMasters++;
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
echo "    <td colspan=\"2\">Registered Athletes in Promotion: " . $cPromotion . "</td>";
echo "</tr>";
echo "<tr>";
echo "    <td colspan=\"2\">Registered Athletes in Elites: " . $cElites . "</td>";
echo "</tr>";
echo "<tr>";
echo "    <td colspan=\"2\">Registered Athletes in Masters: " . $cMasters . "</td>";
echo "</tr>";
?>
</tfoot>
  </table>
</body>
</html>