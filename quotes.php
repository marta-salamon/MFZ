<?php
 
<? include ("./base.php") ?>
 
$connection = new mysqli($servername, $username, $password, $dbname); //połączenie
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
 
$connection->set_charset("utf8"); 
 
$query = "SELECT Id, Quote, Name, Filename, Misc FROM MFZ_Quotes ORDER BY Id DESC"; //zapytanie
$result = $connection->query($query); //wynik zapytania
 
if ($result->num_rows > 0)
{
	$rowNumber = 0;
    while ($row = $result->fetch_assoc()) //mielenie po wierszu
    {
		$rowNumber++;
		
		 if ($rowNumber == 1)
			$newDiv = '<div class="item active">';
		else $newDiv = '<div class="item">';
         $newDiv .= '<blockquote>';
         $newDiv .= '<div class="row">';
         $newDiv .= '<div class="col-sm-3 text-center">';
         $newDiv .= '<img class="img-circle" src="./images/quotes/'.$row["Filename"].'" style="width: 100px;height:100px;">';
         $newDiv .= '</div>';
         $newDiv .= '<div class="col-sm-9">';
         $newDiv .= '<p>'.$row["Quote"].'</p>';
         $newDiv .= '<small>'.$row["Name"].'</small>';
         $newDiv .= '</div>';
         $newDiv .= '</div>';
         $newDiv .= '</blockquote>';
         $newDiv .= '</div>';
		 
		  echo $newDiv;
    }
}
else{
    echo "Blad polaczenia";
}
 
$connection->close();
?>