<!-- File: src/Template/Articles/add.ctp -->

<h1>Add ORDER</h1>
<?php
    echo $this->Form->create($order);
    echo $this->Form->input('name');
   
    echo $this->Form->button(__('Save Order'));
    echo $this->Form->end();
?>