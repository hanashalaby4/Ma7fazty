<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ma7fazty Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #2C3338;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        .login-form {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
        }

        .input-group {
            margin-bottom: 20px;
        }

        label {
            margin-bottom: 8px;
        }

        input {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
        }

        .checkbox-group label {
            margin-bottom: 0;
            margin-left: 8px;
        }

        button {
            padding: 8px 16px;
            background-color: #D44179;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
        img[src$="340.png"]:hover {
            transform: scale(1.3);
            transition: transform 0.3s;
        }
        img[src$="Palestine.jpg"]:hover {
            transform: scale(1.3);
            transition: transform 0.3s;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>WHOM WOULD YOU LIKE TO SHARE THE BILL WITH...</h1>
        <div class="login-form">
            <div class="input-group">
                <label for="usernameOrEmail">Ma7fazty Username or Email:</label>
                <input required type="text" id="usernameOrEmail" placeholder="USERNAME OR EMAIL">
            </div>

            <div class="checkbox-group">
                <input type="checkbox" id="agreeTerms" required>
                <label for="agreeTerms">I agree to the terms and conditions</label>
            </div>

            <button onclick="submitForm()">Submit</button>
        </div>
    </div>
    <img style="position: absolute; right: 10px; top: 10px; width: 100px; height: 50px;" src="Palestine.jpg" alt="Corner Image">
    <a href="main.php">
        <img style="position: absolute; left: 10px; top: 10px; width: 100px; height: 50px;" src="340.png" alt="Corner Image">
    </a>
    <script>
        function submitForm() {
    const usernameOrEmailInput = document.getElementById("usernameOrEmail");
    const agreeTermsCheckbox = document.getElementById("agreeTerms");

    if (usernameOrEmailInput.value.trim() !== '' && agreeTermsCheckbox.checked) {
        alert("Form submitted successfully!");
        location.href = 'main.php';
    } else {
        alert("Please fill in the required fields and agree to the terms.");
    }
}
</script>
</body>
</html>
