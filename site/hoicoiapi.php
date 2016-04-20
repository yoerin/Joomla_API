<?php

/**
 * @package    hoicoiapi
 * @subpackage Base
 * @author     Jibon Lawrence Costa {@link http://www.hoicoimasti.com}
 * @author     Created on 14-Sep-2014
 * @license    GNU/GPL
 */
//-- No direct access
defined('_JEXEC') or die;


$params = JComponentHelper::getParams('com_hoicoiapi');
$token = trim($params->get('token'));
$get = trim(JFactory::getApplication()->input->get('token', '0', 'STRING'));
$allowed_tasks = $params->get('allow_tasks', array());
$task = JFactory::getApplication()->input->get('task', 'getContents');

if ( !in_array($task, $allowed_tasks) || (!$token || !strcmp($token, $get) == 0)) {
    jexit('Please use correct token with URL');
}


$controller = JControllerLegacy::getInstance('hoicoiapi');

$controller->execute( $task );

$controller->redirect();
