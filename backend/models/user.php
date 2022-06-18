<?php
class user
{
  // DB Stuff
  private $conn;
  private $table = 'users';

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
      $query = "SELECT * FROM users WHERE email = :email ";
      $stmt = $this->conn->prepare($query);


      // Execute query
      $stmt->execute(["email"=>$this->email]);
      // $user = $stmt->fetch(PDO::FETCH_OBJ);
			// return $user;
      return $stmt;
  }
  public function read()
  {
    // Create query
    $query = "SELECT * FROM users ";
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

  public function update()
  {
    // Create query
    $query = 'UPDATE ' .
      $this->table . '
    SET
      fullname = :fullname,
      email = :email ,
      password = :password
      WHERE id = :id';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->fullname = htmlspecialchars(strip_tags($this->fullname));
    $this->email = htmlspecialchars(strip_tags($this->email));
    $this->password = htmlspecialchars(strip_tags($this->password));
    $this->id = htmlspecialchars(strip_tags($this->id));
    // Bind data
    $stmt->bindParam(':fullname', $this->fullname);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':password', $this->password);
    $stmt->bindParam(':id', $this->id);
    // Execute query
    if ($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
  }

  // Delete Category
  public function delete()
  {
    // Create query
    $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Bind data
    $stmt->bindParam(':id', $this->id);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
  }

  // Get Single
  public function read_single()
  {
    // Create query
    $query = 'SELECT * FROM ' . $this->table . ' WHERE id = :id';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Bind data
    $stmt->bindParam(':id', $this->id);

    // Execute query
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Set properties
    $this->id = $row['id'];
    $this->fullname = $row['fullname'];
    $this->email = $row['email'];
    $this->password = $row['password'];
  }

}
