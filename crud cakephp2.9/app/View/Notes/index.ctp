<h2>Notes</h2>

<!-- link to add new Note page -->
<div class='upper-right-opt'>
    <?php echo $this->Html->link( '+ New Note', array( 'action' => 'add' ) ); ?>
</div>

<table style='padding:5px;'>
    <!-- table heading -->
    <tr style='background-color:#fff;'>
        <th>ID</th>
        <th>Student</th>
        <th>Note</th>
        <th>Subject</th>
        <th>Actions</th>
    </tr>

<?php


    //loop to show all retrieved records
    foreach( $notes as $note ){

        echo "<tr>";
            echo "<td>{$note['Note']['id']}</td>";
            echo "<td>{$note['Student']['firstname']} {$note['Student']['lastname']}</td>";
            echo "<td>{$note['Note']['note']}</td>";
            echo "<td>{$note['Subject']['name']}</td>";

            //here are the links to edit and delete actions
            echo "<td class='actions'>";
                echo $this->Html->link( 'Edit', array('action' => 'edit', $note['Note']['id']) );

                //in cakephp 2.0, we won't use get request for deleting records
                //we use post request (for security purposes)
                echo $this->Form->postLink( 'Delete', array(
                        'action' => 'delete',
                        $note['Note']['id']), array(
                            'confirm'=>'Are you sure you want to delete that note?' ) );
            echo "</td>";
        echo "</tr>";
    }
?>

</table>
