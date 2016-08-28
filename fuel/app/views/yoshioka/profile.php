<?php if ($firsttime): ?>
	<div class="alert alert-info" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo $firsttime; ?>
	</div>
<?php endif; ?>
<?php if ($success): ?>
	<div class="alert alert-success" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?php echo $success; ?>
	</div>
<?php endif; ?>
<?php echo Form::open(array('action' => 'profile_edit', 'class'=>'form-group')); ?>
	<div class="form-group">
		<label for="user_name">名前</label>
		<?php echo Form::input('user_name', $me['user_name'], array('class' => 'form-control')); ?>
	</div>
	<div class="form-group">
		<label for="user_age">年齢</label>
		<?php
			$options = array();
			$options[''] = '‐‐';
			foreach (range(20, 60) as $key => $value) {
				$options[$value] = $value;
			}
		?>
		<?php echo Form::select('user_age', $me['user_age'], $options, array('class' => 'form-control')); ?>
	</div>
	<div class="form-group">
		<label for="user_shusshin">出身地</label>
		<?php echo Form::input('user_shusshin', $me['user_shusshin'], array('class' => 'form-control')); ?>
	</div>
	<div class="form-group">
		<label for="user_gakureki">学歴</label>
		<?php echo Form::input('user_gakureki', $me['user_gakureki'], array('class' => 'form-control')); ?>
	</div>
	<div class="form-group">
		<label for="user_shigoto">仕事</label>
		<?php echo Form::input('user_shigoto', $me['user_shigoto'], array('class' => 'form-control')); ?>
	</div>
	<div class="form-group">
		<label for="user_shumi">趣味</label>
		<?php echo Form::input('user_shumi', $me['user_shumi'], array('class' => 'form-control')); ?>
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
<?php echo Form::close(); ?>
