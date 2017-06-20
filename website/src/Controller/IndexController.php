<?php

namespace SirMorsel\Controller;

use SirMorsel\SimpleTemplateEngine;

use SirMorsel\Service\Forum\ForumService;

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


  public function greet($name)
  {
  	echo $this->template->render("hello.html.php", ["name" => $name]);
  }

}
