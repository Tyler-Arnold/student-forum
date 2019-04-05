<?php echo validation_errors(); ?>
<?php echo form_open("feed/thread/$messageid"); ?>

    <label for="reply">Message</label>
    <textarea name="reply"></textarea><br />
    <input type="submit" name="submit" value="Send Reply" />
</form>

	<div class="feed-message">
		<h2>Original Message</h2>
        <h3 class="sender"><a href="<?php echo base_url("profile/index/".$mainmsg['sender']); ?>"><?php echo $mainmsg['username']; ?></a></h3>
    	<div class="message-body">
    		<p><?php echo $mainmsg['message_body']; ?></p>
    	</div>

        <div class="message-interaction">

        </div>
    </div>

	<?php foreach ($replies as $replies1): ?>
    <div class="feed-message">
        <h3 class="sender"><a href="<?php echo base_url("profile/index/".$replies1['sender']); ?>"><?php echo $replies1['username'].' - '.$replies1['status']; ?></a></h3>
    	<div class="message-body">
    		<p><?php echo $replies1['message_body']; ?></p>
    	</div>

        <div class="message-interaction">

        </div>
    </div>
<?php endforeach; ?>
