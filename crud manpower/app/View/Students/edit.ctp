<h2>Edit Student</h2>

<!-- link to add new students page -->
<div class='upper-right-opt'>
    <?php echo $this->Html->link( 'List Studens', array( 'action' => 'index' ) ); ?>
</div>

<?php
//this is our edit form, name the fields same as database column names
echo $this->Form->create('Student');

    echo $this->Form->input('firstname');
    echo $this->Form->input('lastname');
    echo $this->Form->input('birthday');

echo $this->Form->end('Submit');
?>
