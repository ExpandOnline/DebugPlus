<?php
/**
 * ModelViewPanel for CakePHP DebugKit
 *
 * This panel allows you to view the Model associated with the current Controller and it's associations.
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
class ModelViewPanel extends DebugPanel {

	/**
	 * This panel is part of the DebugPlus plugin.
	 *
	 * @var string
	 */
	public $plugin = 'DebugPlus';

	/**
	 * beforeRender callback function
	 *
	 * @param Controller $controller
	 * @return array contents for panel
	 */
	public function beforeRender(Controller $controller) {
		$data = array(
			'modelClass' => $controller->modelClass,
			'associations' => array()
		);
		$associations = array('belongsTo', 'hasAndBelongsToMany', 'hasMany', 'hasOne');
		foreach ($associations as $association) {
			if (!empty($controller->{$controller->modelClass}->{$association})) {
				$data['associations'][$association] = $controller->{$controller->modelClass}->{$association};
			}
		}
		return $data;
	}

}