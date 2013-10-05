<?php
/**
 * System users
 *
 * @author maddox
 */
//App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
class User extends AppModel {
    public $validate = array(
        'email' => array(
            'rule' => 'email',
            'required' => true
        ),
        'password' => array(
            'rule' => 'notEmpty',
            'required' => true
        )
    );
    
//    public function beforeSave($options = array()) {
//        if (!$this->id) {
//            $passwordHasher = new SimplePasswordHasher();
//            $this->data['User']['password'] = $passwordHasher->hash($this->data['User']['password']);
//        }
//        return true;
//    }
}
?>
