<?php
namespace SirMorsel\Controller;

use SirMorsel\SimpleTemplateEngine;

use SirMorsel\Service\Forum\ForumPdoService;
use SirMorsel\Service\Forum\ForumService;

class ForumController
{

  private $template;
  private $ForumService;

  public function __construct(SimpleTemplateEngine $template,  ForumService $ForumService)
  {
     $this->template = $template;
     $this->ForumService = $ForumService;
  }




  }

 ?>
