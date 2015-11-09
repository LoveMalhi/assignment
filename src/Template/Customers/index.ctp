<h1>List Of Customers</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Phone</th>
        <th>City</th>
    </tr>


    <?php foreach ($customers as $customer): ?>
    <tr>
        <td><?= $customer->id ?></td>
        <td>
            <?= $customer->Name ?>
        </td>
        <td><?= $customer->phone ?></td>
        <td><?= $customer->city ?></td>
    </tr>
    <?php endforeach; ?>

</table>