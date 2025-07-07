<?php
global $conn, $admin_id;
if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>

<header class="header">

   <section class="flex">

      <a href="../admin/dashboard.php" class="logo">Innova<span >tech</span></a>

      <nav class="navbar">
         <a href="../admin/dashboard.php">Home</a>
          <a href="../admin/admin_accounts.php">Admins</a>
          <a href="../admin/users_accounts.php">Users</a>
          <a href="../admin/products.php">Products</a>
          <a href="../admin/laptop.php">Laptops</a>
         <a href="../admin/placed_orders.php">Orders</a>
         <a href="../admin/messages.php">Messages</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
          <button id="user-btn"  class="log">login</button>

      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `admins` WHERE id = ?");
            $select_profile->execute([$admin_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>

          <script>


              let y=document.getElementById('user-btn');
              y.innerText=' ';
              y.classList.add('op');
              y.classList.remove('log')

          </script>
         <p>Welcome <?= $fetch_profile['name']; ?></p>
         <a href="../admin/update_profile.php" class="btn">update profile</a>
         <div class="flex-btn">
            <a href="../admin/register_admin.php" class="option-btn">register</a>
            <a href="../admin/admin_login.php" class="option-btn" >login</a>
         </div>
         <a href="../components/admin_logout.php" class="delete-btn" onclick="return confirm('logout from the website?');">logout</a> 
      </div>

   </section>

</header>