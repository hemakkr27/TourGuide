<!DOCTYPE html>
<html>
<head>
  <title>Image Gallery</title>
  <style>
    .gallery {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }
    .gallery img {
      width: 200px;
      height: 200px;
      object-fit: cover;
      margin: 10px;
    }
  </style>
</head>
<body>
  <div class="gallery">
    <?php

	
	
	$id= $_GET['id'];
      $parent_folder = "image/"; // Change 'images/' to your parent folder path

      // Check if the 'uploads' folder exists, if not, create it
      $uploads_folder = $parent_folder;
      if (!file_exists($uploads_folder)) {
        mkdir($uploads_folder, 0777, true);
      }

      $folders = glob($parent_folder); // Get all subfolders
		
      // Display subfolders
      foreach ($folders as $folder) {
        $folder_name = basename($folder);
        //echo '<a href="?folder=' . $folder_name . '">' . $folder_name . '</a><br>';
		 $folder_path = $parent_folder .'/';
      $files = glob($folder_path . $id."*.{jpg,jpeg,png,gif}", GLOB_BRACE);
		foreach ($files as $file) {
			if($file)
			{
        echo '<img src="' . $file . '" alt="Image">';
			}
      }
      }


    ?>

    <!-- Upload form -->

  </div>
</body>
</html>