<!-- File: src/Template/Articles/add.ctp -->

<h1>Add ORDER</h1>
<?php
    echo $this->Form->create($order);
    echo $this->Form->input('name');
	echo $this->Form->input('address');
	echo $this->Form->input('city');
	echo $this->Form->input('province');
	echo $this->Form->input('postal');
   	echo $this->Form->input('telephone');
		echo $this->Form->input('email');	
		echo $this->Form->input('size');
			echo $this->Form->input('crust');
				
			
	
	$options = array(
    'Value 1' => 'Red Onion',
    'Value 2' => 'Tomato',
	 'Value 3' => 'Green Pepper',
    'Value 4' => 'Olive',
	 'Value 5' => 'Yellow Pepper',
    'Value 6' => 'Mushroom',
	 'Value 7' => 'Pine Apple',
    'Value 8' => 'Broccoli',
	 'Value 9' => 'Hot Banana Pepper',
    'Value 10' => 'Cheese'
	 
	
);
echo $this->Form->select('orders.toppings', $options, array(
    'multiple' => 'checkbox'
));

    echo $this->Form->button(__('Save Order'));
    echo $this->Form->end();
?>