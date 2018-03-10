<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/aboutus.css">
</head>
<html>
	<body>
    <?php
  		//include("Navigationbar2.php");
  		include "dbconnect.php";
  		$db = new dbconnect;
  		$sql = "SELECT * FROM Pages INNER JOIN PagesHTML ON Pages.ID = PagesHTML.PagesID WHERE Pages.Name='Contact Us' ";
  		$result= $db->executesql($sql);
  		if($row=mysqli_fetch_array($result)){
  			$html = $row["HTML"];
  			$id=$row["PagesID"];
  		}
      ?>
    <?php include("header.php"); ?>
    <?php include("navbar.php"); ?>
    <?php
    echo $html;
    ?>
    <?php include("footer.php"); ?>
	</body>
</html>
