<h2>Logfile excerpts</h2>
<?php
$links = array();
foreach (array_keys($content) as $log) {
	$links[] = $this->Html->link($log, '#debugplus-log-' . $log);
}
?>
<p>Jump to log: <?php echo implode(' | ', $links); ?></p>
<?php foreach ($content as $log => $data): ?>
	<h4><a name="<?php echo 'debugplus-log-' . $log; ?>"></a><?php echo $log; ?></h4>
	<?php if (array_key_exists('lastChange', $data)): ?>
	<span><?php echo __(' (Last changed: %s)', $data['lastChange']); ?></span>
	<?php endif; ?>
	<pre><?php echo h($data['content']); ?></pre>
	<hr/>
<?php endforeach; ?>
