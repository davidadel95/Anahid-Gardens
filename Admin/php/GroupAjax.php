<?php
$Counter=0;
echo "<div>";
echo "<input name='".$Counter."'>";
echo '<button id="Shaf3y" class="btn btn-success" onclick="AddAnotherButton()"> Add New Field</button>';

echo "</div>";

echo "<div id='Shaf3yy'>";
echo "</div>";
?>
<script>
var counter=1;
document.getElementById("Shaf3y").addEventListener("click", Shaf3y);
function Shaf3y(){

  document.getElementById('Shaf3yy').innerHTML += '<input name='+counter+'> <br>' ;
  counter++;
}
</script>
