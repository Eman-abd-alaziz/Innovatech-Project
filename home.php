<?php

global $conn;
include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/wishlist_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">
<style>
    .heading {
        text-align: center;
        position: relative;
        margin: 20px 0;
    }

    .heading .line {
        display: inline-block;
        position: relative;
        padding: 0 20px;
        font-size: 2.5rem;
        color: var(--black);
        z-index: 1;
    }

    .heading .line::before,
    .heading .line::after {
        content: "";
        position: absolute;
        top: 50%;
        width: 100vw; /* جعل الخط يمتد بعرض الصفحة */
        height: 2px;
        background-color: var(--main-color);
        transform: translateY(-50%);
        z-index: -1;
    }

    .heading .line::before {
        left: -100vw; /* يبدأ الخط من أقصى اليسار */
    }

    .heading .line::after {
        right: -100vw; /* ينتهي الخط إلى أقصى اليمين */
    }

    .reviews .reviews-slider .box {
        padding: 2rem;
        margin: 2rem 0;
        text-align: center;
        border: 2px solid var(--main-color); /* إضافة إطار حول كل مربع */
        border-radius: 10px; /* حواف دائرية */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* تأثير الظل */
        transition: all 0.3s ease; /* تحسين التحولات */
    }

    .reviews .reviews-slider .box:hover {
        transform: scale(1.05); /* تكبير المربع قليلاً عند المرور */
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2); /* تحسين الظل عند المرور */
    }

    .reviews .reviews-slider {
        padding-bottom: 3rem;
    }

    .reviews .reviews-slider .box {
        padding: 2rem;
        margin: 2rem 0;
        text-align: center;
        opacity: .4;
        transform: scale(.9);
        transition: 0.3s;
    }

    .reviews .reviews-slider .swiper-slide-active {
        opacity: 1;
        transform: scale(1);
        box-shadow: var(--box-shadow);
        border: var(--border);
    }

    .reviews .reviews-slider .box img {
        height: 7rem;
        width: 7rem;
        border-radius: 50%;
        margin-bottom: 1rem;
    }

    .reviews .reviews-slider .box .content p {
        font-size: 1.5rem;
        color: var(--light-color);
        padding: 1rem 0;
    }

    .reviews .reviews-slider .box .content h3 {
        font-size: 2.2rem;
        color: var(--black);
        padding-bottom: .5rem;
    }

    .reviews .reviews-slider .box .content .stars i {
        font-size: 1.7rem;
        color: var(--main-color);
    }
    .swiper-slide {
        transition: transform 0.5s ease, opacity 0.5s ease;
    }
    /* تنسيق العنوان */
    .heading {
        text-align: center;
        font-size: 4rem; /* زيادة حجم الخط بمقدار 3 أضعاف */
        margin-bottom: 2rem;
    }


    /* تنسيق الـ container */
    .container {
        display: flex;
        justify-content: center;
        gap: 30px; /* المسافة بين الـ div */
        flex-wrap: wrap;
    }

    /* تنسيق كل div داخل الـ container */
    .box {
        text-align: center;
        width: 45%; /* عرض الـ div لكل عنصر */
        margin: 0;
    }

    /* تنسيق النص داخل كل box */
    .box p {
        font-size: 2rem; /* تقليل حجم الخط ليكون أصغر */
        color: #333;
        margin-bottom: 10px; /* تقليل المسافة بين النص والصورة */
    }

    /* تنسيق الصورة داخل كل box */
    .box img {
        width: 250px; /* تحديد عرض الصورة بـ 100 بكسل */
        height: 250px; /* تحديد ارتفاع الصورة بـ 100 بكسل */
        border-radius: 8px;
    }

    /* عند تحجيم الشاشة */
    @media (max-width: 768px) {
        .container {
            flex-direction: column; /* ترتيب الـ divs عموديًا عند الشاشة الصغيرة */
        }

        .box {
            width: 90%; /* زيادة العرض عند الشاشات الصغيرة */
            margin-bottom: 20px; /* إضافة مسافة بين الـ divs */
        }
    }


    /*.madeBy{*/
    /*    width: 100vw;*/
    /*    height: 100px;*/
    /*    margin-top: 20px;*/
    /*    margin-bottom: 10px;*/
    /*    !*background-color: white;*!*/
    /*    !*text-align: center;*!*/

    /*}*/
    .madeBy {
        width: 100%; /* تأكد من أن العرض يغطي المساحة بالكامل */
        height: 100px;
        margin: 0 auto; /* لتوسيط العنصر أفقيًا */
        display: flex;
        justify-content: center; /* لتوسيط المحتوى أفقيًا */
        align-items: center; /* لتوسيط المحتوى عموديًا */
        text-align: center; /* لتوسيط النص داخل العنصر */
    }



    .image-grid {
        width: auto;
        display: flex;
        flex-wrap: wrap;
        gap: 3px;
        /*background-color: white;*/
        justify-content: flex-start;
        align-items: flex-start;
        height: auto;
        padding-top: 40px;
        padding-bottom: 40px;



    }

    .image-item {
        width: calc(16.66% - 3px);
        text-align: center;

    }

    .image-item img {
        width: calc(100% - 6px);
        height: 270px;
        object-fit: cover;
        border-radius: 5px;

    }


    .image-item img:hover{
        transform: scale(1.04);
    }
