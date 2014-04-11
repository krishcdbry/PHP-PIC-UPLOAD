PHP-PIC-UPLOAD
==============

Uploading images using PHP , MySQL in Xampp

Required : HTML , PHP , MYSQL , XAMPP

index.html

  A simple form to upload image
  
upload_img.php

  This will get the details through which the further process goes.

  The block which receives the posted details.
  
     $k = $_FILES['image']['name'];
	 $j = $_FILES['image']['size'];
	 $n = $_FILES['image']['type'];
	 $t = $_FILES['image']['tmp_name'];
    

  Dealing with the valid formats  and checking the validity.
  
     $a = array('jpg','png','JPG','PNG','JPEG','GIF','BMP','gif','bmp','jpeg');  // Valid formats 
	 
     $i = explode('/',$n);    // finding the image format from type
	 
     if(in_array($i[1],$a)){
	 
	 $new_name = md5($t).''.time().''.$k;   // New name for the image (which we will save in database table)
	 
	 }

      
	
  The main block which moves the image and which stores the name in database.	
	
  if(move_uploaded_file($t,$path.$new_name)){
	
	    mysql_query("INSERT INTO image VALUES('','$new_name')");
		echo "Successfully uploaded <br><br>";
		echo "<img src=upload/".$new_name." height=400px>";
		
	}
	