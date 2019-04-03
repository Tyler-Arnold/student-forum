<?php echo validation_errors(); ?>
<?php echo $errormsg; ?>

<?php echo form_open('user/login'); ?>

	<label for = "username">Enter Username</label>
	<input type="input" name="logname" /><br />
	<label for = "password">Enter Password</label>
	<input type="password" name="logpass" /><br />
	<input type="submit" name="submit" value="Login" />
	</form> 
	<a href="<?php echo base_url('user/register');?>" ><button>Register</button></a>
	<br />
	
