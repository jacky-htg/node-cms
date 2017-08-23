
        <?php
        foreach ($all_user as $row) {
            var_dump($all_user);
            ?>
            <tr>
                <td><?php echo $row->username;?></td>
                <td><?php echo $row->first_name.' '.$row->last_name;?></td>
                <td><?php echo $row->phone;?></td>
                <td><?php echo $row->email;?></td>
            </tr>
        <?php } ?>