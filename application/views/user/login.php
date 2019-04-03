<?php echo validation_errors(); ?>

<?php echo form_open('user/login'); ?>

	<label for = "username">Enter Username</label>
	<input type="input" name="logname" /><br />
	<label for = "password">Enter Password</label>
	<input type="password" name="logpass" /><br />
	<input type="submit" name="submit" value="Login" />
	</form> <br />
	<a href="<?php echo base_url('user/register');?>">Register</a>
	
<?php echo validation_errors(); ?> 