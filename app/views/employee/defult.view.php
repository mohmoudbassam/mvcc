<table border="1">
    <thead>
    <tr>
        <th>
            name
        </th>
        <th>
            salary
        </th>
        <th>
            tax
        </th>

        <th>
            address
        </th>
        <th>
            control
        </th>
    </tr>

    </thead>
    <?php

    foreach ($employees as $employee){
        ?>
        <tbody>
        <tr>
            <td>
                <?php echo $employee->name."<br>" ;?>
            </td>
            <td>
                <?php echo $employee->salary."<br>" ;?>
            </td>
            <td>
                <?php echo $employee->tax."<br>" ;?>
            </td>
            <td>
                <?php echo $employee->address."<br>" ;?>
            </td>
            <td>
                <a href="employee/edit/<?=$employee->id ?>">edit</a>
                <a href="employee/delete/<?=$employee->id ?>">delete</a>
            </td>
        </tr>
        </tbody>


    <?php }
    ?>
</table>

