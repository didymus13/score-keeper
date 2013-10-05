<?php

class Army extends AppModel {
    public $table = 'armies';
    
    public $validate = array(
        'user_id' => array(
            'rule' => 'numeric',
            'required' => true
        ),
        'name' => array(
            'rule' => 'notEmpty',
            'required' => true
        ),
        'description' => 'notEmpty',
        'is_active' => 'numeric'
    );
    
    public $belongsTo = array('User');
    public $hasAndBelongsToMany = array('Campaign', 'CampaignGame');
}

?>
