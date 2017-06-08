<?php
namespace SirMorsel\Service\Registrieren;

class RegistrierenPdoService implements RegistrierenService
{
  private $pdo;

  public function __construct(\PDO $pdo)
  {
    $this->pdo = $pdo;
  }

  public function authenticate($username, $password)
	{
		$stmt = $this->pdo->prepare("SELECT * FROM user WHERE email =? AND password=?");
		$stmt->bindValue(1, $username);
		$stmt->bindValue(2, $password);
		$stmt->execute();
		if ($stmt->rowCount() === 1)
		{
			/*echo "Login Successful";*/
			//$_SESSION["email"] = $username;
			return true;
		}
		else
		{
			/*echo "Login Failed";*/
			return false;
		}

	}

  public function saveUserInDB($newUserEmail, $newUserPassword, $newUserAnzeigename)
  {
      if (!empty($newUserEmail) && !empty($newUserPassword) && !empty($newUserAnzeigename)) {
      # code...

      $hash = password_hash($newUserPassword, PASSWORD_DEFAULT);
    //  $newUserPassword = sha1($newUserPassword); //bcrypt
      $stmt = $this->pdo->prepare("INSERT INTO user (email, password, anzeigename) VALUES (?,?,?)");
      $stmt->bindValue(1, $newUserEmail);
      $stmt->bindValue(2, $hash);
      $stmt->bindValue(3, $newUserAnzeigename);
      $stmt->execute();
    }

  }


}

 ?>
