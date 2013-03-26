<?php
App::uses('File', 'Utility');
App::uses('Folder', 'Utility');
/**
 * LogfilePanel for CakePHP DebugKit
 *
 * This panel allows you to view the last few lines from every log file.
 * Sometimes, due to a redirect(), the default Log panel does not provide
 * you with the information that you want. This panel provides you the
 * ability to peek in the log files without leaving your app.
 *
 * Copyright 2013, ODC Engineering (http://odc-engineering.nl)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2013, ODC Engineering
 * @link http://odc-engineering.nl
 * @package DebugPlus
 * @subpackage Panels
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class LogfilePanel extends DebugPanel {

	/**
	 * This panel is part of the DebugPlus plugin.
	 *
	 * @var string
	 */
	public $plugin = 'DebugPlus';

	/**
	 * The amount of bytes to read per log file.
	 * Reducing this number increases load speed, but reduces the amount of information shown.
	 *
	 * The default value is 2048, which is usually enough to view at least the last stack trace.
	 *
	 * @var int
	 */
	public $readBytes = 2048;

	/**
	 * beforeRender callback function
	 *
	 * @param Controller $controller
	 * @return array contents for panel
	 */
	public function beforeRender(Controller $controller) {
		$data = array();
		$dir = new Folder(LOGS);
		$files = $dir->find();
		foreach ($files as $log) {
			$file = new File(LOGS . $log);
			$name = $file->name();
			if (!$file->readable()) {
				$data[$name]['content'] = __('This log file is unreadable.');
				continue;
			}
			$data[$name] = array();
			$data[$name]['lastChange'] = date('Y-m-d H:i:s', $file->lastChange());
			$data[$name]['size'] = $file->size();
			if ($file->size() > $this->readBytes) {
				$file->offset(-$this->readBytes, SEEK_END);
			}
			$data[$name]['content'] = $file->read($this->readBytes);
		}
		return $data;
	}

}