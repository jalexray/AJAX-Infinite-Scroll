<?php
$dir    = 'images'; // Aim this at your directory of files you want to include. In this example, we're making an infinitely-scrolling photo album, so we aim this at images (relative to this file; so its AJAX-infinite-scroll/images/). There are a lot of ways to change this; maybe you want to pull photo names from a database (and - think of the possibilities! You could include captions, etc.). However, this way works. Another option to improve this: let the AJAX post tell you what directory to check. The options are endless!
$files = scandir($dir); // Create an array of the files
foreach ($files as $key => $file){ // Loop through all of the files
	$firstCharacter = substr($file, 0, 1); // This returns the first character of each file in the images directory
	if($firstCharacter == "."){ // If the first character is a ., we ignore it. Generally, dot files aren't content you want to serve... You can research this more if you don't know why.
		unset($files[$key]); // Let's not include those dot files. 
	}
}
$files = array_values($files); // Here we reset our array of file names so that our keys go in the most logical order (for example, the first item being files[0] rather than files[2] if you deleted two dot files). Sometimes this won't change anything (if you had no dot files).
echo json_encode($files); // Finally, let's return our array to the requester as a JSON. 
?>