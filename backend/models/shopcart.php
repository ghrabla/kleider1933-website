
<?php
class shopcart
{
  // DB Stuff
  private $conn;
  private $table = 'shopcart';

  public $id;
  // Properties
  public $name;
  public $price;
  public $title;
  public $gender;
  public $type;
  public $image;
  public $userId;
  


  // Constructor with DB
  public function __construct($db)
  {
    $this->conn = $db;
  }





  public function read()
  {
    // Create query
    $query = "SELECT * FROM shopcart WHERE userId = :userId";

    // Prepare statement
    $stmt = $this->conn->prepare($query);


    // Execute query
    $stmt->execute(["userId"=>$this->userId]);

    return $stmt;
  }


 public function create()
  {
    // Create Query
    $query = 'INSERT INTO ' .
      $this->table . '
    SET
      name = :name,
      price = :price ,
      title = :title,
      gender = :gender,
      type = :type,
      image = :image,
      userId = :userId
      ';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->name = htmlspecialchars(strip_tags($this->name));
    $this->price = htmlspecialchars(strip_tags($this->price));
    $this->title = htmlspecialchars(strip_tags($this->title));
    $this->gender = htmlspecialchars(strip_tags($this->gender));
    $this->type = htmlspecialchars(strip_tags($this->type));
    $this->image = htmlspecialchars(strip_tags($this->image));
    $this->userId = htmlspecialchars(strip_tags($this->userId));
    // Bind data
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':price', $this->price);
    $stmt->bindParam(':title', $this->title);
    $stmt->bindParam(':gender', $this->gender);
    $stmt->bindParam(':type', $this->type);
    $stmt->bindParam(':image', $this->image);
    $stmt->bindParam(':userId', $this->userId);
    // Execute query
    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }

    // Print error if something goes wrong


    // return false;
  }

  public function delete()
  {
    // Create query
    $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // clean data
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Bind Data
    $stmt->bindParam(':id', $this->id);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong


    // return false;
  }


}