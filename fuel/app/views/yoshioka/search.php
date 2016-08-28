<table id="search-resuit" class="table table-striped table-hover">
	<thead>
		<tr>
			<th>名前</th>
			<th>年齢</th>
			<th>出身地</th>
			<th>学歴</th>
			<th>仕事</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($users as $user): ?>
			<tr>
				<th scope="row"><?php echo $user['user_name']; ?></th>
				<td class="<?php echo ($user['user_age'] == $me['user_age'] ? 'success' : ''); ?>"><?php echo ($user['user_age'] == $me['user_age'] ? $user['user_age'] : '-'); ?></td>
				<td class="<?php echo ($user['user_shusshin'] == $me['user_shusshin'] ? 'success' : ''); ?>"><?php echo ($user['user_shusshin'] == $me['user_shusshin'] ? $user['user_shusshin'] : '-'); ?></td>
				<td class="<?php echo ($user['user_gakureki'] == $me['user_gakureki'] ? 'success' : ''); ?>"><?php echo ($user['user_gakureki'] == $me['user_gakureki'] ? $user['user_gakureki'] : '-'); ?></td>
				<td class="<?php echo ($user['user_shigoto'] == $me['user_shigoto'] ? 'success' : ''); ?>"><?php echo ($user['user_shigoto'] == $me['user_shigoto'] ? $user['user_shigoto'] : '-'); ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<script>
$(function() {
	window.setTimeout(function() {
		window.location.reload();
	}, 3000);
});
</script>
