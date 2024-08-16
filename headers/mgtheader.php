<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class class="navbar-brand mr-auto"> Store Management</div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../manage/index.php">Home Page</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../inventory/index.php">Inventory</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../sales/index.php">Sales</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="receiveDeliveryDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Receive Delivery
          </a>
          <div class="dropdown-menu" aria-labelledby="receiveDeliveryDropdown">
            <a class="dropdown-item" href="../supplier/index.php">Supplier Update</a>
            <a class="dropdown-item" href="../product/index.php">Product Update</a>
            <a class="dropdown-item" href="../consigned_product/index.php">Product Delivery</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="orderProductsDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Order Products
          </a>
          <div class="dropdown-menu" aria-labelledby="orderProductsDropdown">
            <a class="dropdown-item" href="../order/index.php">Purchase Order Manage</a>
            <a class="dropdown-item" href="../expired_product/index.php">Expired Products Manage</a>
          </div>
        </li>
        <li class="nav-item logout">
          <a class="nav-link" href="../login/Signout.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- <marquee> -->
  <div class="ml-3 mr-3">
    <div class="row justify-content-between NameTime">
      <div class="col-auto">
        <?php echo $fullname ?>
      </div>
      <div class="col-auto">
        <div id="timer"></div>
      </div>
    </div>
  </div>
  <!-- </marquee> -->