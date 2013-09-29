<?= $this->Form->create() ?>
<?= $this->Form->inputs(array('legend' => 'Please Log in', 'email', 'password')) ?>
<?= $this->Form->end(__('Login')) ?>