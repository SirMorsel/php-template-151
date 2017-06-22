<?php
session_start();

use SirMorsel\Service\Login\LoginPdoService;
use SirMorsel\Service\Registrieren\RegistrierenPdoService;

error_reporting(E_ALL);

require_once("../vendor/autoload.php");
$config = parse_ini_file(__DIR__. "/../config.ini", true);
$factory = new SirMorsel\Factory($config);

/*var_dump($config); die;*/


switch($_SERVER["REQUEST_URI"]) {
	case "/testroute":
		echo "Test blabla";
		break;
	case "/":
		$ctr = $factory->getIndexController();
		if (isset($_POST["sendPost"]))
		{
			$_POST["email"] = $_SESSION["email"];
			$ctr->home($_POST);
		}
		else
		{
			$ctr->homepage();
		}
		break;

	case "/login":
		$ctr = $factory->getLoginController();
		if ($_SERVER["REQUEST_METHOD"] == "GET")
		{
		$ctr->showLogin();
		}
		else
		{
		$ctr->login($_POST);
		}
		break;

		case "/registrieren":
			$ctr = $factory->getRegistrierenController();
			if ($_SERVER["REQUEST_METHOD"] == "GET")
			{
			$ctr->showRegistrieren();
			}
			else
			{
			$ctr->registrieren($_POST);
			}
			break;

			case "/home":
				$ctr = $factory->getIndexController(); //getIndexController();
				if ($_SERVER["REQUEST_METHOD"] == "GET")
				{
				$ctr->homepage();
				}
				else
				{
				$ctr->home($_POST);
				}
				break;

	default:
		$matches = [];
		if(preg_match("|^/hello/(.+)$|", $_SERVER["REQUEST_URI"], $matches))
		{
			(new SirMorsel\Controller\IndexController($tmpl))->greet($matches[1]);
			break;
		}
		if(preg_match("|^/activate=(.+)$|", $_SERVER["REQUEST_URI"], $matches))
		{
			$factory->getIndexController()->aktivateAccountController($matches[1]);
			break;
		}
		echo "Not Found";
}
