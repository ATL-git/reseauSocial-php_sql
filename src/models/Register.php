<?php
class Register extends RegisterRepository
{
  private $id;
  private $username;
  private $password;

  public function __construct($id, $username, $password)
  {
    $this->id = htmlspecialchars($id);
    $this->setName($username);
    $this->setPassword($password);
  }

  public function getId()
  {
    return $this->id;
  }

  public function setName($username)
  {
    $this->username = htmlspecialchars($username);
  }
  public function getName()
  {
    return $this->username;
  }

  public function setPassword($password)
  {
    $this->password = $password;
  }
  public function getPassword()
  {
    return $this->password;
  }
}

?>