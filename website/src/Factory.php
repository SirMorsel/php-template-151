<?php

namespace SirMorsel;

class Factory
{
	private $config;
	public function __construct(array $config)
	{
		$this->config = $config;
	}
	public function getTemplateEngine()
	{
		return new SimpleTemplateEngine(__DIR__ . "/../templates/");
	}

	public function getIndexController()
	{
		return new Controller\IndexController($this->getTemplateEngine(), $this->getIndexService());
	}
	public function getIndexService()
	{
		return new Service\Forum\ForumPdoService($this->getPDO());
	}

	/*public function getForumController()
	{
		return new Controller\ForumController($this->getTemplateEngine());
	}*/

	public function getPDO()
	{
		return new \PDO("mysql:host=mariadb;dbname=app;charset=utf8",
				$this->config["database"]["user"],
				"my-secret-pw",
				[\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
	}
	/***********Login*************************************************************/
	public function getLoginController()
	{
		return new Controller\LoginController($this->getTemplateEngine(), $this->getLoginService());
	}

	public function getLoginService()
	{
		return new Service\Login\LoginPdoService($this->getPDO());
	}

	/***********Registrieren******************************************************/
	public function getRegistrierenController()
	{
		return new Controller\RegistrierenController($this->getTemplateEngine(), $this->getRegistrierenService());
	}

	public function getRegistrierenService()
	{
		return new Service\Registrieren\RegistrierenPdoService($this->getPDO());
	}



	/***********Bestätigungs Mail*************************************************/
	public function getMailer()
	{
		return/* \Swift_Mailer::newInstance(
					 \Swift_SmtpTransport::newInstance("smtp.gmail.com", 465, "ssl")
					 ->setUsername("gibz.module.151@gmail.com") // https://www.sitepoint.com/sending-email-with-swift-mailer/
					 ->setPassword("Pe$6A+aprunu"));*/

					 $transport = Swift_SmtpTransport::newInstance("smtp.gmail.com", 465, "ssl");
					 $transport->setUsername("gibz.module.151@gmail.com");
					 $transport->setPassword("Pe$6A+aprunu");

					 $message = Swift_Message::newInstance();
					 $message->setTo(array("patrick.nibbia@gmail.com"));

					 $mailer = Swift_Mailer::newInstance($transport);
					 return $mailer->send($message);
	}

}
