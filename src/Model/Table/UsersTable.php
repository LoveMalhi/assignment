<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use App\Model\Entity\User;
use Cake\Validation\Validator;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
class UsersTable extends Table
{
 public function initialize(array $config)
    {
        parent::initialize($config);
        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');
    }
	 public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username']));
        return $rules;
    }
    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('username', 'A username is required')
            ->notEmpty('password', 'A password is required')
            ->notEmpty('role', 'A role is required')
            ->add('role', 'inList', [
                'rule' => ['inList', ['admin', 'customer']],
                'message' => 'Enter a valid role'
            ]);
    }

}
?>