
<img src ="/img/image1.jpg" height="100" width="850">
<?= $this->Html->link('CLICK HERE !!!!!!TO MAKE YOUR ORDER', ['action' => 'add']) ?>
<p>
<h3><?= $this->Html->link('==> Order here <==', ['action' => 'add']) ?></h3>
</p>
<h1>Current orders</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Pizza size</th>
        <th>Total</th>
        <th>Actions</th>
    </tr>

<!-- Here's where we loop through our $orders query object, printing out order info -->

    <?php foreach ($orders as $order): ?>
    <tr>
        <td><?= $order->id ?></td>
        <td>
            <?= $this->Html->link($order->pizzaSize, ['action' => 'view', $order->id]) ?>
        </td>
        <td><?= 'CAD '.$this->Number->precision($order->total, 2) ?></td>
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

<h1>Past orders</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Pizza size</th>
        <th>Created</th>
        <th>Actions</th>
    </tr>



    <?php foreach ($completed_orders as $order): ?>
    <tr>
        <td><?= $order->id ?></td>
        <td>
            <?= $this->Html->link($order->pizzaSize, ['action' => 'view', $order->id]) ?>
        </td>
        <td><?= 'CAD '.$this->Number->precision($order->total, 2) ?></td>
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
