<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h3>Display</h3>
	NAME: <?php echo $name; ?><br/>
	EMAIL: <?php echo $email; ?><br/>
	HOBBIES: <?php foreach($hobbies as $h)
			{
				echo $h, '<br/>';
			}
			?>
</body>
</html>