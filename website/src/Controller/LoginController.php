<?php

namespace SirMorsel\Controller;

use SirMorsel\SimpleTemplateEngine;
use SirMorsel\Service\Login\LoginPdoService;
use SirMorsel\Service\Login\LoginService;

use SirMorsel\Service\Registrieren\RegistrierenPdoService;
use SirMorsel\Service\Registrieren\RegistrierenService;

class LoginController
{
  /**
   * @var ihrname\SimpleTemplateEngine Template engines to render output
   */
  private $template;
  private $loginService;

  /**
   * @param ihrname\SimpleTemplateEngine
   */
  public function __construct(SimpleTemplateEngine $template,  LoginService $loginService)
  {
     $this->template = $template;
     $this->loginService = $loginService;
  }

  public function showLogin()
  {
  echo $this->template->render("login.html.php");
  }




  public  function login(array $data)
  {
  	if (!array_key_exists("email", $data) OR !array_key_exists("password", $data))
  	{
  		$this->showLogin();
  		return;
  	}
  	if($this->loginService->authenticate($data["email"], $data["password"]))
  	{
  		/*$_SESSION["email"] = $data["email"];*/
  		header('Location: /');
  	}
  	else
  	{
      echo $this->template->render("login.html.php", ["email" => $data["email"]]);
  	}

  	/*if ($stmt->rowCount() === 1)
  	{
  		echo "Login Successful";
  	}
  	else
  	{
  		echo "Login Failed";
  	}*/

  }
}
