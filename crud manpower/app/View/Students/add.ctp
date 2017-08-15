<h2>Add New Student</h2>

<!-- link to add new students page -->
<div class='upper-right-opt'>
    <?php echo $this->Html->link( 'List Students', array( 'action' => 'index' ) ); ?>
</div>

<?php
//this is our add form, name the fields same as database column names
echo $this->Form->create('Student');

    echo $this->Form->input('firstname');
    echo $this->Form->input('lastname');
    echo $this->Form->input('birthday', array(
        'selected' => '1995-01-01',
        'minYear' => date('Y') - 70,
    'maxYear' => date('Y') - 8
  ));


echo $this->Form->end('Submit');
?>
