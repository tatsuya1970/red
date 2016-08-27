<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>TEST</title>
	<?php echo Asset::css('bootstrap.css'); ?>
</head>
<body>
<div class="container">
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>user_name</th>
				<th>user_age</th>
				<th>created_at</th>
				<th>updated_at</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($users as $user): ?>
				<tr>
					<th scope="row"><?php echo $user->id; ?></th>
					<td><?php echo $user->user_name; ?></td>
					<td><?php echo $user->user_age; ?></td>
					<td><?php echo $user->created_at; ?></td>
					<td><?php echo $user->updated_at; ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
</body>
</html>
