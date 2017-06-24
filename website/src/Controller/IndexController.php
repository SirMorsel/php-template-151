<?php

namespace SirMorsel\Controller;

use SirMorsel\SimpleTemplateEngine;

use SirMorsel\Service\Forum\ForumService;
use SirMorsel\Service\Forum\ForumPdoService;

class IndexController
{
  /**
   * @var ihrname\SimpleTemplateEngine Template engines to render output
   */
  private $template;
  private $ForumService;
  /**
   * @param ihrname\SimpleTemplateEngine
   */
  public function __construct(SimpleTemplateEngine $template,  ForumService $ForumService)
  {
     $this->template = $template;
     $this->forumService = $ForumService;
  }

  public function homepage()
  {
    echo $this->template->render("home.html.php", ["showposts" => $this->forumService->showPosts()]);

  }

  public function home(array $data)
  {
    if(isset($data["sendPost"]))
    {
      $this->forumService->savePost($data['titlePost'], $data['contentPost'], $data["email"]);
    }
      if ($data["email"] == "patrick.nibbia@gmail.com" && isset($data['btnDeletePost']))
      {
        $this->forumService->deletePost($data['titlePostDelete']);
      }
      $this->homepage();

   		return;

  }

  function aktivateAccountController($securetyKey)
  {
    $this->forumService->aktivateAccount($securetyKey);

  }


  public function greet($name)
  {
  	echo $this->template->render("hello.html.php", ["name" => $name]);
  }

}
