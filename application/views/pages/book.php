<?php echo validation_errors(); ?>
<?php echo form_open(); ?>
    <label for="date">Date</label>
    <input type="input" name="date" value="<?php echo $date ?>" disabled /><br />
	
	<label for="recipient">Recipient</label>
    <input type="input" name="recipient" value="<?php echo $user ?>" disabled /><br />
	
    <label for="time">Time</label>
    <input type="time" name="time" /><br />
	
	<label for="location">Location</label>
    <input type="input" name="location" /><br />
	
    <input type="submit" name="submit" value="Book Appointment" />
</form>