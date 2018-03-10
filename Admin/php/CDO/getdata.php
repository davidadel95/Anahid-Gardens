<!DOCTYPE html>
<html>

	<head>
		<title>TinyMCE - Get Data</title>
	</head>
	<?php
	include "dbconnect.php";
	$db = new dbconnect;
	$sql = "SELECT * FROM Pages INNER JOIN PagesHTML ON Pages.ID = PagesHTML.PagesID WHERE Pages.Name='Contact Us' "
	$result= $db->executesql($sql);
	if($row=mysqli_fetch_array($result)){
		$html = $row["HTML"];
	}

			if($_POST){


			}
	?>
	<body>
		<form id="get-data-form" method="post">

			<textarea class="tinymce" id="texteditor"> <h2>sdafsaf</h2></textarea>
			<textarea id="data-container"><?php echo $html ?> </textarea>
			<input type="submit" name="submit">

		</form>


		<!-- javascript -->
		<script type="text/javascript" src="CDO/js/jquery.min.js"></script>
		<script type="text/javascript" src="CDO/plugin/tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="CDO/plugin/tinymce/init-tinymce.js"></script>
		<script type="text/javascript" src="CDO/js/getdata.js"></script>
	</body>
</html>
