<?php
// Get the current page to set the active class
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
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
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
    <div class="container discount-banner">
      <h1>DISKON <span style="color: #ff3366; font-weight: bold">50%</span></h1>
    </div>

    <!-- Product Section -->
    <div class="container popular-section">
      <h2>Populer</h2>
      <div class="product-list">
        <div class="product-card">
          <img src="red-velvet.jpg" alt="Red Velvet">
          <h3>Red Velvet</h3>
          <p>Rp. 90,000</p>
          <button class="checkout-btn" onclick="checkoutOrder('Red Velvet', 90000)">Checkout</button>
        </div>
        <div class="product-card">
          <img src="sweet-vanilla.jpg" alt="Sweet Vanilla">
          <h3>Sweet Vanilla</h3>
          <p>Rp. 100,000</p>
          <button class="checkout-btn" onclick="checkoutOrder('Sweet Vanilla', 100000)">Checkout</button>
        </div>
      </div>
    </div>

    <!-- JavaScript to Handle Checkout -->
    <script>
        function checkoutOrder(name, price) {
            window.location.href = `order.php?cake_name=${encodeURIComponent(name)}&price=${price}`;
        }
    </script>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
