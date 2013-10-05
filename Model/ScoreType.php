<?php

class ScoreType extends AppModel {
    public $validate = array(
        'campaign_id' => array(
            'rule' => 'numeric',
            'required' => true
        ),
        'label' => array(
            'rule' => 'notEmpty',
            'required' => true
        ),
        'weight' => 'numeric'
    );
    
    public $belongsTo = array('Campaign');
}

?>
