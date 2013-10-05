<?php

class CampaignGame extends AppModel {
    public $validate = array(
        'campaign_id' => array(
            'rule' => 'numeric',
            'required' => true
        ),
        'name' => array(
            'rule' => 'notEmpty',
            'required' => true            
        ),
        'description' => 'notEmpty',
        'played' => array(
            'rule' => 'date',
            'required' => 'true'
        )
    );
    
    public $belongsTo = array('Campaign');
    public $hasAnBelongsToMany = array('Army');
}

?>
