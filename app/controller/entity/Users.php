<?php

class Users
{
   private $idUser;
   private $lastname;
   private $firstname;
   private $email;
   private $passwordHash;
   private $flag;
   private $dateCreation;
   private $login;
   private $address1;
   private $address2;
   private $zipCode;
   private $idCity;


   
   /**
    * getAdmin
    *
    * @return object
    */
   public function getAdmin()
   {
      $model = new ModelUsers();
      $admin = $model->findChild("administrator", $this->getIdUser());

      return $admin;
   }
   
   /**
    * isAdmin
    *
    * @return bool
    */
   public function isAdmin(): bool
   {
      return $this->getAdmin() != null;
   }

   public function setUserFromArray($user)
   {
      if ($user == true) {
         foreach ($user as $key => $value) {

            $this->$key = $value;
         }
      }
   }
   
   /**
    * isPassword
    *
    * @param  mixed $plaintextPassword
    * @return string
    */
   public function isPassword($plaintextPassword)
   {
      return password_verify($plaintextPassword, $this->getPasswordHash());
   }
   
   /**
    * getLastname
    *
    * @return string
    */
   public function getLastname()
   {
      return $this->lastname;
   }
   
   /**
    * setLastname
    *
    * @param  mixed $lastname
    * @return void
    */
   public function setLastname(string $lastname)
   {
      $this->lastname = $lastname;
   }
   
   /**
    * getPasswordHash
    *
    * @return string
    */
   public function getPasswordHash()
   {
      return $this->passwordHash;
   }

   public function setPasswordHash( $passwordHash)
   {
      $passwordHash = password_hash($passwordHash, PASSWORD_DEFAULT);
      $this->passwordHash = $passwordHash;
      return $this;
   }
   
   /**
    * getLogin
    *
    * @return string
    */
   public function getLogin()
   {
      return $this->login;
   }
   
   /**
    * setLogin
    *
    * @param  mixed $login
    * @return self
    */
   public function setLogin($login)
   {
      $this->login = $login;

      return $this;
   }

   /**
    * Get the value of flag
    */
   public function getFlag(): string
   {
      return $this->flag;
   }


   /**
    * getDisplayFlag
    *
    * @return string
    */
   public function getDisplayFlag(): string
   {
      $flag = "";
      if ($this->flag == "a") {
         $flag = "Actif";
      }
      if ($this->flag == "w") {
         $flag = "En attente";
      }
      if ($this->flag == "b") {
         $flag = "Bloqué";
      }
      return $flag;
   }

   /**
    * Set the value of flag
    *
    * @return self
    */
   public function setFlag(string $flag): self
   {
      $this->flag = $flag;

      return $this;
   }

   /**
    * Get the value of dateCreation
    */
   public function getDateCreation()
   {
      return $this->dateCreation;
   }

   /**
    * Set the value of dateCreation
    *
    * @return self
    */
   public function setDateCreation($dateCreation): self
   {


      $this->dateCreation = $dateCreation;

      return $this;
   }

   /**
    * Get the value of adress1
    */
   public function getAddress1()
   {
      return $this->address1;
   }

   /**
    * Set the value of adress1
    *
    * @return self
    */
   public function setAddress1($address1): self
   {
      $this->address1 = $address1;
      return $this;
   }

   /**
    * Get the value of adress2
    */
   public function getAddress2()
   {
      return $this->address2;
   }

   /**
    * Set the value of adress2
    *
    * @return self
    */
   public function setAddress2($address2): self
   {
      $this->address2 = $address2;

      return $this;
   }

   /**
    * Get the value of zipCode
    */
   public function getZipCode(): int
   {
      return $this->zipCode;
   }

   /**
    * Set the value of zipCode
    *
    * @return self
    */
   public function setZipCode(int $zipCode): self
   {
      $this->zipCode = $zipCode;
      return $this;
   }

   /**
    * Get the value of idCity
    */
   public function getIdCity(): string
   {
      return $this->idCity;
   }

   /**
    * Set the value of idCity
    *
    * @return self
    */
   public function setIdCity($idCity): self
   {

      $this->idCity = $idCity;
      return $this;
   }

   /**
    * Get the value of email
    */
   public function getEmail()
   {
      return $this->email;
   }

   /**
    * Set the value of email
    *
    * @return self
    */
   public function setEmail($email)
   {
      $this->email = $email;
      return $this;
   }

   /**
    * Get the value of firstname
    */
   public function getFirstname(): string
   {
      return $this->firstname;
   }

   /**
    * Set the value of firstname
    *
    * @return self
    */
   public function setFirstname($firstname): self
   {
      $this->firstname = $firstname;
      return $this;
   }

