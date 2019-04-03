<h2><?php echo $title; ?><h2>
	
<?php echo validation_errors(); ?>

<?php echo form_open('user/register'); ?>

	<label for = "username">Enter Username</label>
	<input type="input" name="username" /><br />
	<label for = "password">Enter Password</label>
	<input type="password" name="password" /><br />
	<label for = "status">Choose Status</label>
	<select name="status">
		<option value="Student">Student</option>
		<option value="Lecturer">Lecturer</option>
	</select>
	<input type="submit" name="submit" value=" Create news user" />
	
	</form>
	
	<h2><?php echo $title; ?></h2> 
	
<?php echo validation_errors(); ?> 