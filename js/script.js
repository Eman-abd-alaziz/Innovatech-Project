let navbar = document.querySelector('.header .flex .navbar');
let profile = document.querySelector('.header .flex .profile');

document.querySelector('#menu-btn').onclick = () =>{
   navbar.classList.toggle('active');
   profile.classList.remove('active');
}

document.querySelector('#user-btn').onclick = () =>{
   profile.classList.toggle('active');
   navbar.classList.remove('active');
}

window.onscroll = () =>{
   navbar.classList.remove('active');
   profile.classList.remove('active');
}

let mainImage = document.querySelector('.quick-view .box .row .image-container .main-image img');
let subImages = document.querySelectorAll('.quick-view .box .row .image-container .sub-image img');

subImages.forEach(images =>{
   images.onclick = () =>{
      src = images.getAttribute('src');
      mainImage.src = src;
   }
});
var swiper = new Swiper(".reviews-slider", {
   loop: true, // لجعل العرض التمريري دائريًا
   spaceBetween: 20, // المسافة بين العناصر
   pagination: {
      el: ".swiper-pagination",
      clickable: true,
   },
   autoplay: { // خاصية التحرك التلقائي
      delay: 3000, // مدة التأخير بين كل حركة (بالميلي ثانية)
      disableOnInteraction: false, // الاستمرار في التحرك التلقائي بعد تفاعل المستخدم
   },
   breakpoints: {
      0: {
         slidesPerView: 1,
      },
      768: {
         slidesPerView: 2,
      },
      1024: {
         slidesPerView: 3,
      },
   },
});





