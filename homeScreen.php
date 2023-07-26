<!DOCTYPE html>


<html>
<head>
	<title>Offline Pocket | Online Game Top up Website</title>  
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="stylePocket.css" rel="stylesheet" type="text/css" />
	<link href="loginStyle.css" rel="stylesheet" type="text/css" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Allerta+Stencil&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
		<?php include 'header.php'; ?>
		<div class="middle-content" id="all">
			<div class="left-part">
				<div class="left-part-stick" >
					<div class="stay">
						<div class="adv-section">
							<div class="image-slideshow">
								<div class="stay">
	<div class="adv-section">
		<div class="image-slideshow">
      <div class="image fade">
      <img class="banner" src="pocketImage/banner/GenshinBanner.jpg" alt="Mountain Top">
      </div>        
      <div class="image fade">
      <img class="banner" src="pocketImage/banner/PubgBanner.jpg" alt="Palm Trees">
      </div>        
      <div class="image fade">
      <img class="banner" src="pocketImage/banner/MobileBanner.jpg" alt="Neon Sign">
      </div>
	   <div class="image fade">
      <img class="banner" src="pocketImage/banner/valorantBanner.jpg" alt="Neon Sign">
      </div>
	   <div class="image fade">
      <img class="banner" src="pocketImage/banner/lolBanner.jpg" alt="Neon Sign">
      </div>
	   <div class="image fade">
      <img class="banner" src="pocketImage/banner/gtaBanner.jpg" alt="Neon Sign">
      </div>
	   <div class="image fade">
      <img class="banner" src="pocketImage/banner/apexBanner.jpg" alt="Neon Sign">
      </div>
	  <div class="image fade">
      <img class="banner" src="pocketImage/banner/asphaltBanner.jpg" alt="Neon Sign">
      </div>
	  <div class="image fade">
      <img class="banner" src="pocketImage/banner/starRailBanner.jpg" alt="Neon Sign">
      </div>
	  <div class="image fade">
      <img class="banner" src="pocketImage/banner/honkaiBanner.jpg" alt="Neon Sign">
      </div>
	  <div class="image fade">
      <img class="banner" src="pocketImage/banner/forzaBanner.jpg" alt="Neon Sign">
      </div>
	  <div class="image fade">
      <img class="banner" src="pocketImage/banner/minecraftBanner.jpg" alt="Neon Sign">
      </div>
	  <div class="image fade">
      <img class="banner" src="pocketImage/banner/dotaBanner.jpg" alt="Neon Sign">
      </div>
    </div>	
	</div>
	</div>
								<!-- Add other banner images here -->
							</div>
						</div>
					</div>
					<br>
					<div class="counter-section">
						<div class="counter-box">
							<ul>
								<li><a class="btnAll"><ion-icon name="logo-buffer"></ion-icon>       ALL</a></li>
								<li><a class="btnMobile"><ion-icon name="phone-portrait"></ion-icon>       MOBILE</a></li>
								<li><a class="btnPc"><ion-icon name="desktop"></ion-icon>       PC</a></li>
								<li><a  class="btnConsole"><ion-icon name="game-controller"></ion-icon>       CONSOLE</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="right-part">
			
			<div class="iklan">
			<div class="image-slideshow">
			<div class="image2 fade">
      <img class="banner" src="pocketImage/banner2/apexBanner2.jpg" alt="Neon Sign">
      </div>
        
      <div class="image2 fade">
      <img class="banner" src="pocketImage/banner2/fifaBanner2.jpg" alt="Palm Trees">
      </div>        
      <div class="image2 fade">
      <img class="banner" src="pocketImage/banner2/fortniteBanner2.jpg" alt="Neon Sign">
      </div>
	   <div class="image2 fade">
      <img class="banner" src="pocketImage/banner2/nintendoBanner2.jpg" alt="Neon Sign">
      </div>
	  
	   <div class="image2 fade">
      <img class="banner" src="pocketImage/banner2/xboxBanner2.jpg" alt="Neon Sign">
      </div>
	   <div class="image2 fade">
      <img class="banner" src="pocketImage/banner2/starRailBanner2.jpg" alt="Neon Sign">
      </div>
	   <div class="image2 fade">
      <img class="banner" src="pocketImage/banner2/valoBanner2.jpg" alt="Mountain Top">
      </div>     
	
	  
    </div>	
			</div>
			
			
			
			
			<div class="iklan2">
			
			
			
			<?php include 'popular.php'; ?>
			
		
			
			</div>
			
			
			
				<?php include 'product2.php'; ?>
			</div>
		</div>
	
	
		
		
		<?php include 'footer.php'; ?>
		
		
	
	
	<script>
		// Side Navigation
		function openNav() {
			document.getElementById("mySidenav").style.width = "300px";
			document.getElementById("all").style.opacity = "0.3";
			document.body.classList.add("sidenav-open");
			
		}

		function closeNav() {
			document.getElementById("mySidenav").style.width = "0";
			document.getElementById("all").style.opacity = "1";
			document.body.classList.remove("sidenav-open");
			
		}

		// Slide Banner 1
		let index = 0;
		displayImages();

		function displayImages() {
			let images = document.getElementsByClassName("image");
			for (let i = 0; i < images.length; i++) {
				images[i].style.display = "none";
			}
			index++;
			if (index > images.length) {
				index = 1;
			}
			images[index - 1].style.display = "block";
			setTimeout(displayImages, 4000);
		}
		
			// Slide Banner 1
		let index2 = 0;
		displayImages2();

		function displayImages2() {
			let images2 = document.getElementsByClassName("image2");
			for (let i = 0; i < images2.length; i++) {
				images2[i].style.display = "none";
			}
			index2++;
			if (index2 > images2.length) {
				index2= 1;
			}
			images2[index2 - 1].style.display = "block";
			setTimeout(displayImages2, 3000);
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

		// Check user authentication status and toggle visibility of login/logout buttons
		// Modify the condition based on your authentication logic
		

		

		
		
		
		// Function to scroll to the middle section
  function scrollToMiddleSection1() {
    const middleSection = document.getElementById('all-section');

    // Scroll smoothly to the middle section
    middleSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
  }
  
  function scrollToMiddleSection2() {
    const middleSection = document.getElementById('mobile-section');

    // Scroll smoothly to the middle section
    middleSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
  }
  
  function scrollToMiddleSection3() {
    const middleSection = document.getElementById('pc-section');

    // Scroll smoothly to the middle section
    middleSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
  }
  
  function scrollToMiddleSection4() {
    const middleSection = document.getElementById('console-section');

    // Scroll smoothly to the middle section
    middleSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
  }
		
		

	</script>

	

	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>
