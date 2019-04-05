<div class="user-profile">
	<div class="profile-body"></div>

        <img class="profile_picture" src="<?php echo base_url(); ?>images/<?php echo $profile_pic; ?>" height="350px" width="350px" /><br><br> 

    <B><p>My Role:</p></B><?php echo $status; ?>
    <br><br>

    <?php echo validation_errors(); ?>
    <?php echo form_open_multipart('profile/submit_form');?>

    <input type="file" name="profile_picture">

    <b><p>My Bio:</p></b>
<textarea name="bio" placeholder="<?php echo $bio; ?>"></textarea><br/>
    <br><br>


 <br><br>
    <input type="submit" value="Save Changes" />
</form>

</div>
