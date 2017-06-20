<?php
namespace SirMorsel\Controller;

use SirMorsel\SimpleTemplateEngine;
use SirMorsel\Service\Registrieren\RegistrierenPdoService;
use SirMorsel\Service\Registrieren\RegistrierenService;

use SirMorsel\Service\Login\LoginPdoService;
use SirMorsel\Service\Login\LoginService;

class RegistrierenController
{
  private $template;
  private $registrierenService;

  public function __construct(SimpleTemplateEngine $template,  RegistrierenService $registrierenService)
  {
     $this->template = $template;
     $this->registrierenService = $registrierenService;
  }

  public function showRegistrieren()
  {
    echo $this->template->render("registrieren.html.php");

  }

  public function registrieren(array $data)
  {
    if (!array_key_exists("emailReg", $data) OR !array_key_exists("passwordReg", $data))
  	{
    //  var_dump($data);
      //die();
      $this->registrierenService->saveUserInDB($data["emailReg"], $data["pwdReg"], $data["usernameReg"], $data["pwdRegBest"]);
  		$this->showRegistrieren(); //Kehrt zu Login zurück

  		return;
  	}
    else
    {
      if($this->registrierenService->authenticate($data["emailReg"], $data["passwordReg"]))
  	  {
        // var_dump($this);
  		 /*$_SESSION["email"] = $data["email"];*/
         header('Location: /');
  	  }
  	  else
  	  {
         echo $this->template->render("login.html.php", ["emailReg" => $data["emailReg"]]);
  	  }
   }

  }

}

 ?>
