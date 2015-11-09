<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;
use Controller\Component\Auth;

class User extends Entity
{

    // Make all fields mass assignable except for primary key field "id".
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    // ...

    protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }

    // ...
}
?>