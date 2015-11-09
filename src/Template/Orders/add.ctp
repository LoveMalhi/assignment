<!-- File: src/Template/Articles/add.ctp -->

<div class="container">
    <div class="row">
        <?php 
		echo $this->Form->create($order); ?>
        <fieldset> <legend> Enter Order Information</legend>
            <div class="form-group col-lg-6 col-sm-12">
            
                <label>Size of Pizza</label>
                <?php
                    echo $this->Form->radio('pizzaSize',
                        [
                            ['value' => 'S', 'text' => 'Small'],
                            ['value' => 'M', 'text' => 'Medium'],
                            ['value' => 'L', 'text' => 'Large'],
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
                        $toppings = ['WhiteOnion' => 'WhiteOnion', 
                                     'BlackOlives' => 'BlackOlives', 
                                     'Pineapple' => 'Pineapple', 
                                     'Tomato' => 'Tomato', 
                                     'Mushroom' => 'Mushroom', 
                                     'Spinach' => 'Spinach', 
                                     'GreenPeeper' => 'GreenPeeper', 
                                     'Ham' => 'Ham', 
                                     'Broccoli' => 'Broccoli', 
                                     'GreenOlives' => 'GreenOlives'
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
            echo $this->Form->button(__('Save MY Order')); 
            echo $this->Form->end();
        ?>
    </div>
</div>