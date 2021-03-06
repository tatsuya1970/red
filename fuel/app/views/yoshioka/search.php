<table id="search-resuit" class="table table-striped table-hover">
	<thead>
		<tr>
			<th>名前</th>
			<th>年齢</th>
			<th>出身地</th>
			<th>学歴</th>
			<th>仕事</th>
			<th>趣味</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th scope="row"><?php echo $me['user_name']; ?></th>
			<td><?php echo $me['user_age']; ?></td>
			<td><?php echo $me['user_shusshin']; ?></td>
			<td><?php echo $me['user_gakureki']; ?></td>
			<td><?php echo $me['user_shigoto']; ?></td>
			<td><?php echo $me['user_shumi']; ?></td>
		</tr>
		<tr v-for="user in users">
			<th scope="row">{{ user.user_name }}</th>
			<td v-bind:class="{ 'success': (user.user_age == '<?php echo $me['user_age']; ?>' && user.user_age != '') }">{{ (user.user_age == '<?php echo $me['user_age']; ?>' ? user.user_age : '-') }}</td>
			<td v-bind:class="{ 'success': (user.user_shusshin == '<?php echo $me['user_shusshin']; ?>' && user.user_shusshin != '') }">{{ (user.user_shusshin == '<?php echo $me['user_shusshin']; ?>' ? user.user_shusshin : '-') }}</td>
			<td v-bind:class="{ 'success': (user.user_gakureki == '<?php echo $me['user_gakureki']; ?>' && user.user_gakureki != '') }">{{ (user.user_gakureki == '<?php echo $me['user_gakureki']; ?>' ? user.user_gakureki : '-') }}</td>
			<td v-bind:class="{ 'success': (user.user_shigoto == '<?php echo $me['user_shigoto']; ?>' && user.user_shigoto != '') }">{{ (user.user_shigoto == '<?php echo $me['user_shigoto']; ?>' ? user.user_shigoto : '-') }}</td>
			<td v-bind:class="{ 'success': (user.user_shumi == '<?php echo $me['user_shumi']; ?>' && user.user_shumi != '') }">{{ (user.user_shumi == '<?php echo $me['user_shumi']; ?>' ? user.user_shumi : '-') }}</td>
		</tr>
	</tbody>
</table>
<script>
$(function() {
	var app = new Vue({
		el: '#search-resuit',
		data: {
			users: []
		},
		methods: {
			reload: function() {
				var _self = this;
				$.ajax({
					type: 'GET',
					url: '<?php echo Uri::create('search_api'); ?>',
					dataType: 'json'
				}).done(function(data) {
					_self.users = data;
				});
			}
		},
		ready: function() {
			var _self = this;
			_self.reload();
			window.setInterval(function() {
				_self.reload();
			}, 5000);
		}
	});
});
</script>
