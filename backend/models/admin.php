<?php
class admin
{
  // DB Stuff
  private $conn;
  private $table = 'admins';

  public $id;
  // Properties
  public $fullname;
  public $email;
  public $password;
 
  


  // Constructor with DB
  public function __construct($db)
  {
    $this->conn = $db;
  }


  public function login()
  {
      $query = "SELECT * FROM admins WHERE email = :email AND password =:password";
      $stmt = $this->conn->prepare($query);


      // Execute query
      $stmt->execute(["email"=>$this->email,"password"=>$this->password]);
  
      return $stmt;
  }

  public function read()
  {
    // Create query
    $query = "SELECT * FROM admins ";
    // Prepare statement
    $stmt = $this->conn->prepare($query);
    // Execute query
    $stmt->execute();

    return $stmt;
  }
  public function create()
  {
    // Create Query
    $query = 'INSERT INTO ' .
      $this->table . '
    SET
      fullname = :fullname,
      email = :email ,
      password = :password
      ';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->fullname = htmlspecialchars(strip_tags($this->fullname));
    $this->email = htmlspecialchars(strip_tags($this->email));
    $this->password = htmlspecialchars(strip_tags($this->password));
    // Bind data
    $stmt->bindParam(':fullname', $this->fullname);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':password', $this->password);
   
    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }

    // Print error if something goes wrong


    // return false;
  }

  // Update Category

}
