<?= $this->Form->create() ?>
<?= $this->Form->inputs(array('email', 'password', array('label' => __('Please login')))) ?>
<?= $this->Form->end(__('Login')) ?>