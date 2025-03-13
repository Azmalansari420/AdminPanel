<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Conatcy</title>
</head>
<body>

	<form method="post" enctype="multipart/form-data" action="<?=base_url('home/enquiry_form') ?>">
		<input type="text" name="name">
		<input type="text" name="email">
		<input type="text" name="mobile">
		<input type="text" name="subject">
		<input type="text" name="message">
		<input type="submit" name="submit" >
	</form>

</body>
</html>