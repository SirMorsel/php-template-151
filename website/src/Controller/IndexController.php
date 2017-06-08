<?php

namespace SirMorsel\Controller;

use SirMorsel\SimpleTemplateEngine;

class IndexController
{
  /**
   * @var ihrname\SimpleTemplateEngine Template engines to render output
   */
  private $template;

  /**
   * @param ihrname\SimpleTemplateEngine
   */
  public function __construct(SimpleTemplateEngine $template)
  {
     $this->template = $template;
  }

  public function homepage() {
    echo $this->template->render("home.html.php");
  }

  public function showForum()
  {
    echo $this->template->render("forum.html.php");
  }

  public function greet($name) {
  	echo $this->template->render("hello.html.php", ["name" => $name]);
  }

}
