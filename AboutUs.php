<!DOCTYPE html>
<html lang="en">
<head>


  <link href="AboutUsStyle.css" rel="stylesheet" type="text/css" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Allerta+Stencil&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	
	
	
	
  <title>Online In-Game Purchases Store</title>
  <style>
    /* Your custom CSS styles can go here */
  </style>
</head>
<?php include 'header.php'; ?>
<body>
 
  <header>
    <h1>Welcome to <div class="logo"><a href="#home">OFFLINE POCKET<span style="font-size:30px; color:red;" class="material-symbols-outlined" >
			playing_cards</span></a></div></h1>
    <nav>
      <!-- Add navigation links here -->
    </nav>
  </header>

  <!-- Main Content -->
  <main id="all">
    <section>
      <h2>Our Mission</h2>
      <p>
        Our mission is to empower gamers worldwide by offering a one-stop-shop
        for all their in-game needs. We believe that gaming should be an immersive
        and enjoyable experience, and our store is dedicated to making that vision a reality.
        With a focus on customer satisfaction, security, and user-friendly interfaces,
        we are committed to being the go-to destination for in-game purchases.
      </p>
    </section>

    <section>
      <h2>Why Choose Us</h2>
      <ul>
	    
        <li> <h2>Extensive Collection</h2> We curate an extensive collection of in-game items, currencies, skins, boosters, and more across various popular gaming titles. From MMORPGs to FPS games, you'll find everything you need to enhance your gameplay.</li>
        <li> <h2>Secure Transactions</h2> Your security is our top priority. We use the latest encryption and security measures to ensure that your personal information and payment details are always protected.</li>
        <li> <h2>Instant Delivery</h2> Say goodbye to long waiting times. With our automated delivery system, you'll receive your purchased items and currency instantly, getting you back into the game without any delay.</li>
        <li> <h2>Competitive Pricing</h2> We understand the importance of getting the best value for your money. Our competitive pricing ensures you get the most out of your purchases.</li>
        <li> <h2>Developer Support </h2> We work closely with game developers to ensure that our offerings comply with their guidelines. By doing so, we contribute to the sustainable growth of the gaming industry.</li>
      </ul>
    </section>
	
	  <section>
      <h2>Our Teams</h2>
      <p>
      Welcome to Offline Pocket, a platform for buying gaming credits online. We are a group of passionate programmers enrolled in the fourth year of the UiTM Kuala Terengganu diploma, and we are dedicated to building an easy-to-use platform for gamers to replenish their in-game credits. With a large range of popular games available on our easy-to-use website, users can quickly and safely top off their virtual wallets and resume their gaming journeys. We want to be the go-to place for all of your gaming needs by putting a strong emphasis on convenience and customer satisfaction.
	  Offline Pocket values your gaming experience and works hard to give you the best support. To make your gaming experience even more enjoyable, our staff is constantly working to improve our platform and add new features. Please get in touch with us if you have any inquiries, comments, or recommendations. We appreciate that you chose Offline Pocket for your gaming requirements, and we hope to work with you again in the future. Have fun playing!
      </p>
    </section>
	
		<section>
		
		<div class="gambar">
		
		 <img class="profile" src="pocketImage/profile/amir.jpg.png" alt="Neon Sign">
		  <img class="profile" src="pocketImage/profile/hadzry.jpg.png" alt="Neon Sign">
		   <img class="profile" src="pocketImage/profile/wan.jpg.png" alt="Neon Sign">
		    <img class="profile" src="pocketImage/profile/icap.jpg.png" alt="Neon Sign">
			 <img class="profile" src="pocketImage/profile/ziqo.jpg.png" alt="Neon Sign">
		
		
		
		
		
		
		
		</div>
		
		
		
		
		</section>
  </main>

  <!-- Footer -->
  <footer>
    <p>&copy; 2023 Offline Pocket Store. All rights reserved. </p><br>
	  <p>&copy;Contact Us at: offlinepocket@gmail.com   03-33445566</p>
    <!-- Add contact information and social media links here -->
  </footer>
  <script>
  	// Side Navigation
		function openNav() {
			document.getElementById("mySidenav").style.width = "250px";
			document.getElementById("all").style.opacity = "0.3";
			document.body.classList.add("sidenav-open");
			
		}

		function closeNav() {
			document.getElementById("mySidenav").style.width = "0";
			document.getElementById("all").style.opacity = "1";
			document.body.classList.remove("sidenav-open");
			
		}
		
		// Login & Register
		const wrapper = document.querySelector('.wrapper');
		const loginLink = document.querySelector('.login-link');
		const registerLink = document.querySelector('.register-link');
		const btnPopup = document.querySelector('.btnLogin-popup');
		const iconClose = document.querySelector('.icon-close');
		const btnLogin = document.getElementById('login');
		const btnLogout = document.getElementById('logout');

		registerLink.addEventListener('click', () => { wrapper.classList.add('active'); });
		loginLink.addEventListener('click', () => { wrapper.classList.remove('active'); });
		btnPopup.addEventListener('click', () => {
			wrapper.classList.add('active-popup');
			document.getElementById("myForm").style.display = "flex";
			document.getElementById("all").style.opacity = "0.1";
		});
		iconClose.addEventListener('click', () => {
			wrapper.classList.remove('active-popup');
			document.getElementById("myForm").style.display = "none";
			document.getElementById("all").style.opacity = "1";
		});
  
  
  </script>
  
  
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  
  
  
  
  
</body>
</html>
