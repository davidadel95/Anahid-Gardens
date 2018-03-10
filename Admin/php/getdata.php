<!DOCTYPE html>
<html>

	<head>
		<title>TinyMCE - Get Data</title>
	</head>
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
		if($_POST)
		{
				$NewHtml=$_POST["newhtml"];
				$sql = "UPDATE PagesHTML
				SET HTML = '$NewHtml'
				WHERE PagesID='$id';";
				$db->executesql($sql);
		}

	?>

	<body>
		<form method="post" action="">

			<textarea name="newhtml" class="tinymce" id="texteditor"> <?php echo $html; ?> </textarea>
			<input type="submit" >

		</form>


		<!-- javascript -->
		<script type="text/javascript" src="CDO/js/jquery.min.js"></script>
		<script type="text/javascript" src="CDO/plugin/tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="CDO/plugin/tinymce/init-tinymce.js"></script>
		<script type="text/javascript" src="CDO/js/getdata.js"></script>
	</body>
</html>
