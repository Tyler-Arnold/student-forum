<?php foreach ($appointments as $appointment): ?>
    <div class="feed-message">
        <h3><?php echo $appointment['username']." - ".$appointment['date_time'] ?></h3>
        <p><em>Date-Time:</em> <?php echo $appointment['date_time'] ?></p>
		<p><em>Location:</em> <?php echo $appointment['location'] ?></p>
        <p><em>Status:</em> <?php echo $appointment['status'] ?></p>
        <?php if($appointment['status'] != "accepted" && $appointment['sender'] != $user): ?>
        <a href="<?php echo base_url("appointments/update/{$appointment['id']}/accepted"); ?>" ><button>Accept</button></a>
        <a href="<?php echo base_url("appointments/update/{$appointment['id']}/rejected"); ?>" ><button>Reject</button></a>
        <?php endif; ?>
    </div>
<?php endforeach; ?>
