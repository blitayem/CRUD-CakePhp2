<h2>Edit Subject</h2>

<!-- link to add new subjects page -->
<div class='upper-right-opt'>
    <?php echo $this->Html->link( 'List Subjects', array( 'action' => 'index' ) ); ?>
</div>

<?php
//this is our edit form, name the fields same as database column names
echo $this->Form->create('Subject');

    echo $this->Form->input('name');


echo $this->Form->end('Submit');
?>
