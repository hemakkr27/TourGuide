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
<script>

	
	function myGallery() {
	  const urlParams = new URLSearchParams(window.location.search);
            const myParam = urlParams.get('id');
		
	

    
    // Get the phone number from the input field
    const phoneNumber = document.getElementById('phoneNumber').value;
    
    // Check if the phone number is valid (optional)
    if (!phoneNumber) {
        alert('Please enter a valid phone number');
        return;
    }
    
    // Redirect to the gallery page with the phone number parameter
    location.href = 'gallery.php?id=' + myParam + '&phoneNumber=' + phoneNumber;
}
	
	
	function filterImages() {
  var input = document.getElementById("searchInput");
  var filter = input.value.toLowerCase();
  var gallery = document.getElementById("imageGallery");
  var images = gallery.getElementsByTagName("img");
  
  for (var i = 0; i < images.length; i++) {
    var imageName = images[i].getAttribute("data-name").toLowerCase();
    if (imageName.indexOf(filter) > -1) {
      images[i].style.display = "";
    } else {
      images[i].style.display = "none";
    }
  }
}

	
</script>


  <div class="gallery">
  <div class="container">
  <div class="row">
    <div class="col-md-2"></div>
  <div class="col-md-8">
  <div class="showandhide">
  <input type="text" id="searchInput" placeholder="Search by Image Name" />
  <button onclick="filterImages()">Search</button>
</div>
  </div>

	<div class="row">
  <div class="col-md-6">
  <div id="imageGallery">
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
		 $folder_path = $parent_folder;
      $files = glob($folder_path . $id."*.{jpg,jpeg,png,gif}", GLOB_BRACE);
		foreach ($files as $file) {
			if($file)
			{
			$cfilename=substr($file, strpos($file, "/") - 1);  
			$filename = substr($cfilename, 0, strrpos($cfilename, '.'));
			$pno=substr($filename,- 10);  
        echo '<img src="' . $file . '" alt="Image" data-name="' .$pno . '">';
			}
      }
      }


    ?>
	</div>
	</div>
	</div>
  </div>
  </div>
    <!-- Upload form -->

  </div>
</body>
</html>