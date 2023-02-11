<div class="users form">
	<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
		<?php echo $this->Form->input('username');
		echo $this->Form->input('password');

		if (AuthComponent::user('role') === 'admin') {
			echo $this->Form->input('role', array(
				'options' => array('admin' => 'Admin', 'author' => 'Author')
			));
		}
		?>
		<?php echo $this->Form->input('id', ['type' => 'hidden']); ?>
	</fieldset>
	<?php echo $this->Form->end(__('Edit user')); ?>
</div>
