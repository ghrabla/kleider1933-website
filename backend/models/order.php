<?php
class order
{
  // DB Stuff
  private $conn;
  private $table = 'orders';

  public $id;
  // Properties
  public $name;
  public $price;
  public $title;
  public $gender;
  public $type;

  public $image;
  public $fullname;
  public $phone;
  public $email;
  public $city;
  public $adresse;
  public $postale;
  


  // Constructor with DB
  public function __construct($db)
  {
    $this->conn = $db;
  }

  // Get categories
  public function read()
  {
    // Create query
    $query = "SELECT * FROM orders ";
    // Prepare statement
    $stmt = $this->conn->prepare($query);
    // Execute query
    $stmt->execute();

    return $stmt;
  }
  // Get Single Category
  public function read_single()
  {
    // Create query
    $query = "SELECT * FROM orders WHERE id= :id";

    //Prepare statement
    $stmt = $this->conn->prepare($query);

    // Bind ID
    $stmt->bindParam(1, $this->id);

    // Execute query
    $stmt->execute(["id"=>$this->id]);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // set properties
    $this->id = $row['id'];
    $this->name = $row['name'];
    $this->price = $row['price'];
    $this->title = $row['title'];
    $this->gender = $row['gender'];
    $this->type = $row['type'];
    $this->image = $row['image'];
    $this->fullname = $row['fullname'];
    $this->phone = $row['phone'];
    $this->email = $row['email'];
    $this->city = $row['city'];
    $this->adresse = $row['adresse'];
    $this->postale = $row['postale'];
  }


 

  // Create Category
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
      fullname = :fullname,
      phone = :phone,
      email = :email,
      city = :city,
      adresse = :adresse,
      postale = :postale
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
    $this->fullname = htmlspecialchars(strip_tags($this->fullname));
    $this->phone = htmlspecialchars(strip_tags($this->phone));
    $this->email = htmlspecialchars(strip_tags($this->email));
    $this->city = htmlspecialchars(strip_tags($this->city));
    $this->adresse = htmlspecialchars(strip_tags($this->adresse));
    $this->postale = htmlspecialchars(strip_tags($this->postale));
    // Bind data
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':price', $this->price);
    $stmt->bindParam(':title', $this->title);
    $stmt->bindParam(':gender', $this->gender);
    $stmt->bindParam(':type', $this->type);
    $stmt->bindParam(':image', $this->image);
    $stmt->bindParam(':fullname', $this->fullname);
    $stmt->bindParam(':phone', $this->phone);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':city', $this->city);
    $stmt->bindParam(':adresse', $this->adresse);
    $stmt->bindParam(':postale', $this->postale);
    // Execute query
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
    // Create Query
    $query = 'UPDATE ' .
      $this->table . '
    SET
    name = :name,
    price = :price ,
    title = :title,
    gender = :gender,
    type = :type,
    image = :image,
    fullname = :fullname,
    phone = :phone,
    email = :email,
    city = :city,
    adresse = :adresse,
    postale = :postale WHERE  id= :id';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);
    
    $this->id = htmlspecialchars(strip_tags($this->id));
    $this->name = htmlspecialchars(strip_tags($this->name));
    $this->price = htmlspecialchars(strip_tags($this->price));
    $this->title = htmlspecialchars(strip_tags($this->title));
    $this->gender = htmlspecialchars(strip_tags($this->gender));
    $this->type = htmlspecialchars(strip_tags($this->type));
    $this->image = htmlspecialchars(strip_tags($this->image));
    $this->fullname = htmlspecialchars(strip_tags($this->fullname));
    $this->phone = htmlspecialchars(strip_tags($this->phone));
    $this->email = htmlspecialchars(strip_tags($this->email));
    $this->city = htmlspecialchars(strip_tags($this->city));
    $this->adresse = htmlspecialchars(strip_tags($this->adresse));
    $this->postale = htmlspecialchars(strip_tags($this->postale));
    // Bind data
    $stmt->bindParam(':id', $this->id);
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':price', $this->price);
    $stmt->bindParam(':title', $this->title);
    $stmt->bindParam(':gender', $this->gender);
    $stmt->bindParam(':type', $this->type);
    $stmt->bindParam(':image', $this->image);
    $stmt->bindParam(':fullname', $this->fullname);
    $stmt->bindParam(':phone', $this->phone);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':city', $this->city);
    $stmt->bindParam(':adresse', $this->adresse);
    $stmt->bindParam(':postale', $this->postale);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong

    // return false;
  }

  // Delete Category
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
