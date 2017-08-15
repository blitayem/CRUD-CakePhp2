<h2>Students</h2>

<!-- link to add new Student page -->
<div class='upper-right-opt'>
    <?php echo $this->Html->link( '+ New Student', array( 'action' => 'add' ) ); ?>
</div>

<table style='padding:5px;'>
    <!-- table heading -->
    <tr style='background-color:#fff;'>
        <th>ID</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Birthday</th>
        <th>Actions</th>
    </tr>

<?php


    //loop to show all retrieved records
    foreach( $students as $student ){

        echo "<tr>";
            echo "<td>{$student['Student']['id']}</td>";
            echo "<td>{$student['Student']['firstname']}</td>";
            echo "<td>{$student['Student']['lastname']}</td>";
            echo "<td>{$student['Student']['birthday']}</td>";

            //here are the links to edit and delete actions
            echo "<td class='actions'>";
                echo $this->Html->link( 'Edit', array('action' => 'edit', $student['Student']['id']) );

                //in cakephp 2.0, we won't use get request for deleting records
                //we use post request (for security purposes)
                echo $this->Form->postLink( 'Delete', array(
                        'action' => 'delete',
                        $student['Student']['id']), array(
                            'confirm'=>'Are you sure you want to delete that student?' ) );
            echo "</td>";
        echo "</tr>";
    }
?>

</table>
