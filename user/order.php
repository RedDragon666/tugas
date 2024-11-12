<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cake_ordering";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from URL
$cake_name = isset($_GET['cake_name']) ? $_GET['cake_name'] : '';
$price = isset($_GET['price']) ? (float)$_GET['price'] : 0;
$quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
$total_price = $price * $quantity;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $shipping_cost = (float)$_POST['shipping_cost'];
    $total_payment = $total_price + $shipping_cost;

    $sql = "INSERT INTO orders (cake_name, price, quantity, total_price, customer_name, phone, address, province, city, shipping_cost, total_payment)
            VALUES ('$cake_name', '$price', '$quantity', '$total_price', '$customer_name', '$phone', '$address', '$province', '$city', '$shipping_cost', '$total_payment')";

    if ($conn->query($sql) === TRUE) {
        echo "Order has been saved successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();

$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Discount Page</title>
    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet" />
    <style>
      /* Custom CSS */
      body {
        background-color: #f9f9f9;
      }
      .navbar {
        background-color: #ffffff;
        padding: 10px;
      }
      .navbar-nav .nav-link.active {
        color: #ff3366 !important;
      }
      .discount-banner {
        background-color: #f5f5f5;
        padding: 40px;
        text-align: center;
        font-size: 2em;
        color: #ff3366;
        margin-top: 20px;
      }
      .category-section,
      .best-seller-section {
        text-align: center;
        margin-top: 30px;
      }
      .category-icons img,
      .best-seller img {
        border-radius: 10px;
        max-width: 100px;
        max-height: 100px;
      }
      .best-seller-item {
        margin-top: 15px;
      }
      .product-list {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 20px;
      }
      .product-card {
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 15px;
        text-align: center;
        width: 200px;
      }
      .product-card img {
        max-width: 100%;
        border-radius: 10px;
      }
      .checkout-btn {
        background-color: #ff3366;
        color: #fff;
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
      }
      .checkout-btn:hover {
        background-color: #ff6699;
      }
    </style>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#"></a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link <?php echo ($current_page == 'dashboard.php') ? 'active' : ''; ?>" href="dashboard.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo ($current_page == 'produk.php') ? 'active' : ''; ?>" href="produk.php">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo ($current_page == 'order.php') ? 'active' : ''; ?>" href="order.php">Orders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo ($current_page == 'sales.php') ? 'active' : ''; ?>" href="sales.php">Sales</a>
          </li>
        </ul>
      </div>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </nav>

    <!-- Search Bar -->
    <div class="container mt-4">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Cari Bahan Baku..." />
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="button">Search</button>
        </div>
      </div>
    </div>

    <!-- Discount Banner -->
    <h2>Pesanan Anda</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="cake_name">Select Cake</label>
            <input type="text" name="cake_name" id="cake_name" value="<?php echo $cake_name; ?>" class="form-control" readonly>
        </div>
        
        <div class="mb-3">
            <label for="price">Price (Rp)</label>
            <input type="text" name="price" id="price" value="<?php echo number_format($price, 2); ?>" class="form-control" readonly>
        </div>
        
        <div class="mb-3">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" id="quantity" value="1" class="form-control" onchange="calculateTotal()">
        </div>
        
        <div class="mb-3">
            <label>Total Price: Rp. <span id="total_price"><?php echo number_format($total_price, 2); ?></span></label>
        </div>
        
        <h4>Customer Information</h4>
        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="address">Address</label>
            <textarea name="address" id="address" class="form-control" rows="2" required></textarea>
        </div>
        
        <h4>Shipping Information</h4>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="province">Province</label>
                <select name="province" id="province" class="form-select" onchange="updateShippingCost()">
                    <option value="Banten">Banten</option>
                    <option value="Jawa Barat">Jawa Barat</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label for="city">City</label>
                <select name="city" id="city" class="form-select" onchange="updateShippingCost()">
                    <option value="Pandeglang">Pandeglang</option>
                    <option value="Serang">Serang</option>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label for="shipping_cost">Shipping Cost (Rp)</label>
            <input type="number" name="shipping_cost" id="shipping_cost" class="form-control" readonly>
        </div>

        <div class="mb-3">
            <label>Total Payment: Rp. <span id="total_payment"><?php echo number_format($total_price, 2); ?></span></label>
            <input type="hidden" name="total_payment" id="total_payment_value">
        </div>

        <button type="submit" class="btn btn-success">Selesai Belanja</button>
    </form>
</div>

<script>
    function calculateTotal() {
        const price = parseFloat(document.getElementById("price").value.replace(',', ''));
        const quantity = parseInt(document.getElementById("quantity").value);
        const shipping_cost = parseFloat(document.getElementById("shipping_cost").value) || 0;

        const total_price = price * quantity;
        const total_payment = total_price + shipping_cost;

        document.getElementById("total_price").innerText = total_price.toLocaleString();
        document.getElementById("total_payment").innerText = total_payment.toLocaleString();
        document.getElementById("total_payment_value").value = total_payment;
    }
</script>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
