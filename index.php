<!doctype html>
<html>
    <head>
        <title>E-commerce shop of "SDU"</title>
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/slider.css">
        <link rel="stylesheet" href="css/basket.css">
        <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Exo:700i" rel="stylesheet">
    </head>
    <body>
        <header class="header fullWidth ">
            <div class="logoBrand fullWidth flexCenter fullHeight ">
                <img src="img/logo.png" alt="">
                <p>SDU E-commerce</p>
                <div class="dropdown">
                    <button class="dropbtn">Cart <i class="fa fa-shopping-cart" aria-hidden="true"></i><span id="amountOfItems">0</span></button>
                    <div class="dropdown-content" id="basketDropdown">
                        <div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <div class="slider">
            <div class="slideshow-container">

                <div class="mySlides animate">

                    <img src="img/2-Holiday_HP_Grips.jpg" style="width:100%">
                    <div class="text">D750 Two Lens Bundle</div>
                </div>

                <div class="mySlides animate">

                    <img src="img/3-Hol_HP_7200.jpg" style="width:100%">
                    <div class="text">D500 Two Lens Bundle</div>
                </div>

                <div class="mySlides animate">
                    <img src="img/4-Holiday_HP_Lens_kit.jpg" style="width:100%">
                    <div class="text">D3400 Two Lens Bundle</div>
                </div>

                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>

            </div>
            <br>

            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>
        </div>
            <div class="items-wrapper fullWidth flexCenter flex-wrap">
                <?php 
                    $link = mysqli_connect("127.0.0.1", "root", "", "web_project");
                    if (!$link) {
                        echo "Error: Unable to connect to MySQL." . PHP_EOL;
                        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
                        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
                        exit;
                    }
                    $sql="SELECT count(*) FROM items";
                    $result=mysqli_query($link,$sql);
                    // Numeric array
                    $items=mysqli_fetch_all($result,MYSQLI_ASSOC);
                    $itemsCount = $items[0]["count(*)"];
                    $amountOfRows = intval($itemsCount/3);
                    if($itemsCount%3!=0){
                        $amountOfRows++;
                    }
                    if($amountOfRows>3){
                        $amountOfRows=3;
                    }
                    for($i = 0 ; $i < $amountOfRows ; $i++ ){
                        $sql="SELECT * FROM items limit 3 offset ".$i*3;
                        $result=mysqli_query($link,$sql);
                        $items=mysqli_fetch_all($result,MYSQLI_ASSOC);
                        print_items_row($items);
                    }
                    function print_items_row($items)
                    {
                        echo '<div class="items-row eightyWidth flexCenter">';
                        foreach ($items as $item) {
                            echo '
                            <div class="items-element thirtyWidth fullHeight flexCenter  relative" >
                            <img src="'.$item["photoUrl"].'" alt="">
                            <div class="item-description seventyWidth pt-sans">
                                <p>'.$item["description"].'</p>
                            </div>
                            <div class="item-price absolute circle redish-background flexCenter ">
                                <p>'.$item["price"].' USD</p>
                            </div>
                            <button class="button button2 relative add-to-basket">Add to cart  <i class="fa fa-cart-plus" aria-hidden="true"></i></button>
                        </div>';
                        }
                        echo "</div>";
                    }
                    echo "</div>";
                    



                    mysqli_close($link);

                ?>
                <!--div class="items-row eightyWidth flexCenter">

                    <div class="items-element thirtyWidth fullHeight flexCenter  relative" >
                        <img src="img/item1.png" alt="">
                        <div class="item-description seventyWidth pt-sans">
                            <p>Canon 500mm F4.0  L IS II EF AF USM Lens copy </p>
                        </div>
                        <div class="item-price absolute circle redish-background flexCenter ">
                            <p>1800 USD</p>
                        </div>
                        <button class="button button2 relative add-to-basket">Add to cart  <i class="fa fa-cart-plus" aria-hidden="true"></i></button>
                    </div>

                    <div class="items-element thirtyWidth fullHeight flexCenter relative" >
                        <img src="img/item2.png" alt="">
                        <div class="item-description seventyWidth pt-sans">
                            <p>Canon 500mm F4.0  L IS II EF AF USM Lens copy </p>
                        </div>
                        <div class="item-price absolute circle redish-background flexCenter ">
                            <p>1800 USD</p>
                        </div>
                        <button class="button button2 relative add-to-basket">Add to cart  <i class="fa fa-cart-plus" aria-hidden="true"></i></button>
                    </div>
                    <div class="items-element thirtyWidth fullHeight flexCenter relative" >
                        <img src="img/item3.png" alt="">
                        <div class="item-description seventyWidth pt-sans">
                            <p>Canon 500mm F4.0  L IS II EF AF USM Lens copy </p>
                        </div>
                        <div class="item-price absolute circle redish-background flexCenter ">
                            <p>1800 USD</p>
                        </div>
                        <button class="button button2 relative add-to-basket">Add to cart  <i class="fa fa-cart-plus" aria-hidden="true"></i></button>
                    </div>
                </div>
                <div class="items-row eightyWidth flexCenter">
                    <div class="items-element thirtyWidth fullHeight flexCenter relative" >
                        <img src="img/item4.png" alt="">
                        <div class="item-description seventyWidth pt-sans">
                            <p>Canon 500mm F4.0  L IS II EF AF USM Lens copy </p>
                        </div>
                        <div class="item-price absolute circle redish-background flexCenter ">
                            <p>1800 USD</p>
                        </div>
                        <button class="button button2 relative add-to-basket">Add to cart  <i class="fa fa-cart-plus" aria-hidden="true"></i></button>
                    </div>
                    <div class="items-element thirtyWidth fullHeight flexCenter relative" >
                        <img src="img/item5.png" alt="">
                        <div class="item-description seventyWidth pt-sans">
                            <p>Canon 500mm F4.0  L IS II EF AF USM Lens copy</p>
                        </div>
                        <div class="item-price absolute circle redish-background flexCenter ">
                            <p>1800 USD</p>
                        </div>
                        <button class="button button2 relative add-to-basket">Add to cart  <i class="fa fa-cart-plus" aria-hidden="true"></i></button>
                    </div>
                    <div class="items-element thirtyWidth fullHeight flexCenter relative" >
                        <img src="img/item6.png" alt="">
                        <div class="item-description seventyWidth pt-sans">
                            <p>Canon 500mm F4.0  L IS II EF AF USM Lens copy</p>
                        </div>
                        <div class="item-price absolute circle redish-background flexCenter ">
                            <p>1800 USD</p>
                        </div>
                        <button class="button button2 relative add-to-basket">Add to cart  <i class="fa fa-cart-plus" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div-->
            <div class="fullWidth ajax-add-elements-wrapper flexCenter">
                <button class="button button1" id="show-other-items">
                    Show other items <i class="fa fa-refresh" aria-hidden="true"></i>
                </button>
            </div>
        </main>
        <footer>
            <div class="partners-wrapper fullWidth flexCenter">
                <div class="eightyWidth partners fullHeight">
                    <img src="img/footer-img-2.png" alt="">
                    <img src="img/footer-img-3.png" alt="">
                    <img src="img/footer-img-1.png" alt="">
                    <img src="img/footer-img-2.png" alt="">
                </div>

            </div>
            <div class="last-block-wrapper fullWidth flexCenter flexCenter">
                <div class="last-block eightyWidth fullHeight">
                    <div class="halfWidth fullHeight">
                        <div class="copyright">
                            <p>
                                Copyright © 2014 Photonics. All rights reserved.
                            </p>
                        </div>
                        <div class="footer-menu">
                            <p>Home</p>
                            <p>Store Policies</p>
                            <p>Driving directions</p>
                        </div>
                    </div>
                    <div class="halfWidth fullHeight social-links-wrapper">
                        <div class="social-links ">
                            <i class="fa fa-twitter-square" aria-hidden="true"></i>
                            <i class="fa fa-facebook-square" aria-hidden="true"></i>
                            <i class="fa fa-youtube-square" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <script src="js/slider.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="js/main.js"></script>
        <script src="js/basket.js"></script>
    </body>

</html>