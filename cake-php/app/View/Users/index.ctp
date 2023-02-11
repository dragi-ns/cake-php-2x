<h1>Users</h1>
<?php
if (AuthComponent::user('role') === 'admin') {
	echo $this->Html->link(
		'Add User',
		['controller' => 'users', 'action' => 'add']
	);
}
?>
<table>
	<tr>
		<th>Id</th>
		<th>Username</th>
		<?php if (AuthComponent::user('id')) : ?>
			<th>Action</th>
		<?php endif; ?>
		<th>Role</th>
		<th>Created</th>
	</tr>

	<?php foreach ($users as $user) : ?>
		<tr>
			<td><?php echo $user['User']['id']; ?></td>
			<td>
				<?php
				echo $this->Html->link(
					$user['User']['username'],
					['controller' => 'users', 'action' => 'view', $user['User']['id']]
				);
				?>
			</td>
			<?php if (AuthComponent::user('id')) : ?>
				<td>
					<?php
					echo $this->Html->link(
						'Edit',
						['controller' => 'users', 'action' => 'edit', $user['User']['id']]
					);
					?>
					<?php
					echo $this->Form->postLink(
						'Delete',
						['action' => 'delete', $user['User']['id']],
						['confirm' => 'Are you sure you want to delete this user?']
					);
					?>
				</td>
			<?php endif; ?>
			<td><?php echo $user['User']['role']; ?></td>
			<td><?php echo $user['User']['created']; ?></td>
		</tr>
	<?php endforeach; ?>
	<?php unset($user); ?>
</table>
