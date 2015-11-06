
<h1>List Of Orders</h1>
<?= $this->Html->link('Add Order', ['action' => 'add']) ?>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php foreach ($orders as $order): ?>
    <tr>
        <td><?= $order->id ?></td>
        <td>
            <?= $this->Html->link($order->name, ['action' => 'view', $order->id]) ?>
        </td>
        <td>
			    <?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $order->id],
                ['confirm' => 'Are you sure?'])
            ?>
			<?= $this->Html->link('Edit', ['action' => 'edit', $order->id]) ?>
        </td> 
    </tr>
    <?php endforeach; ?>
</table>