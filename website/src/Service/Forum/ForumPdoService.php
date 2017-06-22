<?php
namespace SirMorsel\Service\Forum;

class ForumPdoService implements ForumService
{
	private $pdo;

	public  function __construct(\PDO $pdo)
	{
		$this->pdo = $pdo;
	}

  public function savePost($postTitle, $postContent, $user)
  {

      if (!empty($postTitle) && !empty($postContent) && !empty($user))
      {
      $stmtP = $this->pdo->prepare("SELECT id FROM user WHERE email = ?");
      $stmtP->bindValue(1, $user);

      $stmtP->execute();

      $returnUserId = $stmtP->fetch();
        if(count($returnUserId) != 0)
        {
          $stmt = $this->pdo->prepare("INSERT INTO tbPosts (post_title, post_content, user_id, post_Time) VALUES (?,?,?,CURRENT_TIMESTAMP)");
          $stmt->bindValue(1, $postTitle);
          $stmt->bindValue(2, $postContent);
          $stmt->bindValue(3, $returnUserId[0]);
          $stmt->execute();
        }

      }
}
    function showPosts()
   {
     $stmt = $this->pdo->prepare("SELECT p.post_title, p.post_content, p.post_Time , u.displayName FROM tbPosts p INNER JOIN user u ON u.id = p.user_id WHERE id = user_id ORDER BY id DESC");
     $stmt->execute();

     $display = "";

     $display .= "<div class='postOutput'>";

		 foreach ($stmt->fetchAll() as $row)
		 {
			 $display .= "<hr>";
       $display .= "<div class='titleOut'>" . $row['post_title'] . "</div>";
			 $display .= "</br>";
       $display .= "<div class='contentOut'>" . $row['post_content'] . "</div>";
			 $display .= "</br>";

       $display .= "<div class='timeMailOut'>". "<i>" . $row['displayName'] . "</i>" . " " . $row['post_Time'] . "</div>";

		 }

      $display .= "</div>";
      $display .= "<hr></br>";
      return $display;

   }

	 function aktivateAccount($securetyKey)
   {
     if ($securetyKey == "")
     {
       echo "Fehler bei der Aktivierung";
     }
     else
     {

       $stmt = $this->pdo->prepare("UPDATE user SET isActivated = 1, securetyKey =''  WHERE securetyKey = '$securetyKey'");
       $stmt->execute();
			 echo "Aktivierung erfolgreich!";
     }

   }
}

?>
