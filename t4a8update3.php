
<?php

/********** Access the database      **********/



   $username = getenv('C9_USER');
   $password = "";
   $host = "127.0.0.1";
   $database = "c9";
   $table = "c9table";
		
   mysql_connect($host,$username,$password)or die(mysql_error());
   mysql_select_db($database)or die(mysql_error());



/********** Get the old post information      **********/

   
	$myNamePHP=mysql_real_escape_string($_POST['myNamePost']);
	$myXPHP=mysql_real_escape_string($_POST['myXPost']);
	$myYPHP=mysql_real_escape_string($_POST['myYPost']);



/********** create html input text boxes using the old post information      **********/

?>

<form action="t4a8update3.php" method="post">
	
   Your name: <input type="text" name="myNamePost"  value="<?php echo $myNamePHP; ?>"><br>
   Your X location: <input type="text" name="myXPost"  value="<?php echo $myXPHP; ?>"><br>
   Your Y location: <input type="text" name="myYPost"  value="<?php echo $myYPHP; ?>"><br>
   <input type="submit" /></p>
</form>



<?php





/********** If a name is not empty then update a record      **********/

   if ($myNamePHP != ''){	
      if (!mysql_query("UPDATE $table SET myX ='$myXPHP', myY ='$myYPHP'  WHERE myName ='$myNamePHP'  "))
        {
          die('Error: ' . mysql_error());
         }
      echo "1 record updated";
   }





   $sql = "SELECT*FROM $table";








   $result = mysql_query($sql);
   if(mysql_num_rows($result) >0){
      while($row=mysql_fetch_array($result)){


/********** here we print each database entry      **********/

         echo "myName = $row[myName] <br>";
         echo "myX =$row[myX]  <br>";
         echo "myY= $row[myY]  <br>";
         echo "mySpeedX= $row[mySpeedX]  <br>";
         echo "mySpeedY= $row[mySpeedY]  <br>";
         echo "myImageAt = $row[myImageAt]  --->";
         echo "<img src='$row[myImageAt]' width=20> <hr>";
      }
   }



mysql_close();     // close the database
?>






