<?= $this->Form->create() ?>
<?= $this->Form->inputs(array('legend' => 'Please Log in', 'username', 'password')) ?>
<?= $this->Form->end(__('Login')) ?>