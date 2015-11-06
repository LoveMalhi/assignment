<!-- File: src/Template/Articles/edit.ctp -->

<h1>Edit Article</h1>
<?php
   echo $this->Form->create($order);
    echo $this->Form->input('name');
   
    echo $this->Form->button(__('Save Order'));
    echo $this->Form->end();
	?>