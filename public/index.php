<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


use Phalcon\Mvc\Application;
use Phalcon\Config\Adapter\Ini as ConfigIni;


try {

	define('APP_PATH', realpath('..') . '/');

	/**
	 * Read the configuration
	 */
	$config = new ConfigIni(APP_PATH . 'app/config/config.ini');

	/**
	 * Auto-loader configuration
	 */
	require APP_PATH . 'app/config/loader.php';

	/**
	 * Load application services
	 */
    require APP_PATH . 'app/Bootstrap.php';


    /**
     * Handle the request
     */
	$application = new Application($di);
    /**
     * Include modules
     */
    require __DIR__ . '/../app/config/modules.php';

	echo $application->handle()->getContent();

} catch (Phalcon\Exception $e) {
    echo $e->getMessage();
} catch (PDOException $e) {
    echo $e->getMessage();
}