</style>
</head>
<body>

<?php include 'components/user_header.php'; ?>

<div class="home-bg">

<section class="home">

   <div class="swiper home-slider">

   <div class="swiper-wrapper">

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/bb.png" alt="">
         </div>
         <div class="content">
             <span>upto 20% off</span>
             <h3>latest Laptop</h3>
<!--            <a href="shop.php" class="btn">shop now</a>-->
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/aa.png" alt="">
         </div>
         <div class="content">
            <span>upto 20% off</span>
            <h3>latest Laptop</h3>
<!--            <a href="shop.php" class="btn">shop now</a>-->
         </div>
      </div>

      <div class="swiper-slide slide">
         <div class="image">
            <img src="images/cc.png" alt="">
         </div>
         <div class="content">
            <span>upto 50% off</span>
            <h3>latest headsets</h3>
<!--            <a href="shop.php" class="btn">shop now</a>-->
         </div>
      </div>

   </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

</div>
<br><br><br>



<section class="reviews" id="reviews">
    <h1 class="heading"><span class="line">client's review</span></h1>

    <div class="swiper reviews-slider">
        <div class="swiper-wrapper">

            <!-- مراجعة العميل الأول -->
            <div class="swiper-slide box">
                <img src="/photos/male.png" alt="">
                <div class="content">
                    <p>Our clients rave about the seamless online experience when shopping for car Laptops on our website</p>
                    <h3>William Roberts</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>

            <!-- مراجعة العميل الثاني -->
            <div class="swiper-slide box">
                <img src="/photos/female.png" alt="">
                <div class="content">
                    <p>Customer reviews consistently highlight the user-friendly interface, making it easy to find and purchase the perfect laptop upgrades.</p>
                    <h3>Isabella Brown</h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>

            <!-- مراجعة العميل الثالث -->
            <div class="swiper-slide box">
                <img src="/photos/male.png" alt="">
                <div class="content">
                    <p>Positive feedback underscores the extensive range of high-quality Laptops, catering to diverse tastes and laptop types</p>
                    <h3>Daniel Adams</h3>
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
    </div>
</section>
<br><br><br>





