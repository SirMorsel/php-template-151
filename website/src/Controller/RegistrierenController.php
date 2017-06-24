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
  private $mailer;

  public function __construct(SimpleTemplateEngine $template,  RegistrierenService $registrierenService , \Swift_Mailer $mailer)
  {
     $this->template = $template;
     $this->registrierenService = $registrierenService;
     $this->mailer = $mailer;
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
      $securetyKey = sha1(mt_rand(10000, 99999).time().$data["emailReg"]);
      $this->registrierenService->saveUserInDB($data["emailReg"], $data["pwdReg"], $data["usernameReg"], $data["pwdRegBest"], $securetyKey);
      $this->sendMail($data["emailReg"], $securetyKey);
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

function sendMail($mail, $activationToken)
{
  $message = (new \Swift_Message('Registrierung'))
                    ->setFrom(['patrick.nibbia@gmail.com' => 'noreply'])
                    ->setTo([$mail])
                    ->setBody("Oeffnen Sie diesen Link um Ihren Account zu aktivieren https://localhost/activate=" . $activationToken);

                    $this->mailer->send($message);
}

}

 ?>
