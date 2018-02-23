<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add food</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/meal.css">
    
<link href="css/style.css" rel='stylesheet' type="text/css" />

  </head>
  <body>
    <!-- header -->
    <?php include("Header.php"); ?>
    <!-- navbar -->
    <?php include("NavigationBar.php"); ?>

    <!-- footer -->
  	<!-- <?php include("Footer.php"); ?> -->
    <div class="bf">
        <form action="" method="POST">
            <table class="bftable">
              <tr>
                <th>Food</th>
                <th colspan="5" id="bfH">Snack</th>
              </tr>
              <tr>
                <th>Type</th>
                <th>Egg</th>
                <th>Cheese</th>
                <th>Zabady</th>
                <th>Apple</th>
                <th>Milk</th>  
              </tr>
              <tr>
                <th>Name</th>
                <td>
                    <div>
                    <input name="cb1" type="checkbox">
                    </div>
                </td>
                <td>
                    <div>
                    <input name="cb2" type="checkbox">
                    </div>  
                </td>
                <td>
                    <div>
                    <input name="cb3" type="checkbox">
                    </div>
                </td>
                <td>
                    <div>
                    <input name="cb4" type="checkbox">
                    </div>  
                </td>
                <td>
                    <div>
                    <input name="cb5"  type="checkbox">
                    </div>  
                </td>
              </tr>
            </table>
        </form>
    </div>
    
  </body>
</html>
