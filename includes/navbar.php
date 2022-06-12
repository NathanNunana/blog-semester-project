</head>

<body>
    <!-- MOBILE VIEW HEADER -->
    <div class="site-wrap">
        <div class="site-mobile-menu">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>
        <!-- END MOBILE VIEW HEADER -->

        <!-- HEADER -->
        <header class="site-navbar" role="banner">
            <div class="container-fluid">
                <div class="header-container">
                    <div class="row align-items-center">

                        <div class="col-12 search-form-wrap js-search-form">
                            <form method="get" action="#">
                                <input type="text" id="s" class="form-control" placeholder="Search...">
                                <button class="search-btn" type="submit"><span class="icon-search"></span></button>
                            </form>
                        </div>

                        <div class="col-4 site-logo">
                            <a href="home.php" class="text-black h2 mb-0">
                                <img src="./static/images/NaBlog_free-file.png" alt="BlogLogo" class="logo">
                            </a>
                        </div>

                        <div class="col-8 text-right align-middle">
                            <nav class="site-navigation" role="navigation">
                                <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block mb-0 px-2 mx-auto">
                                    <li><a href="home.php">Home</a></li>
                                    <li><a href="about.php">About</a></li>
                                    <li><a href="upload.php">Blog</a></li>
                                    <li class="drop-down">
                                        <a href="category.php">Category</a>
                                        <div class="category">
                                            <a href="category.php">Politics</a>
                                            <a href="category.php">Tech</a>
                                            <a href="category.php">Entertainment</a>
                                            <a href="category.php">Travel</a>
                                            <a href="category.php">Sports</a>
                                        </div>
                                    </li>
                                    <li><a href="contact.php">Contact</a></li>
                                    <li><a href="login.php">Logout</a></li>
                                    <li class="d-none d-lg-inline-block"><a href="#" class="js-search-toggle"><span class="icon-search"></span></a></li>
                                </ul>
                            </nav>
                            <a href="#" class="site-menu-toggle js-menu-toggle text-black d-inline-block d-lg-none"><span class="icon-menu h3"></span></a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- END HEADER -->