<section class="home-products">
    <h1 class="heading"><span class="line">latest products</span></h1>
    <br><br><br>

    <div class="swiper products-slider">
        <div class="swiper-wrapper">

   <?php
     $select_products =  $conn->prepare("SELECT * FROM `products` LIMIT 6");
     $select_products->execute();
     if($select_products->rowCount() > 0){
      while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
   ?>
          <form action="" method="post" class="swiper-slide slide">
              <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
              <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
              <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
              <input type="hidden" name="image" value="./uploaded_img/<?= $fetch_product['image_01']; ?>">
              <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
              <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a>
              <img src="./uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
              <div class="name"><?= $fetch_product['name']; ?></div>
              <div class="flex">
                  <div class="price"><span>$</span><?= $fetch_product['price']; ?><span>/-</span></div>
                  <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
              </div>
              <input type="submit" value="add to cart" class="btn" name="add_to_cart">
          </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?>

   </div>


       <div class="madeBy" >
<!--           <h2 style="font-family: 'Trebuchet MS', sans-serif; text-align: center; color: #334247;">-->
<!--               INNOVATECH By Samya &amp; Eman-->
<!--           </h2>-->
           <br><br><br>
           <br><br><br>
           <p style="font-family: Arial, sans-serif; font-size: 15px; color: #333; line-height: 1.6; ">
               <em>Engineered with passion, driven by innovation, and crafted for those who demand the best.</em><br>
               <em>~ Because your tech journey deserves excellence in every detail. 💻⚡</em>
           </p>

<!--           <p style="color:#334247; font-family: 'Trebuchet MS', sans-serif; text-align: center; margin-top: 20px; font-size: 20px;">@innovatech</p>-->

       </div>

<!--       <div class="toShow">-->
<!--           <p style="color:#334247; font-family: 'Trebuchet MS', sans-serif; text-align: center; margin-top: 20px; font-size: 20px;">@innovatech</p>-->
<!--       </div>-->


       <div class="image-grid">
           <div class="image-item"><img src="/photos/lap1.png" alt="Image 1"></div>
           <div class="image-item"><img src="/photos/m1.jpg" alt="Image 2"></div>
           <div class="image-item"><img src="/photos/m2.jpg" alt="Image 3"></div>
           <div class="image-item"><img src="http://localhost/innovatech/images/Blap2.jpeg" alt="Image 4"></div>
           <div class="image-item"><img src="/photos/m3.jpg" alt="Image 5"></div>
           <div class="image-item"><img src="/photos/m4.jpg" alt="Image 6"></div>
           <div class="image-item"><img src="/photos/m5.jpg" alt="Image 7"></div>
           <div class="image-item"><img src="/photos/m6.jpg" alt="Image 8"></div>
           <div class="image-item"><img src="http://localhost/innovatech/images/Blap.jpg" alt="Image 9"></div>
           <div class="image-item"><img src="/photos/m7.jpg" alt="Image 10"></div>
           <div class="image-item"><img src="http://localhost/innovatech/images/LAP.jpg" alt="Image 11"></div>
           <div class="image-item"><img src="http://localhost/innovatech/images/keyboard 2.jpg" alt="Image 12"></div>
           <div class="image-item"><img src="http://localhost/innovatech/images/imag.jpg" alt="Image 13"></div>
           <div class="image-item"><img src="http://localhost/innovatech/images/keyboard3.jpg" alt="Image 14"></div>
           <div class="image-item"><img src="http://localhost/innovatech/images/Blap3.jpg" alt="Image 15"></div>
           <div class="image-item"><img src="/photos/m8.jpg" alt="Image 16"></div>
           <div class="image-item"><img src="/photos/m9.jpg" alt="Image 17"></div>
           <div class="image-item"><img src="/photos/m10.jpg" alt="Image 18"></div>
       </div>

<!--       <div style="width: 100vw;height: 50px;background:white"> </div>-->



   </div>

   <div class="swiper-pagination"></div>


</section>









<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".home-slider", {
  loop:true,
  spaceBetween: 20,
  pagination: {
     el: ".swiper-pagination",
     clickable:true,
   },
});

var swiper = new Swiper(".category-slider", {
  loop:true,
  spaceBetween: 20,
  pagination: {
     el: ".swiper-pagination",
     clickable:true,
  },
  breakpoints: {
     0: {
        slidesPerView: 2,
      },
     650: {
       slidesPerView: 3,
     },
     768: {
       slidesPerView: 4,
     },
     1024: {
       slidesPerView: 5,
     },
  },
});

var swiper = new Swiper(".products-slider", {
  loop:true,
  spaceBetween: 20,
  pagination: {
     el: ".swiper-pagination",
     clickable:true,
  },
  breakpoints: {
     550: {
       slidesPerView: 2,
     },
     768: {
       slidesPerView: 2,
     },
     1024: {
       slidesPerView: 3,
     },
  },
});

</script>

</body>
</html>