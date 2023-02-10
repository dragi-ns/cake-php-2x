<h1>Blog posts</h1>
<?php
echo $this->Html->link(
	'Add Post',
	['controller' => 'posts', 'action' => 'add']
);
?>
<table>
	<tr>
		<th>Id</th>
		<th>Title</th>
		<th>Action</th>
		<th>Created</th>
	</tr>

	<?php foreach ($posts as $post) : ?>
		<tr>
			<td><?php echo $post['Post']['id']; ?></td>
			<td>
				<?php
				echo $this->Html->link(
					$post['Post']['title'],
					['controller' => 'posts', 'action' => 'view', $post['Post']['id']]
				);
				?>
			</td>
			<td>
				<?php
				echo $this->Html->link(
					'Edit',
					['controller' => 'posts', 'action' => 'edit', $post['Post']['id']]
				);
				?>
				<?php
				echo $this->Form->postLink(
					'Delete',
					['action' => 'delete', $post['Post']['id']],
					['confirm' => 'Are you sure you want to delete this post?']
				);
				?>
			</td>
			<td><?php echo $post['Post']['created']; ?></td>
		</tr>
	<?php endforeach; ?>
	<?php unset($post); ?>
</table>
