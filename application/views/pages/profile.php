<?php 
	$userid=$this->session->userdata('id');
	$username=$this->session->userdata('username');
	?>

<div class="user-profile">
	<div class="profile-body"></div>	
    
    <?php if($userid == $current_user){ ?>
    <img src="<?php echo base_url(); ?>images/<?php echo $profile_pic; ?>" height="350px" width="350px" /><br><br> 
   
    <B><p>Role:</p></B><?php echo $status; ?>
    <br><br>
    
    <b><p>My Bio:</p></b>
<p><?php echo $bio; ?></p>
    
    <form action="<?php echo base_url("profile/profile_config/$user");?>">
    <input type="submit" value="Edit my profile" />
</form>
    
    <?php } else { ?>
    <img src="<?php echo base_url(); ?>images/<?php echo $profile_pic; ?>" height="350px" width="350px" /><br><br> 
   
    <B><p>Role:</p></B><?php echo $status; ?>
    <br><br>
    
    <b><p>My Bio:</p></b>
<p><?php echo $bio; ?></p>
    
    <form action="<?php echo base_url('calendar/user-calendar'); ?>">
    <input type="submit" value="Book an appointment" />
</form>
    <?php } ?>
    <br><br>
</div>