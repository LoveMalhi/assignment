<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;

class OrdersTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
		  parent::initialize($config);
        $this->table('orders');
        $this->displayField('id');
        $this->primaryKey('id');
    }
	
	 public function validationDefault(Validator $validator)
    {
        $validator
        
 
            ->allowEmpty('toppings');
        return $validator;
 
   }
   public function isOwnedBy($orderId, $userId)
{
    return $this->exists(['customer'=>$customerId]);
}
}
?>