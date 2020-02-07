<?php if(check_message()): ?>
<!--message start -->
<div class="popup-messages">
    <?php $message = get_message(); ?>
    <div class="alert alert-<?php echo $message['level']; ?> alert-dismissible fade show">
        <?php echo $message['content']; ?>
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
</div>

<!--message end -->
<?php delete_message(); ?>
<?php endif; ?>
