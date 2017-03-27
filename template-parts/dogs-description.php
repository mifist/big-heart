<div class="dogs-desc">
	<div class="row">
		<div class="large-12 columns">
			<h3>Характеристики</h3>
			<?php
			// vars
			$dogs_sex = get_field('dogs_sex');
			$dogs_age = get_field('dogs_age');
			$dogs_size = get_field('dogs_size');
			
			if( $dogs_sex && $dogs_age && $dogs_size): ?>
				<ul> <!-- check-->
					<li class="dog-<?php echo $dogs_sex['value']; ?>">
						Пол: <?php echo $dogs_sex['label']; ?>
					</li>
					<li class="dog-<?php echo $dogs_age['value']; ?>">
						Возраст: <?php echo $dogs_age['label']; ?>
					</li>
					<li class="dog-<?php echo $dogs_size['value']; ?>">
						Размер: <?php echo $dogs_size['label']; ?>
					</li>
				</ul>
			<?php endif; ?>
		</div>
	</div>

</div>