<?php echo validation_errors(); ?>
<?php echo form_open(); ?>
    <label for="recipient">Recipient</label>
    <input type="input" name="recipient" /><br />
    <label for="message">Message</label>
    <textarea name="message"></textarea><br />
    <input type="submit" name="submit" value="Send Message" />
</form>
