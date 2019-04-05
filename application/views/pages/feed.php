<div class="feed">
<?php foreach ($messages as $message): ?>
    <div class="feed-message">
        <h3 class="sender"><a href="<?php echo base_url("profile/index/".$message['sender']); ?>"><?php echo $message['username']; ?></a></h3>
    	<div class="message-body">
    		<p><?php echo $message['message_body']; ?></p>
    	</div>

        <div class="message-interaction">
            <a href="<?php echo base_url("feed/thread/".$message['id']);?>"><button>Reply</button></a>
            <button>Like</button>
        </div>
    </div>
<?php endforeach; ?>
</div>
