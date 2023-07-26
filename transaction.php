<!DOCTYPE html>
<html>
<head>
    <title>TRANSACTION PAGE | Offline Pocket</title>
    <link href="transactionStyle.css" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Allerta+Stencil&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>
<body>
<div id="mySidenav" class="sidenav">
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	<a href="#">Profile</a>
	<a href="#">Reload</a>
	<a href="#">Transaction History</a>
	<a href="#">Notification</a>
</div>

<div class="kotak">
	<?php include 'login.php'; ?>
</div>

<div class="all">
    <nav class="navs">
        <span style="font-size:30px; color:red; padding-left:20px; cursor:pointer" onclick="openNav()">&#9776;</span>
        <div class="logo"><a href="#home">OFFLINE POCKET<span style="font-size:30px; color:red;" class="material-symbols-outlined">playing_cards</span></a></div>
        <div class="moto">"Upgrade Your Game, Upgrade Your Wallet."</div>
    </nav>
    <section class="transaction">
        <h1 style="text-align: center; color: white;"></h1>
        <div style="text-align: center;">
            <img src="pocketImage/mobile/logoml.png" style="width: 50%; max-width: 300px;">
            <br><br>
            <form action="" method="">
                <div class="id-group">
                    <legend style="text-align: center; color: white;"><b><h3>Enter User ID</h3></b></legend><br>
                    <input style="text-align: center;" type="text" id="userId" name="userId" required placeholder="User ID">
                </div>
                <br><br>
                <div class="diamond-options">
                    <legend style="text-align: center; color: white;"><b><h3>Choose Your Diamond Amount</h3></b></legend>
                    <br>
                    <ul class="diamond-list" style="list-style:none;">
                        <li class="diamond-option" data-amount="100">
                            <a href="#" class="option1" onclick="selectDiamond(100)">
                                <img src="pocketImage/icon/diamond.jpg" alt="Diamond Icon" style="width: 50px; height: 50px; background-color: #ffffff; border-radius: 50%; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                                <h3 style="color:white;">100 Diamonds</h3>
                                <p style="color:white;">Price: RM8.99</p>
                            </a>
                        </li>
                        <br>
                        <li class="diamond-option" data-amount="300">
                            <a href="#" class="option2" onclick="selectDiamond(300)">
                                <img src="pocketImage/icon/diamond.jpg" alt="Diamond Icon" style="width: 50px; height: 50px; background-color: #ffffff; border-radius: 50%; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); transition: transform 0.3s;">
                                <h3 style="color:white;">300 Diamonds</h3>
                                <p style="color:white;">Price: RM18.99</p>
                            </a>
                        </li>
                        <br>
                        <li class="diamond-option" data-amount="500">
                            <a href="#" class="option3" onclick="selectDiamond(500)">
                                <img src="pocketImage/icon/diamond.jpg" alt="Diamond Icon" style="width: 50px; height: 50px; background-color: #ffffff; border-radius: 50%; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); transition: transform 0.3s;">
                                <h3 style="color:white;">500 Diamonds</h3>
                                <p style="color:white;">Price: RM24.99</p>
                            </a>
                        </li>
                        <br>
                        <li class="diamond-option" data-amount="1000">
                            <a href="#" class="option4" onclick="selectDiamond(1000)">
                                <img src="pocketImage/icon/diamond.jpg" alt="Diamond Icon" style="width: 50px; height: 50px; background-color: #ffffff; border-radius: 50%; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); transition: transform 0.3s;">
                                <h3 style="color:white;">1000 Diamonds</h3>
                                <p style="color:white;">Price: RM32.99</p>
                            </a>
                        </li>
                        <br>
                        <li class="diamond-option" data-amount="2000">
                            <a href="#" class="option5" onclick="selectDiamond(2000)">
                                <img src="pocketImage/icon/diamond.jpg" alt="Diamond Icon" style="width: 50px; height: 50px; background-color: #ffffff; border-radius: 50%; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); transition: transform 0.3s;">
                                <h3 style="color:white;">2000 Diamonds</h3>
                                <p style="color:white;">Price: RM51.99</p>
                            </a>
                        </li>
                        <br>
                    </ul>
                </div>
                <br><br>
                <b><h3 style="color: white">Choose Your Payment Method</h3></b>
                <div class="payment-options">
                    <legend style="text-align: center;color:white;"></legend><br>
                    <div class="bank">
                        <button class="payment-option" data-option="1" onclick="selectPayment(1)">
                            <img src="pocketImage/mobile/fpx.png" alt="Payment Icon" style="width: 100px; height: 100px; background-color: #ffffff; border-radius: 50%; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); transition: transform 0.3s;">
                        </button>
                    </div>
                    <div>
                        <button class="payment-option" data-option="2" onclick="selectPayment(2)">
                            <img src="pocketImage/icon/molpay.jpg" alt="Payment Icon" style="width: 100px; height: 100px; background-color: #ffffff; border-radius: 50%; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); transition: transform 0.3s;">
                        </button>
                    </div>
                    <div>
                        <button class="payment-option" data-option="3" onclick="selectPayment(3)">
                            <img src="pocketImage/icon/razer.jpg" alt="Payment Icon" style="width: 100px; height: 100px; background-color: #ffffff; border-radius: 50%; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); transition: transform 0.3s;">
                        </button>
                    </div>
                    <div>
                        <button class="payment-option" data-option="4" onclick="selectPayment(4)">
                            <img src="pocketImage/icon/wallet.png" alt="Payment Icon" style="width: 100px; height: 100px; background-color: #ffffff; border-radius: 50%; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); transition: transform 0.3s; object-fit: cover;">
                        </button>
                    </div>
                </div>
                <br>
                <div id="bankSelection" style="display: none;">
                    <label for="bank" style="color:white;">Choose a Bank:</label>
                    <select id="bank" style="font-size: 14px;">
                        <option value="bank1">Please choose your bank</option>
                        <option value="bank2">Bank Islam</option>
                        <option value="bank3">CIMB Bank</option>
                        <option value="bank4">MayBank</option>
                        <option value="bank5">RHB Bank</option>
                    </select>
                    <button onclick="confirmBankSelection()" style="font-weight: bold; font-size: 14px;">Confirm</button>
                </div>
                <br><br>
                <div class="form-group">
                    <legend style="text-align: center;color:white;"><b><h3>Ready to Buy?</h3></b></legend><br>
                    <h6 style="color: white;">*OPTIONAL : Enter your email address if you want to receive the payment receipt</h6>
                    <br>
                    <input type="email" id="email" name="email" placeholder="E-mail Address" style="width: 300px; height:22px; text-align: center;">
                </div>
                <br><br>
                <button type="submit" class="buy-now-button" style="width: 200px; height: 40px; font-weight: bold;">Buy Now</button>
            </form>
        </div>
    </section>
