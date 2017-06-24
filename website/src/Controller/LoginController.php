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

  public function showPwdReset()
  {
    echo $this->template->render("passwordReset.html.php");
  }

  public function reset(array $data)
  {
      var_dump($data);
    if (!array_key_exists("emailReg", $data))
  	{
      var_dump($data);
      $securetyKeyPwdReset = sha1(mt_rand(10000, 99999).time().$data["emailForPwdReset"]);
      $this->LoginService->pwdReset($data["emailForPwdReset"]);
      $this->sendMailToReset($data["emailForPwdReset"], $securetyKeyPwdReset);
  		$this->showLogin(); //Kehrt zu Login zurück

  		return;
  	}
  }


    function login(array $data)
  {
  	if (!array_key_exists("email", $data) OR !array_key_exists("password", $data))
  	{
  		$this->showLogin();
  		return;
  	}
  	if($this->loginService->authenticate($data["email"], $data["password"]))
  	{
  		header('Location: /');
  	}
  	else
  	{
      echo $this->template->render("login.html.php", ["email" => $data["email"]]);
  	}
  }

  function sendMailToReset($mail, $passwordResetToken)
  {
    $message = (new \Swift_Message('Passwort Vergessen'))
                      ->setFrom(['patrick.nibbia@gmail.com' => 'noreply'])
                      ->setTo([$mail])
                      ->setBody("Oeffnen Sie diesen Link um Ihr Passwort zurueck zusetzten https://localhost/activate=" . $passwordResetToken);

                      $this->mailer->send($message);
  }
}
