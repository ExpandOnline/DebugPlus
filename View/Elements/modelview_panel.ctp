<h2>Modelview</h2>
<ul class="neat-array depth-0">
	<li class="expandable">
		<strong><?php echo $content['modelClass']; ?></strong>
		<?php foreach ($content['associations'] as $type => $association): ?>
		<ul class="neat-array depth-1">
			<li class="expandable">
				<strong><?php echo $type; ?></strong>
				<?php foreach ($association as $model => $assocData): ?>
					<ul class="neat-array depth-2">
						<li class="expandable">
							<strong><?php echo $model; ?></strong>
							<ul class="neat-array depth-3">
								<?php foreach ($assocData as $key => $data): ?>
								<li>
									<strong><?php echo $key; ?></strong>
									<?php echo ($data) ? $data : __('(empty)'); ?>
								</li>
								<?php endforeach; ?>
							</ul>
						</li>
					</ul>
				<?php endforeach; ?>
			</li>
		</ul>
		<?php endforeach; ?>
	</li>
</ul>