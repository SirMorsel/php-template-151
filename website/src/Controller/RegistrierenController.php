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

  /***********Bestätigungs Mail*************************************************/
	/*public function getMailer()
	{
		return/* \Swift_Mailer::newInstance(
					 \Swift_SmtpTransport::newInstance("smtp.gmail.com", 465, "ssl")
					 ->setUsername("gibz.module.151@gmail.com") // https://www.sitepoint.com/sending-email-with-swift-mailer/
					 ->setPassword("Pe$6A+aprunu"));*/

           /*
           $transport = Swift_SmtpTransport::newInstance("smtp.gmail.com", 465, "ssl");
           $transport->setUsername("gibz.module.151@gmail.com");
           $transport->setPassword("Pe$6A+aprunu");

           $message = Swift_Message::newInstance();
           $message->setTo(array("patrick.nibbia@gmail.com"));

           $mailer = Swift_Mailer::newInstance($transport);
           return $mailer->send($message);


					 $transport = Swift_SmtpTransport::newInstance($this->config['mailer']['host'], $this->config['mailer']['port'], $this->config['mailer']['security']);
					 $transport->setUsername($this->config['mailer']['user']);
					 $transport->setPassword($this->config['mailer']['password']);

					 $message = Swift_Message::newInstance();
					 $message->setTo(array("patrick.nibbia@gmail.com"));

					 $mailer = Swift_Mailer::newInstance($transport);
					 return $mailer->send($message);
	}
*/
  /******************************/



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
