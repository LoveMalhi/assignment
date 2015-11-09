<h1>Current customers</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Phone</th>
        <th>City</th>
    </tr>

<!-- Here's where we loop through our $customers query object, printing out customer info -->

    <?php foreach ($customers as $customer): ?>
    <tr>
        <td><?= $customer->id ?></td>
        <td>
            <?= $customer->personName ?>
        </td>
        <td><?= $customer->phone ?></td>
        <td><?= $customer->city ?></td>
    </tr>
    <?php endforeach; ?>

</table>