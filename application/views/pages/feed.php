<?php foreach ($messages as $message): ?>
    <div class="feed-message">
        <h3 class="sender"><?php echo $message['username']; ?></h3>
    	<div class="message-body">
    		<p><?php echo $message['message_body']; ?></p>
    	</div>

        <div class="message-interaction">
            <button>Reply</button>
            <button>Like</button>
        </div>
    </div>
<?php endforeach; ?>