</div>

<div class="long-text">
    <img src="pocketImage/mobile/ml.jpg" alt="Game Image" style="width: 60%; height: 40%; display: block; margin: 0 auto; border: 2px solid white;">
	<br>
    <p>
        <b>Mobile Legends: Bang Bang is a mobile multiplayer online battle arena (MOBA) game developed and published by Moonton, a subsidiary of ByteDance. Released in 2016, the game grew in popularity; most prominently in Southeast Asia.At its core, 
        the game pits 2 teams of 5 against each other in real time with at least 10-second matchmaking and 10-minute matches. Featuring traditional battle arena gameplay, players must fight over three lanes to take the enemy's tower and defend their own.
        Like classic MOBAs, there is no hero training to level up or pay to play angle,winners and losers are decided based on skill, ability, and strategy.</b>
    </p>
</div>



<footer>
    <p style="color: white;">&copy; 2023 Offline Pocket. All rights reserved.</p>
</footer>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
        document.body.classList.add("sidenav-open");
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
        document.body.style.backgroundColor = "#2D4263";
        document.body.classList.remove("sidenav-open");
    }

    function selectPayment(paymentOption) {
        var selectedOption = document.querySelector('.payment-option[data-option="' + paymentOption + '"]');
        selectedOption.classList.add('highlighted');

        // Show the bank selection for the first button only
        if (paymentOption === 1) {
            document.getElementById('bankSelection').style.display = 'block';
        } else {
            document.getElementById('bankSelection').style.display = 'none';
        }

        var paymentOptions = document.querySelectorAll('.payment-option');
        paymentOptions.forEach(function(option) {
            if (option !== selectedOption) {
                option.classList.remove('highlighted');
            }
        });

        alert('Selected payment option: ' + paymentOption);
    }

    function confirmBankSelection() {
        var bank = document.getElementById('bank').value;
        alert('Selected bank: ' + bank);
    }

    function selectDiamond(amount) {
        // Remove the highlight from all diamond options
        var diamondOptions = document.querySelectorAll('.diamond-option');
        diamondOptions.forEach(function(option) {
            option.classList.remove('highlighted');
        });

        // Highlight the selected diamond option
        var selectedOption = document.querySelector('.diamond-option[data-amount="' + amount + '"]');
        selectedOption.classList.add('highlighted');

        // Show the notification for the selected diamond
        var notification = document.getElementById('diamondNotification');
        notification.textContent = 'Selected diamond amount: ' + amount;

        // Show the notification of the selection diamond
        notification.style.display = 'block';

        // Store the selected input
        document.getElementById('selectedAmount').value = amount;

        alert('Selected diamond amount: ' + amount);
    }
</script>

</body>
</html>
