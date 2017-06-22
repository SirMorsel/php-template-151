<?php
namespace SirMorsel\Service\Login;
//session_start();
class LoginPdoService implements LoginService
{
	private $pdo;

	public  function __construct(\PDO $pdo)
	{
		$this->pdo = $pdo;
	}

	public function authenticate($username, $password)
	{
		//$password = sha1($password); //bcrypt //// PASSWORD_DEFAULT
		$stmt = $this->pdo->prepare("SELECT * FROM user WHERE email =?"); //AND password=? //////
		$stmt->bindValue(1, $username);
		//$stmt->bindValue(2, $password); /////
		$stmt->execute();

// http://fluuux.de/2014/10/wie-man-sensible-daten-einer-datenbank-speichert-aes_encrypt/
	if ($stmt->rowCount() === 1)
		{

			$stmtP = $this->pdo->prepare("SELECT password FROM user WHERE email =? AND isActivated = 1");
			$stmtP->bindValue(1, $username);

			$stmtP->execute();

			$returnData = $stmtP->fetch();

			if(count($returnData) != 0)
			{

				$success = password_verify($password, $returnData['password']);

				//var_dump($password);

				if($success)
				{
					$_SESSION["email"] = $username;
				}

				return $success;

			}
			else
			{
				print "No User fosdfund";
				return false;
			}


		}
		else
		{
			/*echo "Login Failed";*/
			return false;
		}

	}





}

?>
