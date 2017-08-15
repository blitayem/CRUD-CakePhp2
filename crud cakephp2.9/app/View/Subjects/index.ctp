<h2>Subjects</h2>

<!-- link to add new subject page -->
<div class='upper-right-opt'>
    <?php echo $this->Html->link( '+ New Subject', array( 'action' => 'add' ) ); ?>
</div>

<table style='padding:5px;'>
    <!-- table heading -->
    <tr style='background-color:#fff;'>
        <th>ID</th>
        <th>Name</th>
        <th>Actions</th>
    </tr>

<?php


    //loop to show all retrieved records
    foreach( $subjects as $subject ){

        echo "<tr>";
            echo "<td>{$subject['Subject']['id']}</td>";
            echo "<td>{$subject['Subject']['name']}</td>";


            //here are the links to edit and delete actions
            echo "<td class='actions'>";
                echo $this->Html->link( 'Edit', array('action' => 'edit', $subject['Subject']['id']) );

                //in cakephp 2.0, we won't use get request for deleting records
                //we use post request (for security purposes)
                echo $this->Form->postLink( 'Delete', array(
                        'action' => 'delete',
                        $subject['Subject']['id']), array(
                            'confirm'=>'Are you sure you want to delete that subject?' ) );
            echo "</td>";
        echo "</tr>";
    }
?>

</table>