   public function getRoles(): string
   {
      $result = "";
      $format = ", ";
      if ($this->isChef()) {
         $result .= "Chef" . $format;
      }
    
      if ($this->isModerateur()) {
         
         $result .= "Moderateur" . $format;
      }
      if ($this->isAdmin()) {
         $result .= "Administateur" . $format;
      }
      if ($result == "") {
         $result = "Utilisateur" . $format;
      }
      $pos = substr($result, 0, -2);

      return $pos;
   }

   public function setRoles()
   {
   }

   public function makeAdmin()
   {
      $admin = new Admin();
      $admin->setIdAdmin($this->idUser);
      $model = new ModelAdmin();
      $model->insertAdmin($admin);
   }

   public function makeModerator()
   {
      $moderator = new Moderator();
      $moderator->setIdModerator($this->idUser);
      $model = new ModelModerator();
      $model->insertModerator($moderator);
   }

   public function makeChef()
   {
      $chef = new Chef();
      $chef->setIdChef($this->idUser);
      $model = new ModelChef();
      $model->insertChef($chef);
   }

   /**
    * Get the value of idUser
    */
   public function getIdUser()
   {
      return $this->idUser;
   }

   /**
    * Set the value of idUser
    *
    * @return self
    */
   public function setIdUser($idUser)
   {
      $this->idUser = $idUser;
      return $this;
   }
   
      
   /**
    * getCountOrders
    *
    * @return int
    */
   public function getCountOrders()
   {
      return count($this->getOrders());
   }
   
     
   /**
    * getOrders
    *
    * @return object
    */
   public function getOrders()
   {
      $modelorder = new ModelOrders();
      $orders = $modelorder->readAllBy("idUsers", $this->idUser);
      return $orders;
   }
   
   /**
    * getComments
    *
    * @return object
    */
   public function getComments()
   {
      $com = new ModelComment();
      $send = $com->readAllBy("idUsers", $this->idUser);
      return  $send;
   }

  
      
   /**
    * getCommentNbA
    *
    * @return int
    */
   public function getCommentNbA()
   {
      $comments = $this->getComments();
      $nbCommentA = 0;

      foreach ($comments as $comment) {
         if ($comment->getflag() == "a") {
            $nbCommentA += 1;
         }
      }
      return $nbCommentA;
   }
      
   /**
    * getCommentNbB
    *
    * @return int
    */
   public function getCommentNbB()
   {
      $comments = $this->getComments();
      $nbCommentB = 0;

      foreach ($comments as $comment) {
         if ($comment->getflag() == "b") {
            $nbCommentB += 1;
         }
      }
      return $nbCommentB;
   }
      
      
   /**
    * getTownName
    *
    * @return string
    */
   public  function getTownName()
   {
      $model = new ModelCity();
      $townName = $model->readOneBy("idCity", $this->idCity);

      return  $townName->getName();
   }
      
   /**
    * setTownName
    *
    * @return void
    */
   public  function setTownName()
   {
      $model = new ModelCity();
      $townName = $model->readOneBy("idCity", $this->idCity);
   }

      
   /**
    * setTownId
    *
    * @param  mixed $cityName
    * @return string
    */
   public  function setTownId($cityName)
   {
      $model = new ModelCity();
      $townName = $model->readOneBy("name", $cityName);

      if ($townName->getName() != NULL) {
         $townName = $townName->getIdCity();
      } else {
         $newTown = $model->insertCity($cityName);
         $townName = $newTown->getIdCity();
      }
      return $townName;
   }

   public function __construct()
   {
      if ($this->getDateCreation() == null) {
         $d = new DateTime('NOW');
         $this->setDateCreation($d->format('Y-m-d H:i:s'));
      }
   }
   public function getConnectionLogs()
   {
      $model = new ModelConnectionLog();
      $logs = $model->readAllBy("idUsers", $this->getIdUser());
      return $logs;
   }

   public function getLastConnectionLog()
   {
      $lateCoDate = "-";
      if ($this->getConnectionLogs()) {
         $lateCoDate = $this->getConnectionLogs()[0]->getDateConnection();
      }

      return $lateCoDate;
   }

   public function getChef()
   {
      $model = new ModelUsers();
      $chef  = $model->findChild("chef", $this->getIdUser());
      return $chef;
   }
   public function getHimAsChef()
   {

      $chef = new Chef();
      $chef->setChefFromArray($this->getChef());
      return $chef;
   }

   public function isChef(): bool
   {
      return $this->getChef() != null;
   }

   public function getModerator()
   {
      $model     = new ModelUsers();
      $moderator = $model->findChild("moderator", $this->getIdUser());
      return $moderator;
   }

   public function isModerateur(): bool
   {
      return $this->getModerator() != null;
   }
   
}
