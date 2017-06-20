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
          $timestamp = time();
          $time = date("d.m.Y H:i ", $timestamp);

          $stmt = $this->pdo->prepare("INSERT INTO tbPosts (post_title, post_content, user_id, post_Time) VALUES (?,?,?,?)");
          $stmt->bindValue(1, $postTitle);
          $stmt->bindValue(2, $postContent);
          $stmt->bindValue(3, $returnUserId[0]);
          $stmt->bindValue(4, $time);
          $stmt->execute();
        }

      }
}
    function showPosts()
   {
     $stmt = $this->pdo->prepare("SELECT p.post_title, p.post_content, p.post_Time , u.email FROM tbPosts p INNER JOIN user u ON u.id = p.user_id WHERE id = user_id ORDER BY id DESC");
     $stmt->execute();
		 //$result = mysqli_query($stmt);

     $display = "";

     $display .= "<div class='postOutput'>";

		 foreach ($stmt->fetchAll() as $row)
		 {
			 $display .= "<hr>";
       $display .= "<div class='titleOut'>" . $row['post_title'] . "</div>";
			 $display .= "</br>";
       $display .= "<div class='contentOut'>" . $row['post_content'] . "</div>";
			 $display .= "</br>";

       $display .= "<div class='timeMailOut'>". "<i>" . $row['email'] . "</i>" . " " . $row['post_Time'] . "</div>";

		 }

      $display .= "</div>";
      $display .= "<hr></br>";
      return $display;

   }
}

?>
