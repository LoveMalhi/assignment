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
		echo $this->Form->label('Select pizza size');		
			$options = array('s' => 'Small', 'm' => 'Medium','l' => 'Large', 'xl' => 'Extra-Large');
		echo $this->Form->select('size', $options);
		echo $this->Form->label('Select crust type');		
			$options = array('ht' => 'Hand-Tossed', 'p' => 'pan','s' => 'Stuffed', 't' => 'Thin');
		echo $this->Form->select('crust', $options);
		echo $this->Form->label('Select toppings');		
		echo $this->Form->input('toppings',array('type' => 'checkbox','label'=>'Red Onion', 'checked'=>'checked' ));
		echo $this->Form->input('toppings',array('type' => 'checkbox','label'=>'Tomato'));
		echo $this->Form->input('toppings',array('type' => 'checkbox','label'=>'Green Pepper'));
		echo $this->Form->input('toppings',array('type' => 'checkbox','label'=>'Olive' ));
		echo $this->Form->input('toppings',array('type' => 'checkbox','label'=>'Yellow Pepper' ));
		echo $this->Form->input('toppings',array('type' => 'checkbox','label'=>'Pine Apple' ));
		echo $this->Form->input('toppings',array('type' => 'checkbox','label'=>'Hot Banana Pepper'));
		echo $this->Form->input('toppings',array('type' => 'checkbox','label'=>'Spinach' ));
		echo $this->Form->input('toppings',array('type' => 'checkbox','label'=>'Mushroom'));
		echo $this->Form->input('toppings',array('type' => 'checkbox','label'=>'Cheese'));
		echo $this->Form->label('Select location');		
			$options = array('on' => 'Ontario', 'q' => 'Quebec','m' => 'Manitoba', 's' => 'Saskatchewan');
		echo $this->Form->select('location', $options);
		echo $this->Form->button(__('Save Order'));
		echo $this->Form->end();
?>