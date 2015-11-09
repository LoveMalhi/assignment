<!-- File: src/Template/Articles/add.ctp -->
<div class="container">
    <div class="row">
        <?php echo $this->Form->create($order); ?>
        <fieldset> <legend>Order Information</legend>
            <div class="form-group col-lg-6 col-sm-12">
            
                <label>Pizza Size</label>
                <?php
                    echo $this->Form->radio('pizzaSize',
                        [
                            ['value' => 'Small', 'text' => 'Small'],
                            ['value' => 'Med', 'text' => 'Medium'],
                            ['value' => 'Large', 'text' => 'Large'],
                            ['value' => 'XL', 'text' => 'X-Large']
                        ],
                        ['default' => 'Small']
                    ); 
                ?>
                <label>Crust Type</label>
                <?php
                    $crustType = ['Hand-tossed' => 'Hand-tossed', 'Pan' => 'Pan', 'Stuffed' => 'Stuffed', 'Thin' => 'Thin'];
                    echo $this->Form->radio('crustType', $crustType, ['default' => 'Hand-tossed']);
                ?>
            </div>
            <div class="form-group col-lg-6 col-sm-12">
                <label>Toppings</label>
                <?php
                        $toppings = ['Bacon' => 'Bacon', 
                                     'Salami' => 'Salami', 
                                     'Peperoni' => 'Peperoni', 
                                     'Ham' => 'Ham', 
                                     'ExtraCheese' => 'Extra Cheese', 
                                     'Tomato' => 'Tomato', 
                                     'Olives' => 'Olives', 
                                     'Broccoli' => 'Broccoli', 
                                     'GarlicSauce' => 'Garlic Sauce', 
                                     'TomatoSauce' => 'Tomato Sauce'
                                    ];
                        echo $this->Form->input('toppings', 
                                                array('label' => false,
                                                    'type' => 'select',
                                                    'multiple'=>'checkbox',
                                                    'options' => $toppings)
                                                      ); 
                    ?>
            </div>
        </fieldset>
         <?php
            echo $this->Form->button(__('Save Order')); 
            echo $this->Form->end();
        ?>
    </div>
</div>