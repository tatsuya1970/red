<?php if ($success): ?>
	<div class="alert alert-success" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Success!</strong> <?php echo $success; ?>
	</div>
<?php endif; ?>
<?php echo Form::open(array('action' => 'profile_edit', 'class'=>'form-group')); ?>
	<div class="form-group">
		<label for="user_name">user_name</label>
		<?php echo Form::input('user_name', $me['user_name'], array('class' => 'form-control')); ?>
	</div>
	<div class="form-group">
		<label for="user_age">user_age</label>
		<?php
			$options = array();
			foreach (range(20, 60) as $key => $value) {
				$options[$value] = $value;
			}
		?>
		<?php echo Form::select('user_age', $me['user_age'], $options, array('class' => 'form-control')); ?>
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
<?php echo Form::close(); ?>
