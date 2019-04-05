<div class="user-profile">
	<div class="profile-body"></div>

    <img class="profile-picture" src="<?php echo base_url(); ?>images/<?php echo $profile_pic; ?>" height="350px" width="350px" /><br><br> 

    <form name="form" action="<?php echo base_url("profile/profile_config/$user");?>" method="POST" enctype="multipart/form-data">
    <input type="file" name="photo">
    <p>
    <button>Upload File</button>
 </form>


    <p>My Bio</p>
<textarea name="bio" placeholder="<?php echo $bio['bio']; ?>"></textarea><br/>
    <input type="submit" value="update bio" />


 <br><br>
<form action="<?php echo base_url("profile/index/$user");?>">
    <input type="submit" value="Save Changes" />
</form>

    <br><br>
</div>
