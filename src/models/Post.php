<?php
class Post extends PostRepository
{
  private $id;
  private $title;
  private $content;
  private $id_user;
  private $likes ;

  public function __construct( $title, $content,$id_user,$likes=0,$id=0)
  {
    $this->id = htmlspecialchars($id);
    $this->setTitle($title);
    $this->setContent($content);
    $this->setIdUser($id_user);
    $this->setLikes($likes);
  }

  public function getId()
  {
    return $this->id;
  }

  public function setTitle($title)
  {
    $this->title = htmlspecialchars($title);
  }
  public function getTitle()
  {
    return $this->title;
  }

  public function getContent()
  {
    return $this->content;
  }
  public function setContent($content)
  {
    $this->content = $content;
  }
  public function getIdUser()
  {
    return $this->id_user;
  }
  public function setIdUser($id_user)
  {
    $this->id_user= $id_user;
  }
  public function getLikes()
  {
    return $this->likes;
  }
  public function setLikes($likes)
  {
    $this->likes= $likes;
  }
}
