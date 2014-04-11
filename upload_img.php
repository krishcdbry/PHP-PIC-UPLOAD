<?php 
mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("db1") or die(mysql_error());  // Let your database will be db1

if(isSet($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
    
	 $k = $_FILES['image']['name'];
	 $j = $_FILES['image']['size'];
	 $n = $_FILES['image']['type'];
	 $t = $_FILES['image']['tmp_name'];
	 
	 $path = "pics/";    // create a folder with name upload  
	 
     $a = array('jpg','png','JPG','PNG','JPEG','GIF','BMP','gif','bmp','jpeg');  // Valid formats 
	 
     $i = explode('/',$n);    // finding the image format from type
	 
     if(in_array($i[1],$a)){
	 
	 $new_name = md5($t).''.time().''.$k;   // New name for the image (which we will save in database table)
	 
	 
	if(move_uploaded_file($t,$path.$new_name)){
	
	    mysql_query("INSERT INTO image VALUES('','$new_name')");
		echo "Successfully uploaded <br><br>";
		echo "<img src=upload/".$new_name." height=400px>";
		
	}
}
else{
	echo "Invalid format";
}
}

?>