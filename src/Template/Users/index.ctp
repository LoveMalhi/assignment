<h1>List of Users</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Role</th>
    </tr>



    <?php foreach ($users as $user): ?>
    <tr>
        <td><?= $user->id ?></td>
        <td>
            <?= $user->username ?>
        </td>
        <td><?= $user->role ?></td>
    </tr>
    <?php endforeach; ?>

</table>