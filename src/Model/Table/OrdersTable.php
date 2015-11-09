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
	public function isOwnedBy($orderId, $userId)
{
    return $this->exists(['id' => $orderId, 'user_id' => $userId]);
}
	 public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('name')
            ->requirePresence('name')
			
            ->notEmpty('address')
            ->requirePresence('address')
            ->notEmpty('city')
            ->requirePresence('city')
			->notEmpty('province')
            ->requirePresence('province')
            ->notEmpty('postal')
            ->requirePresence('postal')
            ->notEmpty('email')
            ->requirePresence('email')
			->add('email', 'validFormat', [
            'rule' => 'email',
            'message' => 'The email must be a valid email address'
        ])
			 ->notEmpty('telephone')
            ->requirePresence('telephone')
			->add('telephone', 'validFormat', [
            'rule' => array('custom','[d{3}\-\d{3}\-\d{4}]'),
            'message' => 'The telephone must be a valid'        ]);
 
            ->allowEmpty('toppings');
        return $validator;
 
   }
   public function isOwnedBy($orderId, $userId)
{
    return $this->exists(['customer'=>$customerId]);
}
}
?>