<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>slider</title>
</head>
<body>


	<?php
	$query = $db->table('slider')->where('status', 1)->get();
    $sliders = $query->getResult(); // Get the result as an array of objects

	foreach($sliders as $data)
		{ ?>
	<h2><?=esc($data->title) ?></h2><br>
<?php } ?>

</body>
</html>