<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            background: #2C3338;
        }

        .container {
            width: 500px;
            position: relative;
            background: #2C3338;
        }


        img[src$="Palestine.jpg"]:hover {
            transform: scale(1.3);
            transition: transform 0.3s;
        }

        input[type="text"]:hover,
        input[type="password"]:hover {
            border: 5px solid #D44179;
            transition: border 0.3s;
        }

        /* Style for "SIGN IN" and "SIGN UP" buttons */
        .container div.sign-in-button {
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s, opacity 0.3s;
            background-color: transparent;
            transform: scale(1.3);
            width: 700px;
            height: 30px;
            left: 156px;
            top: 466px;
            position: absolute;
            color: white;
            font-size: 18px;
            font-family: Inter;
            font-weight: 400;
            text-align: center;
        }

        .container div.signup:hover {
            transform: scale(1.3);
            transition: transform 0.3s;
        }
				.button:hover {
					transform: scale(1.3);
					transition: transform 0.3s;
				}
.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
    </style>
		<script>
		function signIn() {
		    var email = document.getElementById("email").value;
		    var password = document.getElementById("password").value;

		    if (email != '' && password != '') {
		        // Both fields are filled, navigate to the other page
		      location.href = 'main.php';
		    }
		}
		</script>
</head>
<body>
<div class="container">
    <div style="width: 255px; height: 60px; left: 87px; top: 270px; position: absolute; background: #606468"></div>
    <div style="width: 255px; height: 60px; left: 87px; top: 270px; position: absolute; background: #606468; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25)"></div>
    <div style="width: 255px; height: 60px; left: 87px; top: 356px; position: absolute; background: #606468"></div>
    <div style="left: 106px; top: 449px; position: absolute; justify-content: flex-start; align-items: flex-start; gap: 10px; display: inline-flex">
        <div style="width: 236px; height: 60px; background: #D44179"></div>
    </div>
    <div style="width: 60px; height: 60px; left: 87px; top: 270px; position: absolute; background: #2C3338"></div>
    <div style="width: 60px; height: 60px; left: 87px; top: 356px; position: absolute; background: #2C3338"></div>
    <form id="signin" action = "javascript:signIn();">
        <div style="width: 186px; height: 24px; left: 156px; top: 283px; position: absolute; color: white; font-size: 14px; font-family: Inter; font-weight: 400; text-decoration: underline; word-wrap: break-word">
            <input id="email" required type="text" placeholder="Email">
        </div>
        <div style="width: 181px; height: 33px; left: 153px; top: 367px; position: absolute; color: white; font-size: 14px; font-family: Inter; font-weight: 400; word-wrap: break-word">
            <input id="password" required type="password" placeholder="Password">
        </div>
        <div class="sign-in-button" style="width: 165px; height: 30px; left: 140px; top: 466px; position: absolute; text-align: center; color: white; font-size: 18px; font-family: Inter; font-weight: 400; word-wrap: break-word">
					<button class = "button" type ="submit" style="cursor: pointer; padding: 0; border: none; background: none; color: white; font-size: 18px; font-family: Inter; font-weight: 400; word-wrap: break-word">
				    SIGN IN
					</button>
        </div>
    </form>
    <div style="width: 165px; height: 30px; left: -9px; top: 586px; position: absolute; text-align: center; color: white; font-size: 14px; font-family: Inter; font-weight: 400; word-wrap: break-word">SIGN IN WITH:</div>
    <a href="https://www.facebook.com/">
        <img style="width: 28px; height: 24px; left: 164px; top: 585px; position: absolute" src="Facebook.png" />
    </a>
    <a href="https://www.instagram.com/">
        <img style="width: 28px; height: 24px; left: 208px; top: 585px; position: absolute" src="Instagram.png" />
    </a>
    <a href="https://accounts.google.com/v3/signin/identifier?continue=https%3A%2F%2Fmail.google.com%2Fmail%2Fu%2F0%2F&emr=1&followup=https%3A%2F%2Fmail.google.com%2Fmail%2Fu%2F0%2F&ifkv=AVQVeywxNbggDd6s645-_TGRWCSdcYMtdmJCgVL8f2-rdYojn4WRWweGzxkjUjM1tt9u2uYv6SzVTA&osid=1&passive=1209600&service=mail&flowName=GlifWebSignIn&flowEntry=ServiceLogin&dsh=S-1106534615%3A1698317430832209&theme=glif">
        <img style="width: 28px; height: 24px; left: 252px; top: 585px; position: absolute" src="Google.png" />
    </a>
  	<a href = "https://www.linkedin.com/">
    <img style="width: 25px; height: 22px; left: 296px; top: 585px; position: absolute" src="LinkedIn.png" />
</a>
<a href = "Signup.php">
		<div class = "signup" style="width: 265px; height: 34px; left: 77px; top: 667px; position: absolute; text-align: center"><span style="color: black; font-size: 18px; font-family: Inter; font-weight: 400; word-wrap: break-word">Not a member? </span><span style="color: #F8FCFF; font-size: 18px; font-family: Inter; font-weight: 400; word-wrap: break-word">Sign Up Now!</span></div>
</a>
    <div style="width: 297px; height: 76px; left: 147px; top: 133px; position: absolute; color: white; font-size: 51px; font-family: Inter; font-weight: 400; word-wrap: break-word">A7FAZTY</div>
    <img style="width: 33px; height: 32px; left: 98px; top: 280px; position: absolute" src="User.png" />
    <img style="width: 33px; height: 32px; left: 98px; top: 363px; position: absolute" src="Lock.png" />
    <img style="width: 368px; height: 106px; left: 77px; top: 115px; position: absolute" src="Logo.png" />
    <div style="left: 98px; top: 209px; position: absolute; color: white; font-size: 12px; font-family: Inter; font-weight: 400; word-wrap: break-word">WHERE FINANCIAL MANAGEMENT MEETS SIMPLICITY</div>
  </div>
	<img style="position: absolute; right: 10px; top: 10px; width: 100px; height: 50px;" src="Palestine.jpg" alt="Corner Image">
</body>
</html>
