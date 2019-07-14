<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<h3>Registration</h3>
<form method="post" action="/ci226/display/index">
	NAME <input type="text" name="myname" /><br/>
	EMAIL <input type="text" name="myemail" /><br/>

	<input type="checkbox" value="M" name="hobbies[]">Music<br/>
	<input type="checkbox" value="S" name="hobbies[]">Sports<br/>
	<input type="checkbox" value="T" name="hobbies[]">Travel<br/>


	<select name="depts[]" multiple="true">
		<option>CSE</option>
		<option>CSSE</option>
		<option>SE</option>
		<option>CS</option>
		<option>CIS</option>
	</select>
	<input type="submit" name="buttonSubmit" value="Submit" /><br/>
</form>
</body>
</html>



