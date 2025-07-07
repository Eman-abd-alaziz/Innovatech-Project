<?php
global $conn;
include 'components/connect.php';
session_start();

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
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

    <link rel="stylesheet" href="css/repair.css">



</head>
<body>


<header class="header">

    <section class="flex">

        <a href="home.php" class="logo">Inno<span>vatech</span></a>

        <nav class="navbar">
            <a href="home.php">home</a>
            <a href="about.php">about</a>
            <a href="orders.php">orders</a>
            <a href="shop.php">shop</a>
            <a href="contact.php">contact</a>
            <a href="main-page-Laptop.php">check out a Laptop</a>
        </nav>

        <div class="icons">

            <div id="menu-btn" class="fas fa-bars"></div>

            <button id="user-btn"  style="color:#fff" class="op">Login</button>
        </div>

        <div class="profile">
            <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
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
            }else{
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










<!-- fun fact section starts  -->

<section class="fun-fact" style="background-color: transparent; position:relative; top:5px">

    <div class="box">
        <img src="/photos/fun-fact-icon-1.svg" alt="">
        <div class="info">
            <h3>890</h3>
            <p>repairs done</p>
        </div>
    </div>

    <div class="box">
        <img src="/photos/fun-fact-icon-2.svg" alt="">
        <div class="info">
            <h3>25</h3>
            <p>awards won</p>
        </div>
    </div>

    <div class="box">
        <img src="/photos/fun-fact-icon-3.svg" alt="">
        <div class="info">
            <h3>585</h3>
            <p>happy clients</p>
        </div>
    </div>

    <div class="box">
        <img src="/photos/fun-fact-icon-4.svg" alt="">
        <div class="info">
            <h3>35</h3>
            <p>active workers</p>
        </div>
    </div>

</section>

<!-- fun fact section ends -->

<!-- about section starts  -->

<section class="about" id="about">

    <div class="content" >
        <h3>best quality Repair services</h3>
        <p>We specialize in repairing laptops with precision and care. Whether it's hardware issues, software glitches, or maintenance needs, our expert technicians ensure your device is restored to optimal performance</p>
        <p>Trust us for fast, reliable, and professional service that exceeds your expectations!</p>
        <a href="#services" class="btn">read more</a>
    </div>

    <div class="image">
        <img src="/photos/aa.jpg" alt="">
    </div>

</section>


<section class="gallery" id="gallery">

    <h1 class="heading"  style="padding-top: 50px;padding-bottom: 20px;"> our <span>gallery</span> </h1>

    <div class="gallery-container" >

        <a class="box" href="/photos/L1.jpg"><img src="/photos/L1.jpg" alt=""></a>
        <a class="box" href="/photos/L2.jpg"><img src="/photos/L2.jpg" alt=""></a>
        <a class="box" href="/photos/L3.jpg"><img src="/photos/L3.jpg" alt=""></a>
        <a class="box" href="/photos/L4.jpg"><img src="/photos/L4.jpg" alt=""></a>
        <a class="box" href="/photos/L5.jpg"><img src="/photos/L5.jpg" alt=""></a>
        <a class="box" href="/photos/L6.jpg"><img src="/photos/L6.jpg" alt=""></a>

    </div>

</section>

<!-- gallery section ends -->

<!-- facilities section starts  -->

<section class="facilities">

    <h1 class="heading"> why <span>choose us?</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="/photos/why-choose-icon-1.svg" alt="">
            <h3>24/7 support</h3>
            <p>We offer 24/7 support to ensure your laptop is always in top condition.
                Our dedicated team is available around the clock to assist with any issues,
                providing reliable and timely solutions whenever you need them.</p>
        </div>

        <div class="box">
            <img src="/photos/why-choose-icon-2.svg" alt="">
            <h3>quality service</h3>
            <p>We provide quality service with a focus on precision and customer satisfaction.
                Our expert technicians use the latest tools and techniques to
                deliver reliable and efficient repairs, ensuring your laptop runs like new.</p>
        </div>

        <div class="box">
            <img src="/photos/why-choose-icon-3.svg" alt="">
            <h3>quick repair</h3>
            <p>Could you clarify what you mean by "Customize Toolbar"? Are you referring to a specific software
                or platform where you want to adjust or configure the toolbar?
                Let me know more details, and I can assist you further!</p>
        </div>

    </div>

</section>

<!-- facilities section ends -->

<!-- team section starts  -->

<section class="team" id="team">

    <h1 class="heading"> our expert <span>team</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="photos/ex1.jpg" alt="" style="height: 400px;">
            <div class="content">
                <h3>Adel Hassan</h3>
                <p>electronic expert</p>
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
            </div>
        </div>

        <div class="box">
            <img src="/photos/ex2.jpg" alt="" style="height: 400px">
            <div class="content">
                <h3>Ahmed Youssef</h3>
                <p>Computer expert</p>
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
            </div>
        </div>

        <div class="box">
            <img src="/photos/ex4.jpg" STYLE="height: 400px" t>
            <div class="content">
                <h3>Sara Issa</h3>
                <p>Computer expert</p>
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
            </div>
        </div>

        <div class="box">
            <img src="/photos/ex3.jpg" alt="" style="height: 400px;">
            <div class="content">
                <h3>Maya Issa</h3>
                <p>Computer expert</p>
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
            </div>
        </div>

    </div>

</section>

<!-- team section ends -->

<!-- reviews section starts  -->

<section class="reviews" id="reviews">

    <h1 class="heading"> clients <span>reviews</span> </h1>

    <div class="box-container">

        <div class="box">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <div class="text">
                <i class="fas fa-quote-right"></i>
                <p>Eco-friendly, powerful, and stylish – what more could I ask for? Knowing this company prioritizes
                    sustainability makes it even better.</p>
            </div>
            <div class="user">
                <img src="images/emili.jpg" alt="">
                <h3>Emily W</h3>
            </div>
        </div>

        <div class="box">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <div class="text">
                <i class="fas fa-quote-right"></i>
                <p>I’ve been using my laptop for over a year now.
                    The performance is incredible, and it handles all my work tasks seamlessly.
                    Highly recommended!</p>
            </div>
            <div class="user">
                <img src="/photos/pic-2.png" alt="">
                <h3>Sara H</h3>
            </div>
        </div>

        <div class="box">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <div class="text">
                <i class="fas fa-quote-right"></i>
                <p>The customizable options allowed me to choose exactly what I needed for
                    my creative projects.
                    It’s the perfect combination of power and portability!</p>
            </div>
            <div class="user">
                <img src="/photos/pic-3.png" alt="">
                <h3>Ameer D</h3>
            </div>
        </div>

    </div>

</section>

<!-- reviews section ends -->



<section class="contact" id="contact">

    <h1 class="heading"><span>contact</span> us</h1>

    <div class="row">

        <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d867266.9977728397!2d34.892076!3d31.88589545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151cf2d28866bdd9%3A0xee17a001d166f686!2sPalestine!5e0!3m2!1sen!2s!4v1700743692152!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" ></iframe>

    </div>



</section>
<!--contact section end-->

<!--footer section start-->
<?php include 'components/footer.php'; ?>






<script src="js/repair.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>