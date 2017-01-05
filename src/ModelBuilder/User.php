<?php
namespace App\ModelBuilder;
class User extends Model
{
  private $users;
  function __construct()
  {
    $users = $this->getUsers();
  }

  public function insertUser($tab)
  {
    $user = $this->insert('users',$tab);
    return $this->getUsers();
  }

  public function getUsers()
  {
    $users = $this->all('users');
    return $users;
  }

  public function getUser($unom)
  {
    $user = $this->findOne('users', array('nom' => $unom));
    return $user;
  }

}
 ?>
