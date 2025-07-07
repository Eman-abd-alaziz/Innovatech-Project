<?php
global $conn, $numRows;
include 'components/connect.php';
session_start();
$scan=true;
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];


    if(isset($_POST['car_id'])){
        $car_id = $_POST['car_id'];


        $currentDate = date("Y-m-d");

        $countRecords = $conn->prepare("SELECT COUNT(*) FROM check-car");
        $countRecords->execute();
        $rowCount = $countRecords->fetchColumn();

        $insertcar = $conn->prepare("INSERT INTO check-car VALUES (?, ?, ?, ?, ?)");
        $insertcar->execute([$rowCount + 1, $user_id, $car_id, $currentDate, 'yes']);
    }
}else{
    $user_id = '';
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name = "viewport" content="width=device-width , initial-scale = 1.0">
    <title>WEB-PROJECT</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="stylesheet" href="css/main-page-car.css">

    <style>

        .newsletter{
            padding: 6rem 2rem;
            text-align: center;
            /*background: url("photos/letter-bg.png") ;*/
            background-size: cover;


        }


    </style>

</head>
<body>





<div id="content">

    <header class="header">

        <section class="flex">

            <a href="home.php" class="logo" >Innova<span>tech</span></a>

            <nav class="navbar" style="margin-left: 20px;">
                <a href="home.php">Home</a>
                <a href="shop.php">shop</a>
                <a href="orders.php">orders</a>
                <a href="about.php">about</a>
                <a href="contact.php">contact</a>
                <a href="repair.php">repair page</a>
            </nav>

            <div class="icons" style="display:    flex;">
<!--                <div class="im"><img src="photos/75704.png"  id="tool"></div>-->
                <div id="menu-btn" class="fas fa-bars"></div>

                <button id="user-btn" class="op" >Login</button>
            </div>

            <div class="profile">
                <?php

                $select_profile = $conn->prepare("SELECT * FROM users WHERE id = ?");
                $select_profile->execute([$user_id]);
                if($select_profile->rowCount() > 0){
                    $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <script>


                        let y=document.getElementById('user-btn');
                        y.innerText=' ';
                        y.classList.add('op');
                        y.classList.remove('log')

                    </script>
                    <p>Welcome <?= $fetch_profile["name"]; ?></p>
                    <a href="update_user.php" class="btn">update profile</a>
                    <div class="flex-btn">
                        <a href="user_register.php" class="option-btn">register</a>
                        <b href="user_login.php" class="option-btn">login</b>
                    </div>
                    <a href="components/user_logout.php" class="delete-btn" onclick="return confirm('logout from the website?');">logout</a>
                <?php
                }
                else{
                ?>
                    <script>


                        let y=document.getElementById('user-btn');


                        y.classList.remove('op')

                    </script>
                    <p>please login or register first!</p>
                    <div class="flex-btn">
                        <a href="user_register.php" class="option-btn">register</a>
                        <a href="user_login.php" class="option-btn">login</a>
                    </div>
                    <?php
                }
                ?>


            </div>

        </section>

    </header>

</div>

<!--home section start-->

<section class="home" id="homee">

<!--    <h1 class="home-parallax" data-speed = "-2">Find Cars</h1>-->
    <img class="home-parallax" data-speed = "5" src="/photos/back.png" alt="">
    <a  id="explore" class="btn home-parallax" data-speed = "7" style="margin-top: 15px">Explore More Laptops</a>

</section>


<!--home section end-->

<!--icon section start-->

<section class="icons-container">

    <div class="icons">

        <i class="fas fa-home"></i>
        <div class="content">
            <h3>10+</h3>
            <p>branches</p>
        </div>

    </div>


    <div class="icons">

        <i class="fa-solid fa-laptop"></i>
        <div class="content">
            <h3>800+</h3>
            <p>Laptops</p>
        </div>

    </div>


    <div class="icons">

        <i class="fas fa-users"></i>
        <div class="content">
            <h3>400+</h3>
            <p>Happy Clients</p>
        </div>

    </div>

    <div class="icons">

        <i class="fa-solid fa-laptop"></i>
        <div class="content">
            <h3>300+</h3>
            <p>New Accessories</p>
        </div>

    </div>

</section>

<!--icon section end-->


<!--cars section start-->

<section class="featured" id="featured">

    <div class="swiper featured-slider">

        <div class="swiper-wrapper">

            <?php

            $select = $conn->prepare("SELECT * FROM car");

            $select->execute();

            $cart_row = $select->fetch(PDO::FETCH_ASSOC);
            $numRows=$select->rowCount();
            if ($cart_row) {
                $select->execute();
                $scan=true;
                $s=0;
                while ($cart_row = $select->fetch(PDO::FETCH_ASSOC)) {
                    if ($s === (int)($numRows/3 )){$scan=false;}
                    $s++;
                    if($scan){


                        ?>
                        <div class="swiper-slide box" style="height: 481.38px">
                            <form action="" method="post" >
                                <input type="hidden"  id="car_id" name="car_id" value="<?= $cart_row['id']; ?>">
<!--                                <img src="--><?php //= $cart_row['img']; ?><!--" style="width: 332.96px;height: 233.9px;" alt="">-->
                                <img src="./uploaded_img/<?= $cart_row['img']; ?>"  style="width: 332.96px;height: 300px;" alt="">


                                <h3><?= $cart_row['car_name']; ?></h3>
                                <p><?= $cart_row['description']; ?></p>

                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>


                                </div>

                                <div class="price">$<?= $cart_row['price']; ?></div>
                                <input type="submit" class="btn" value="check out">


                            </form>
                        </div>
                        <?php
                    }
                } }else {
                echo '<p class="empty">Your Check-out page is empty</p>';
            }
            ?>


        </div>
        <div class="swiper-pagination"></div>

    </div>

</section>


<!--cars section end-->

<!--services section start-->

<section class="services" id="services">

    <h1 class="heading"> Our <span>services</span></h1>
    <div class="box-container">
        <div class="swiper-slide box">
            <i class="fa-solid fa-laptop"></i>
            <h3>Laptop Sales</h3>
            <p>Discover cutting-edge technology in our exclusive laptop collection, designed to match your lifestyle and elevate your productivity.</p>
            <a href="#" class="btn">Read More</a>
        </div>

        <div class="swiper-slide box">
            <i class="fa-solid fa-toolbox"></i>
            <h3>Laptop Repair</h3>
            <p> Bring your laptops back to life with our expert repair services, ensuring smooth performance and lasting reliability.</p>
            <a href="#" class="btn">Read More</a>
        </div>

        <div class="swiper-slide box">
            <i class="fa-solid fa-award"></i>
            <h3>Extended Warranty</h3>
            <p>Protect your investment with our comprehensive extended warranty plans, covering unexpected repairs and replacements.</p>
            <a href="#" class="btn">Read More</a>
        </div>



        <div class="swiper-slide box">
            <i class="fa-brands fa-windows"></i>
            <h3>Software Installation & Updates</h3>
            <p>Stay up to date with our professional software installation and update services, tailored to meet your specific needs.</p>
            <a href="#" class="btn">Read More</a>
        </div>


        <div class="swiper-slide box">
            <i class="fa-solid fa-battery-full"></i>
            <h3>Battery Replacement</h3>
            <p>Keep your laptop powered with our seamless battery replacement service, ensuring efficiency and prolonged performance.</p>
            <a href="#" class="btn">Read More</a>
        </div>


        <div class="swiper-slide box">
            <i class="fas fa-headset"></i>
            <h3>24/7 support</h3>
            <p>Enjoy uninterrupted productivity with our dedicated 24/7 technical support, ready to assist you anytime, anywhere.</p>
            <a href="#" class="btn">Read More</a>
        </div>

    </div>


</section>

<!--services section end-->

<!--featured section start-->


<section class="featured" id="featured">


    <h1 class="heading"><span>Featured</span>Laptops</h1>

    <div class="swiper featured-slider">

        <div class="swiper-wrapper">


            <?php

            // Select cars associated with the user_id from the check-car table
            $select = $conn->prepare("SELECT * FROM car");

            $select->execute();

            // Fetch the first row and display the associated car information
            $cart_row = $select->fetch(PDO::FETCH_ASSOC);
            $scan=false;
            $s=0;
            if ($cart_row) {

                // Reset the cursor to the beginning to fetch all rows in the next loop
                $select->execute();

                // Fetch each row and display the associated car information
                while ($cart_row = $select->fetch(PDO::FETCH_ASSOC)) {
                    if ($s === (int)($numRows *0.333333333)){$scan=true;}
                    if($s=== (int)($numRows *0.666666666)){$scan=false;}
                    $s++;
                    if($scan){


                        // Display the car details
                        ?>
                        <div class="swiper-slide box" style="height: 481.38px">
                            <form action="" method="post" >
                                <input type="hidden"  id="car_id" name="car_id" value="<?= $cart_row['id']; ?>">
                                <img src="./uploaded_img/<?= $cart_row['img']; ?>"  style="width: 332.96px;height: 300px;" alt="">
                                <h3><?= $cart_row['car_name']; ?></h3>
                                <p><?= $cart_row['description']; ?></p>

                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>


                                </div>

                                <div class="price">$<?= $cart_row['price']; ?></div>
                                <input type="submit" class="btn" value="check out">

                            </form>

                        </div>
                        <?php
                    }
                } }else {
                echo '<p class="empty">Your Check-out page is empty</p>';
            }
            ?>

        </div>
        <div class="swiper-pagination"></div>

    </div>


    <div class="swiper featured-slider">

        <div class="swiper-wrapper">


            <?php

            $select = $conn->prepare("SELECT * FROM car");

            $select->execute();

            $cart_row = $select->fetch(PDO::FETCH_ASSOC);

            if ($cart_row) {
                $select->execute();
                $scan=false;
                $s=0;
                while ($cart_row = $select->fetch(PDO::FETCH_ASSOC)) {

                    if($s=== (int)($numRows *0.666666666)){$scan=true;}
                    $s++;
                    if($scan){


                        ?>
                        <div class="swiper-slide box" style="height: 481.38px">
                            <form action="" method="post" >
                                <input type="hidden"  id="car_id" name="car_id" value="<?= $cart_row['id']; ?>">
                                <img src="./uploaded_img/<?= $cart_row['img']; ?>"  style="width: 332.96px;height: 300px;" alt="">
                                <h3><?= $cart_row['car_name']; ?></h3>
                                <p><?= $cart_row['description']; ?></p>

                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>


                                </div>

                                <div class="price">$<?= $cart_row['price']; ?></div>
                                <input type="submit" class="btn" value="check out">


                            </form>
                        </div>
                        <?php
                    }
                } }else {
                echo '<p class="empty">Your Check-out page is empty</p>';
            }
            ?>


        </div>
        <div class="swiper-pagination"></div>

    </div>

</section>


<!--featured section end-->


<!--newsletter section start-->


<section class="newsletter">


    <h3>subscribe for latest updates</h3>

    <p>Get an E-mail to get latest special offers</p>

    <form action="user_login.php">
        <input type="submit" value="Log in">
    </form>




</section>

<!--newsletter section end-->


<!--review section start-->

<section class="reviews" id="reviews">


    <h1 class="heading">client's <span>review</span></h1>

    <div class="swiper reviews-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide box">

                <img src="/photos/male.png" alt="">
                <div class="content">
                    <p>Our clients rave about the seamless online experience when shopping for car Cars on our website</p>
                    <h3>Ethan Williams</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>


                    </div>
                </div>

            </div>

            <div class="swiper-slide box">

                <img src="/photos/female.png" alt="">
                <div class="content">
                    <p>Customer reviews consistently highlight the user-friendly interface, making it easy to find and purchase the perfect car upgrades.</p>
                    <h3>Olivia Martinez</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>


                    </div>
                </div>

            </div>

            <div class="swiper-slide box">

                <img src="/photos/male.png" alt="">
                <div class="content">
                    <p>Positive feedback underscores the extensive range of high-quality Cars, catering to diverse tastes and vehicle types</p>
                    <h3>Lucas Mitchell</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>


                    </div>
                </div>

            </div>

            <div class="swiper-slide box">

                <img src="/photos/female.png" alt="">
                <div class="content">
                    <p>Clients appreciate the detailed product descriptions and reviews from fellow customers, aiding in informed decision-making.</p>
                    <h3>Sophia Reynolds</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>


                    </div>
                </div>

            </div>

            <div class="swiper-slide box">

                <img src="/photos/male.png" alt="">
                <div class="content">
                    <p>The quick and secure checkout process is a standout feature, praised for its efficiency and hassle-free transaction experience.</p>
                    <h3>Mason Anderson</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>


                    </div>
                </div>

            </div>


            <div class="swiper-slide box">

                <img src="/photos/female.png" alt="">
                <div class="content">
                    <p>Responsive customer support has garnered acclaim, ensuring any queries or concerns are promptly addressed for a satisfying shopping journey.</p>
                    <h3>Olivia Martinez</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>


                    </div>
                </div>

            </div>



        </div>

        <div class="swiper-pagination"></div>

    </div>





</section>


<!--review section end-->


<!--contact section start-->
<section class="contact" id="contact">

    <h1 class="heading">Find us</h1>

    <div class="row">

        <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d867266.9977728397!2d34.892076!3d31.88589545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151cf2d28866bdd9%3A0xee17a001d166f686!2sPalestine!5e0!3m2!1sen!2s!4v1700743692152!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" ></iframe>

    </div>



</section>
<!--contact section end-->

<?php include 'components/footer.php'; ?>




<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>





<script src = "js/main-page-car.js"></script>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>



<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></st>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>