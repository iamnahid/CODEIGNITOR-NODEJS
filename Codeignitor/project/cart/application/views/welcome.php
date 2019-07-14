<!DOCTYPE html>


<body>
	<div align="left">
		<label style="color:green;text-align:left;">Sign In</label>
		</br></br>
		
		<?php
		
			echo form_open('Welcome/signin');
			
				echo form_input(['name'=>'Uname', 'placeholder'=>'User Name', 'class'=>'textbox']);
				echo form_password(['name'=>'Pass', 'placeholder'=>'Password', 'class'=>'password']);
				echo form_submit('submit', 'Login');

			
			echo form_close();

		?>

	</div>
</body>