<?php

class Session
{

 public function isConnectUser()
 {
  $isConnect = false;
  if (isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])) {
   $isConnect = true;
  }
  return $isConnect;
 }

 public function connectUser()
 {
  $_SESSION["idUser"] = $id;
 }
 public function disconnectUser()
 {
  session_unset();
  session_destroy();
  header('location:' . BASE_URL . "connection");
  die();
 }

}
