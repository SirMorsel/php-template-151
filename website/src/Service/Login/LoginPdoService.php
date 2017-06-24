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
		$stmt = $this->pdo->prepare("SELECT * FROM user WHERE email =?");
		$stmt->bindValue(1, $username);
		$stmt->execute();

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
				echo "<div class='error_box box_round'>";
				echo "No User found";
				echo "</div>";
				return false;
			}


		}
		else
		{
			/*echo "Login Failed";*/
			return false;
		}

	}

	function pwdReset($username, $passwordReset)
	{

		$stmt = $this->pdo->prepare("SELECT * FROM user WHERE email =?");
		$stmt->bindValue(1, $username);
		$stmt->execute();

		if ($stmt->rowCount() === 1)
			{
				$stmtReset = $this->pdo->prepare("UPDATE user SET password ='$passwordReset' WHERE email = '$username' ");
				$stmtReset->bindValue(1, $passwordReset);
				$stmtReset->bindValue(2, $username);
				$stmtReset->execute();
			}
		else
			{
				return false;
			}


	}





}

?>
