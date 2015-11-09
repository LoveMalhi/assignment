
<h3><?= $this->Html->link('CLICK HERE !!!!!!TO MAKE YOUR ORDER', ['action' => 'add']) ?></h3>
<?PHP echo $this->Html->link('Log out', array('controller' => 'users', 'action' => 'logout'));?>

<h1>Present Orders</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Pizza size</th>
        <th>Total</th>
        <th>Actions</th>
    </tr>



    <?php foreach ($orders as $order): ?>
    <tr>
        <td><?= $order->id ?></td>
        <td>
            <?= $this->Html->link($order->pizzaSize, ['action' => 'view', $order->id]) ?>
        </td>
        <td><?= '$ '.$this->Number->precision($order->total, 2) ?></td>
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

<h1>List of Previous Orders</h1>
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
        <td><?= '$'.$this->Number->precision($order->total, 2) ?></td>
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
