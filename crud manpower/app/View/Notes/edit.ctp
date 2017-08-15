<h2>Edit Note</h2>

<!-- link to add new notes page -->
<div class='upper-right-opt'>
    <?php echo $this->Html->link( 'List Notes', array( 'action' => 'index' ) ); ?>
</div>

<?php
//this is our edit form, name the fields same as database column names
echo $this->Form->create('Note');

    echo $this->Form->input('Student');
    echo $this->Form->input('Note');
    echo $this->Form->input('Subject');

echo $this->Form->end('Submit');
?>
