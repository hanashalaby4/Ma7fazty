<!DOCTYPE html>
<html>
<head>
    <title>Create Account</title>
    <style>
        body {
            background-color: #2c3338;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        #container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        h1 {
            color: #fff;
        }

        form {
            background-color: #606468;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            text-align: left;
            max-width: 500px;
            width: 100%;
            padding: 20px 20px;
            margin: 0 auto;
        }

        label, input, select, a {
            color: #fff;
            display: block;
            margin-bottom: 10px;
        }
p{
  color: white;
}
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="tel"],
        select {
            width: 90%;
            padding: 10px;
            border: 2px solid #fff;
            background-color: #606468;
            border-radius: 5px;
            color: #fff;
            transition: border-color 0.3s;
        }

        input[type="text"]:hover,
        input[type="email"]:hover,
        input[type="password"]:hover,
        input[type="tel"]:hover,
        select:hover {
            border-color: #8a8f92; 
        }

        #terms_agreement {
            display: inline;
        }

        #register {
            background-color: #d44179;
            color: #fff;
            padding: 15px 40px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 20px auto;
            display: block;
            transition: background-color 0.3s;
        }

        #register:hover {
            background-color: #c13a6d;
        }
        img[src$="Palestine.jpg"]:hover {
            transform: scale(1.3);
            transition: transform 0.3s;
        }
        img[src$="340.png"]:hover {
            transform: scale(1.3);
            transition: transform 0.3s;
        }
    </style>
</head>
<body>
    <div id="container">
        <h1>Create Account</h1>
        <form action="your_registration_handler.php" method="post">
            <!-- First Name (Required) -->
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" required>

            <!-- Last Name (Required) -->
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required>

            <!-- Email (Required) -->
            <label for="email">Email:</label>
            <input type="email" id="email" name "email" required>

            <!-- Password (Required) -->
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <!-- Phone Number (Optional) -->
            <label for="phone_number">Phone Number:</label>
            <input type="tel" id="phone_number" name="phone_number">

            <!-- Country Code (Dropdown) -->
            <label for="country_code">Country Code:</label>
            <select id="country_code" name="country_code">
                <option value="+1">+1 (US)</option>
                <option value="+44">+44 (UK)</option>
                <option value="+61">+61 (AU)</option>
                <option value="+20">+20 (Egypt)</option>
                <option value="+33">+33 (France)</option>
                <option value="+49">+49 (Germany)</option>
                <!-- Add more country codes as needed -->
            </select>

            <!-- Terms and Privacy Policy Agreement (Required) -->
            <input type="checkbox" id="terms_agreement" name="terms_agreement" required>
            <label for="terms_agreement">By pressing Register, you are agreeing to our <a href="Terms and Conditions">Terms and Conditions. </a> </label>

            <!-- Social Media Signup Options -->
            <p>OR SIGN UP WITH:</p>
            <img style="width: 25px; height: 22px;" src="Facebook.png" alt="Facebook">
            <img style="width: 25px; height: 22px;" src="Instagram.png" alt="Instagram">
            <img style="width: 25px; height: 22px;" src="Google.png" alt="Google">
            <img style="width: 25px; height: 22px;" src="LinkedIn.png" alt="LinkedIn">
            <!-- Register Button -->
            <input type="submit" id="register" value="Register">
        </form>
    </div>

    <img style="position: absolute; right: 10px; top: 10px; width: 100px; height: 50px;" src="Palestine.jpg" alt="Corner Image">
    <a href="index.php">
    <img style="position: absolute; left: 10px; top: 10px; width: 100px; height: 50px;" src="340.png" alt="Corner Image">
</a>
</body>
</html>
