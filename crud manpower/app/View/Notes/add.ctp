<h2>Add New Notes</h2>

<!-- link to add new notes page -->
<div class='upper-right-opt'>
    <?php echo $this->Html->link( 'List Notes', array( 'action' => 'index' ) ); ?>
</div>

<?php
//this is our add form, name the fields same as database column names
echo $this->Form->create('Note');

    echo $this->Form->input('student',array('options' => $options2, 'default' => '--Select--'));
    echo $this->Form->input('note');
    echo $this->Form->input('subject' ,array('options' => $options, 'default' => '--Select--'));


echo $this->Form->end('Submit');
?>
