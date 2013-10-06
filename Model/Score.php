<?php
class Score extends AppModel {
    public $validate = array(
        'campaign_game_id' => array(
            'rule' => 'numeric',
            'required' => true
        ),
        'army_id' => array(
            'rule' => 'numeric',
            'required' => true
        ),
        'score_type_id' => array(
            'rule' => 'numeric',
            'required' => true
        ),
        'value' => array(
            'rule' => 'numeric',
            'required' => true
        )
    );
    
    public $belongsTo = array('CampaignGame', 'Army', 'ScoreType');
}

?>
