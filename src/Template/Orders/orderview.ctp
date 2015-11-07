<h1>List Of Orders</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
		<th>Address</th>
		  <th>Postal</th>
        <th>City</th>
		<th>Province</th>
      
		<th>Telephone</th>
        <th>Email</th>
		<th>Size</th>
        <th>Crust</th>
		<th>Toppings</th>          
<th></th>		
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php foreach ($orders as $order): ?>
    <tr>
        <td><?= $order->id ?></td>
        <td>
            <?= $this->Html->link($order->name, ['action' => 'view', $order->id]) ?>
        </td>
		  <td>
            <?= $this->Html->link($order->address, ['action' => 'view', $order->id]) ?>
        </td>
		  <td>
            <?= $this->Html->link($order->postal, ['action' => 'view', $order->id]) ?>
        </td> 
		  <td>
            <?= $this->Html->link($order->city, ['action' => 'view', $order->id]) ?>
        </td>
		  <td>
            <?= $this->Html->link($order->province, ['action' => 'view', $order->id]) ?>
        </td>
		
		<td>
            <?= $this->Html->link($order->telephone, ['action' => 'view', $order->id]) ?>
        </td>
		  <td>
            <?= $this->Html->link($order->email, ['action' => 'view', $order->id]) ?>
        </td>
		  <td>
            <?= $this->Html->link($order->size, ['action' => 'view', $order->id]) ?>
        </td>
		  <td>
            <?= $this->Html->link($order->crust, ['action' => 'view', $order->id]) ?>
        </td>
		  <td>
            <?= $this->Html->link($order->toppings, ['action' => 'view', $order->id]) ?>
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