<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class class="navbar-brand mr-auto"> Point of Sale</div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
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