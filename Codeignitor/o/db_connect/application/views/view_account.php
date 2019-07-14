<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2>List of Accounts</h2>

	<a href="http://localhost/ci226/account/addnew">Add New</a>
	<br/><br/>
	<table border="1">
		<tr>
			<th>ACC NO</th>
			
		</tr>
		<?php foreach ($accounts as $acc){ ?>
		<tr>
			<td><a href="http://localhost/ci226/account/details/<?php echo $acc['id']; ?>"><?php echo $acc['acc_no']; ?></a></td>
			
		</tr>
		<?php } ?>
	</table>
</body>
</html>