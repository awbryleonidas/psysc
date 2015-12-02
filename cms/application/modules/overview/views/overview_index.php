<section class="content">
    <?php foreach($feedbacks as $feedback):?>
        <h4><?php echo $feedback->feedback_subject?></h4>
        <small><?php echo $feedback->feedback_name?>, [<?php echo $feedback->feedback_email?>]</small>
        <p><?php echo $feedback->feedback_message?></p>
        <hr><br>
    <?php endforeach?>
</section>
