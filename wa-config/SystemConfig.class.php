<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once realpath(dirname(__FILE__).'/../').'/wa-system/autoload/waAutoload.class.php';
waAutoload::register();

//Add Server Cli
waAutoload::getInstance()->add('webasystStartServerCli', './wa-config/webasystStartServer.cli.php');

class SystemConfig extends waSystemConfig
{
		
}