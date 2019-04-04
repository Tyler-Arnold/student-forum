<?php foreach ($appointments as $appointment): ?>
    <div class="feed-message">
        <h3><?php echo $appointment['date_time'] ?></h3>
		<p><?php echo $appointment['location'] ?></p>
    </div>
<?php endforeach; ?>
