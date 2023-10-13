  <?php
  
 
  if(isset($_POST['submit'])){
	
    // Get phone number and sanitize it
    $phone = $_POST['phone'];
	$tirthcode = $_POST['tirthcode'];
	echo $tirthcode;
	
	
    $phone = preg_replace("/[^0-9]/", "", $phone); // Remove non-numeric characters
	
	//exit();

    // Create a directory with the phone number if it doesn't exist
    $directory = 'image/';
    if (!is_dir($directory)) {
      mkdir($directory, 0755, true);
    }
	
	
	
	  // Generate a unique file name with date and time
  $current_date = date("Ymd");
  $current_time = date("His");
  $file_name = $tirthcode . '_' . $current_date . '_' . $phone ;

	

    // Handle file upload
    if(isset($_FILES['image'])){
      $file = $_FILES['image'];
     // $file_name = $tirthcode . $phone;
      $file_tmp = $file['tmp_name'];
      $file_path = $directory . '/' . $file_name. '.jpg';

      // Move the uploaded file to the directory
      move_uploaded_file($file_tmp, $file_path);

      // Display a success message
      //echo "File uploaded successfully!";
	//echo  header('Location: success.html');
	$redirect_url = "success.html?id=$tirthcode";
header("Location: $redirect_url");
    }
  }



  

?>

