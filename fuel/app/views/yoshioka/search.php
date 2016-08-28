<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>user_name</th>
			<th>user_age</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($users as $user): ?>
			<tr>
				<th scope="row"><?php echo $user['user_name']; ?></th>
				<td><?php echo ($user['user_age'] == $me['user_age'] ? $user['user_age'] : '-'); ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
