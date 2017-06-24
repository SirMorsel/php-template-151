<?php
namespace SirMorsel\Service\Login;

interface LoginService
{
  public function authenticate($username, $password);
}

?>
