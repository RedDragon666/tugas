<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: index.php");
    exit();
}

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
    </style>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#"></a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link <?php echo ($current_page == 'dashboard.php') ? 'active' : ''; ?>" href="dashboard.php">Home</a></li>
          <li class="nav-item"><a class="nav-link <?php echo ($current_page == 'produk.php') ? 'active' : ''; ?>" href="produk.php">Products</a></li>
          <li class="nav-item"><a class="nav-link <?php echo ($current_page == 'order.php') ? 'active' : ''; ?>" href="order.php">Orders</a></li>
          <li class="nav-item"><a class="nav-link <?php echo ($current_page == 'sales.php') ? 'active' : ''; ?>" href="sales.php">Sales</a></li>
        </ul>
      </div>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
      </ul>
    </nav>

    <div class="container mt-5">
      <h2>Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?>!</h2>
    </div>
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

    <!-- Category Section -->
    <div class="container category-section">
      <h3>Kategori</h3>
      <div class="row justify-content-center mt-3">
        <div class="col-4 col-md-2">
          <img src="stok-kue.png" alt="Stok Kue" />
          <p>Stok Kue</p>
        </div>
        <div class="col-4 col-md-2">
          <img src="bahan-baku.png" alt="Bahan Baku" />
          <p>Bahan Baku</p>
        </div>
        <div class="col-4 col-md-2">
          <img src="supplier.png" alt="Supplier" />
          <p>Supplier</p>
        </div>
      </div>
    </div>

    <!-- Best Seller Section -->
    <div class="container best-seller-section">
      <h3>Best Seller</h3>
      <div class="row justify-content-center mt-3">
        <div class="col-6 col-md-4 best-seller-item">
          <img src="red-velvet.png" alt="Red Velvet" />
          <p>Red Velvet - $10.00</p>
        </div>
        <div class="col-6 col-md-4 best-seller-item">
          <img src="sweet-vanilla.png" alt="Sweet Vanilla" />
          <p>Sweet Vanilla - $12.00</p>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
