<?php

class Campaign extends AppModel {
    public $validate = array(
        'user_id' => array(
            'rule' => 'numeric',
            'required' => true
        ),
        'name' => array(
            'rule' => 'not Empty',
            'required' => 'true'
        ),
    );
    
    public $belongsTo = array('User');
}

?>
