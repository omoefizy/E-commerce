<?php 
// class definition
include "../config/connection.php";

  class Products { 

  // define properties /attributes 

	private $productID; 
	private $name; 
	private $price; 
	private $imageName;
	private $quantity;

  //Constructor called when instantiating bear. This demonstrates a default weight parameter
  public function __construct(){ 

  } 
  public function __destruct(){ 

  //Destructor called when object leaves scope or script terminates 

  } 

  //Setters 
  public function setProductID($productID) {
	$this->productID = $productID;
  }
  
  public function setName($name) {
	$this->name = $name;
  }
  
  public function setPrice($price) {
	$this->price = $price;
  }
  
  public function setImageName($imageName) {
	$this->imageName = $imageName;
  }
  
  public function setQuantity($quantity) {
	$this->quantity = $quantity;
  }
  
  //Getters
  public function getProductID() {
	return $this->productID;
  }
  
  public function getName() {
	return $this->name;
  }
  
  public function getPrice() {
	return $this->price;
  }
  
  public function getImageName() {
	return $this->imageName;
  }
  
  public function getQuantity() {
	return $this->quantity;
  }
  
  public function getSpecificProduct($id) {
		$query="SELECT * FROM products WHERE productID = ".$id;
		// Check connection
		
		$conn = Connection::getConnection();
		
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
			
		$result = mysqli_query(Connection::getConnection(), $query) or die(mysqli_error());
		
		if($row = mysqli_fetch_assoc($result)) {
			$this->productID = $row["productID"];
			$this->name = $row["name"];
			$this->quantity = $row["quantity"];
			$this->price = $row["price"];
			$this->imageName = $row["imageName"];
		}
  }
  
  public function deleteProduct() {
			$conn = Connection::getConnection();

				// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			// prepare and bind
			$stmt = $conn->prepare("DELETE FROM products WHERE productID = ?");
			$stmt->bind_param("i", $this->productID);

			$stmt->execute();

			if (mysqli_affected_rows($conn) > 0) {

				//If so , return to calling page(stored in the server variables as HTTP_REFERER

				header("location: admin.php");

			} else {
				// print error message
				$error = "Fail". mysqli_error($conn);
				echo $error;
			}

			$stmt->close();
			$conn->close();
  }
  
   public function saveImage($imageDetails, $target) {
	if (move_uploaded_file($imageDetails, $target)) {
		return true;
	}
	else {
		return false;
	}
  }
  
  public function updateProducts($temp,$target) {
  
		$bool = $this->saveImage($temp,$target);
		
		if($bool == true) {
			$conn = Connection::getConnection();

				// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			// prepare and bind
			$stmt = $conn->prepare("UPDATE products SET name = ?, quantity = ?, imageName = ?, price = ? WHERE productID = ?");
			$stmt->bind_param("sisdi", $this->name, $this->quantity, $this->imageName,$this->price,$this->productID);

			$stmt->execute();

			if (mysqli_affected_rows($conn) > 0) {

				//If so , return to calling page(stored in the server variables as HTTP_REFERER

				header("location: admin.php");

			} else {
				// print error message
				$error = "Fail". mysqli_error($conn);
				echo "Error updating";
			}

			$stmt->close();
			$conn->close();
		}
		else {
			echo "Error uploading image";
		}
  }
  
  public function addNewProducts($temp,$target) {
  
		$bool = $this->saveImage($temp,$target);
		
		if($bool == true) {
			$conn = Connection::getConnection();

				// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			// prepare and bind
			$stmt = $conn->prepare("INSERT INTO products (name, price, imageName, quantity) VALUES (?, ?, ?, ?)");
			$stmt->bind_param("sdsi", $this->name, $this->price, $this->imageName,$this->quantity);

			$stmt->execute();

			if (mysqli_affected_rows($conn) > 0) {

				//If so , return to calling page(stored in the server variables as HTTP_REFERER

				header("location: addNewProduct.php");

			} else {
				// print error message
				$error = "Fail". mysqli_error($conn);
				echo "Error adding";
			}

			$stmt->close();
			$conn->close();
		}
		else {
			echo "Error uploading image";
		}
  }
  
 
  
  public function getProductList($query) {
		$query="SELECT * FROM products";
		if (isset($_GET['sort'])){
			$query=$query." ORDER BY ".$_GET['sort'];
			//echo $query;
		}
		$result = mysqli_query(connection::getConnection(), $query) or die(mysqli_error());
		
		return $result;
  }
}
?>