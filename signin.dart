import 'package:flutter/material.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:ma7fazti/home.dart'
import 'custom_widgets.dart';

class SignInPage extends StatefulWidget {
  @override
  _SignInPageState createState() => _SignInPageState();
}

class _SignInPageState extends State<SignInPage> {
  TextEditingController _emailController = TextEditingController();
  TextEditingController _passwordController = TextEditingController();
  String _message = '';

  Future<void> _signIn() async {
    try {
      UserCredential userCredential = await FirebaseAuth.instance.signInWithEmailAndPassword(
        email: _emailController.text,
        password: _passwordController.text,
      );

      // Navigate to the home page with user credentials
      Navigator.push(
        context,
        MaterialPageRoute(
          builder: (context) => HomePage(userCredential), // Pass the user credentials here
        ),
      );
    } catch (e) {
      print('Sign in failed: $e');

      // Check the error type and access the code property
      if (e is FirebaseAuthException) {
        if (e.code == 'user-not-found') {
          setState(() {
            _message = 'No user found for that email.';
          });
        } else if (e.code == 'wrong-password') {
          setState(() {
            _message = 'Incorrect password.';
          });
        } else if (e.code == 'invalid-email') {
          setState(() {
            _message = 'Please enter a valid email address.';
          });
        } else {
          setState(() {
            _message = 'An error occurred during sign in. Please try again later.';
          });
        }
      } else {
        setState(() {
          _message = 'An error occurred during sign in. Please try again later.';
        });
      }
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Sign In'),
      ),
      body: Padding(
        padding: EdgeInsets.all(16.0),
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            CustomTextField(
              controller: _emailController,
              labelText: 'Email',
            ),
            SizedBox(height: 16.0),
            CustomTextField(
              controller: _passwordController,
              labelText: 'Password',
              obscureText: true,
            ),
            SizedBox(height: 16.0),
            CustomButton(
               text: 'Sign In',
              onPressed: _signIn,
            ),
            SizedBox(height: 16.0),
            CustomText(
                text: _message,
                color: Colors.red,
                fontWeight: FontWeight.bold,
                )
          ],
        ),
      ),
    );
  }
}