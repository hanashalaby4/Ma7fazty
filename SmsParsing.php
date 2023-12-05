<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
    <title>SMS Expense Input</title>
    <style>
        .dropbtn {
            background-color: #fff;
            color: #333;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            width: 100%;
            box-sizing: border-box; /* Ensure padding and border are included in the width */
            cursor: pointer;
        }

        .dropdown:hover .dropbtn {
            background-color: #f1f1f1;
            color: #333;
            border: 1px solid #aaa;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            max-height: 150px;
            overflow-y: auto;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: #333;
            padding: 12px 16px;
            text-decoration: none;
            display: flex; /* Make the content inside the anchor tag flex */
            align-items: center; /* Align content vertically in the center */
            white-space: nowrap;
        }

        .dropdown-content a img {
            margin-right: 10px; /* Add margin to the right of the image for spacing */
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #2C3338;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #fff;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }
        img[src$="340.png"]:hover {
            transform: scale(1.3);
            transition: transform 0.3s;
        }
        img[src$="Palestine.jpg"]:hover {
            transform: scale(1.3);
            transition: transform 0.3s;
        }
        /* ... Other styles remain unchanged ... */
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
</head>
<body>
    <div class="container">
        <h1>SMS Expense Automator</h1>
        <a href="main.php">
            <img style="position: absolute; left: 10px; top: 10px; width: 100px; height: 50px;" src="340.png" alt="Corner Image">
        </a>
        <div class="form-button-container" style="display: flex; align-items: center;">
            <div class="container">
                <h3>Add automatic expense</h3>
                <form id="form">
                    <div class="form control">
                        <label for="text">Phone Number:</label>
                        <input id="phone" type="tel" name="phone"/>
                        <br></br> 
                        <div class="dropdown">
                            <button class="dropbtn">Choose Bank</button><br>
                            <div class="dropdown-content">
                                <a href="#">
                                    <img src="NBE.png" width="20" height="20"> National Bank of Egypt
                                </a>
                                <a href="#">
                                    <img src="Banque_misr.jpg" width="20" height="20"> Banque Misr
                                </a>
                                <a href="#">
                                    <img src="CIB.png" width="35" height="20"> Commercial International Bank (CIB)
                                </a>
                                <a href="#">
                                    <img src="BDC.png" width="35" height="20"> Banque du Caire
                                </a>
                                <a href="#">
                                    <img src="aaib.jpg" width="20" height="20"> Arab African International Bank (AAIB)
                                </a>
                                <a href="#">
                                    <img src="Alexandria-bank.png" width="20" height="20"> Alexandria Bank
                                </a>
                                <a href="#">
                                    <img src="QNB-logo.png" width="35" height="20"> QNB Alahli (formerly NSGB)
                                </a>
                                <a href="#">
                                    <img src="FIBE.png" width="35" height="20"> Faisal Islamic Bank of Egypt
                                </a>
                                <a href="#">
                                    <img src="banque-misr-liban.jpg" width="35" height="20"> Banque Misr Liban
                                </a>
                                <a href="#">
                                    <img src="Crédit_Agricole.png" width="35" height="20"> Credit Agricole Egypt
                                </a>
                                <a href="#">
                                    <img src="aub.png" width="35" height="20"> Ahli United Bank Egypt
                                </a>
                                <a href="#">
                                    <img src="suez.png" width="35" height="20"> Suez Canal Bank
                                </a>
                                <a href="#">
                                    <img src="BCP Bank.png" width="35" height="20"> Banque du Caire et de Paris (BCP)
                                </a>
                                <a href="#">
                                    <img src="egbank.png" width="35" height="20"> Egyptian Gulf Bank
                                </a>
                                <a href="#">
                                    <img src="EBE Bank.png" width="35" height="20"> Export Development Bank of Egypt
                                </a>
                                <a href="#">
                                    <img src="HSBC.png" width="20" height="20"> HSBC Egypt
                                </a>
                                <!-- ... Other bank options remain unchanged ... -->
                                <a href="#" id="otherOption">Other</a>
                                <div id="otherBankInput" style="display: none;">
                                    <label for="otherBank">Enter Bank Name:</label>
                                    <input type="text" id="otherBank" name="otherBank" />
                                </div>
                            </div>
                        </div>
                        <br>
                        <input type="checkbox" id="agree" name="TandC" value="agree">
                        <label for="TandC">I agree to the terms and conditions</label>
                        <br><br>
                        <input type="submit" class="btn btn-bigger" value="Parse SMS">
                    </div>
                </form>
            </div>  
        </div>
    </div>
    <img style="position: absolute; right: 10px; top: 10px; width: 100px; height: 50px;" src="Palestine.jpg" alt="Corner Image">
<script> 
const phoneInputField = document.querySelector("#phone");
   const phoneInput = window.intlTelInput(phoneInputField, {
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   });

   const info = document.querySelector(".alert-info");
    const error = document.querySelector(".alert-error");

    document.addEventListener("DOMContentLoaded", function () {
    const phoneInputField = document.querySelector("#phone");
    const dropdownButton = document.querySelector(".dropbtn");
    const dropdownContent = document.querySelector(".dropdown-content");
    const otherOption = document.querySelector("#otherOption");
    const otherBankInput = document.querySelector("#otherBankInput");
    const agreeCheckbox = document.querySelector("#agree");
    const form = document.querySelector("#form");

    const isValidPhoneNumber = () => {
        return phoneInputField.value && phoneInput.isValidNumber();
    };

    const isBankSelected = () => {
        const selectedBank = dropdownButton.textContent.trim();
        return selectedBank !== "Choose Bank" && selectedBank !== "Bank: Other Bank";
    };

    const isTermsAgreed = () => {
        return agreeCheckbox.checked;
    };

    form.addEventListener("submit", function (event) {
    if (event.submitter && event.submitter.value === "Parse SMS") {
        if (!isValidPhoneNumber()) {
            alert("Please enter a valid phone number.");
            event.preventDefault();
        } else if (!isBankSelected() && otherBankInput.style.display === "none") {
            alert("Please choose a bank.");
            event.preventDefault();
        } else if (!isTermsAgreed()) {
            alert("Please agree to the terms and conditions.");
            event.preventDefault();
        } else {
            alert("SMS Parsing Successful!");
            window.location.href = "main.php";
        }
    }
});



    document.addEventListener("mousemove", function (event) {

        if (!dropdownButton.contains(event.target) && !dropdownContent.contains(event.target)) {
            if (!isDropdownHovered) {
                dropdownContent.style.display = "none";
            }
        }
    });

    dropdownButton.addEventListener("click", function (event) {
    event.preventDefault(); // Prevent the default behavior of the click event
    dropdownContent.style.display = "block";
});


    dropdownContent.addEventListener("click", function (event) {
        if (event.target.tagName === "A") {
            const selectedBank = event.target.textContent.trim();
            if (selectedBank === "Other") {
                otherBankInput.style.display = "block";
            } else {
                otherBankInput.style.display = "none";
                dropdownButton.textContent = `Bank: ${selectedBank}`;
            }
        }
    });

    otherOption.addEventListener("click", function () {
        otherBankInput.style.display = "block";
        dropdownButton.textContent = "Bank: Other Bank";
    });

    let isDropdownHovered = false;

    dropdownContent.addEventListener("mouseover", function () {
        isDropdownHovered = true;
    });

    dropdownContent.addEventListener("mouseout", function () {
        isDropdownHovered = false;
    });
});

</script>
</body>
</html>