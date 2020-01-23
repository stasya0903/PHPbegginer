<?php 
require "1.php";

for ($i=3; $i < count($pictures) ; $i++) { 
	echo '<div class="picture">
		<a href="./img/'.$pictures[$i].'">
			<img src="./img/'.$pictures[$i].'"></a></div>' ;

	
}

?>