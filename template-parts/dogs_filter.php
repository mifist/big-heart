<div class="dogs-filter">
	<?php
	// vars
	$dogs_age = get_field_object('dogs_age');
	$dogs_sex = get_field_object('dogs_sex');
	$dogs_size = get_field_object('dogs_size'); ?>

	<div class="row">
		<div class="large-4 columns">
			<h3>Пол</h3>
			<?php if( $dogs_sex ): ?>
				<ul> <!-- check-->
					<?php foreach( $dogs_sex['choices'] as $dog_value => $dog_label ): ?>
						
						<li class="age-<?php echo $dog_value; ?>">
							<input name="dogs_sex" id="dog-<?php echo $dog_value; ?>" type="checkbox" value="<?php echo $dog_value; ?>">
							<label for="age-<?php echo $dog_value; ?>"><?php echo $dog_label; ?></label>
						</li>
					
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
		<div class="large-4 columns">
			<h3>Возраст</h3>
			<?php if( $dogs_age ): ?>
				<ul> <!-- check-->
					<?php foreach( $dogs_age['choices'] as $dog_value => $dog_label ): ?>
						
						<li class="age-<?php echo $dog_value; ?>">
							<input name="dogs_age" id="dog-<?php echo $dog_value; ?>" type="checkbox" value="<?php echo $dog_value; ?>">
							<label for="age-<?php echo $dog_value; ?>"><?php echo $dog_label; ?></label>
						</li>
					
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
		<div class="large-4 columns">
			<h3>Размер</h3>
			<?php if( $dogs_size ): ?>
				<ul> <!-- check-->
					<?php foreach( $dogs_size['choices'] as $dog_value => $dog_label ): ?>
						
						<li class="age-<?php echo $dog_value; ?>">
							<input name="dogs_size" id="dog-<?php echo $dog_value; ?>" type="checkbox" value="<?php echo $dog_value; ?>">
							<label for="age-<?php echo $dog_value; ?>"><?php echo $dog_label; ?></label>
						</li>
					
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>
	<div class="filter-output"></div>
</div>

<script type="text/javascript">
	jQuery(document).ready(function(event){
		$(".dogs-filter input").click(function(event){
			var arr_region = new Array; // Array For checked region
			event.preventDefault();
			var ajaxurl= '<?php echo admin_url("admin-ajax.php"); ?>';
			$(".dogs-filter input:checkbox:checked").each( function () {
				var tmp = $(this).val();
				arr_region.push(tmp);
			});
			
			$.ajax({
				url: ajaxurl,
				dataType: "html",
				type: "POST",
				data:{
					'dogs_sex' : arr_region,
					'dogs_age' : arr_region,
					'dogs_size' : arr_region,
					"action" : "get_keyword_data"
				},
				success: function(data){
					$('.filter-output').html(arr_region);
					console.log(arr_region);
					
				}
			});
		});
	});
</script>