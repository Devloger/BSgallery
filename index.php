<?php

require 'vendor/autoload.php';
use app\ImageFiles;
use app\Request;

function dd( $arg )
{
	return die( var_dump( $arg ) );
}


$request = new Request;

$dir = $request->disallow('.')->get('dir');
$dir = $dir ?? 'images';

$folders = ( new \app\Directory( $dir ) )->get_folders();
$images = ( new ImageFiles( $dir ) )->get();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
		  integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<ul class="p-0" style="color: #cdcbcb; display: flex; list-style: none; justify-content: center; flex-wrap: wrap;">
	<?php foreach( $folders as $folder ): ?>
		<li class="mx-5">
			<a href="http://localhost/gallery/?dir=<?= urlencode( $folder ) ?>">
				<i class="fa fa-folder" style="color: #cdcbcb;" aria-hidden="true"></i> <?= basename( $folder ) ?>
			</a>
		</li>
	<?php endforeach; ?>
</ul>
<style>
	body {
		background: #292b2c;
		color: aliceblue;
	}
</style>
	<div class="d-flex flex-wrap justify-content-between mx-5 mt-2">
		
		<?php foreach( $images as $img ): ?>
			<div class="img-thumbnail mb-2" style="width: 150px !important; height: auto !important;">
				<img class="myImg" class="" style="height: 100%; width: 100%;" src="<?= $img ?>"/>
			</div>
		<?php endforeach; ?>
	</div>
<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"
		integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n"
		crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
		integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
		crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
		integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
		crossorigin="anonymous"></script>

<div id="myModal" class="modal">
	
	<!-- The Close Button -->
	<span class="close">&times;</span>
	
	<!-- Modal Content (The Image) -->
	<img class="modal-content" id="img01">
</div>

<script>
    var modal = document.getElementById('myModal');
    var modalImg = document.getElementById("img01");

    $(document).on('click', '.myImg', function(image)
	{
        var img = document.getElementsByClassName('myImg');
		modal.style.display = "block";
		modalImg.src = this.src;
    });
	
    var span = document.getElementsByClassName("close")[0];
    span.onclick = function() {
        modal.style.display = "none";
    }
</script>


</body>
</html>