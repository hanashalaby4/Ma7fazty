import 'package:flutter/material.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:ma7fazti/signin.dart';
import 'custom_widgets.dart';
import 'package:fluttertoast/fluttertoast.dart';

class SignUpPage extends StatefulWidget {
  @override
  _SignUpPageState createState() => _SignUpPageState();
}

class _SignUpPageState extends State<SignUpPage> {
  TextEditingController _emailController = TextEditingController();
  TextEditingController _passwordController = TextEditingController();
  String _message = '';

  Future<void> _signUp() async {
    try {
      UserCredential userCredential = await FirebaseAuth.instance.createUserWithEmailAndPassword(
        email: _emailController.text,
        password: _passwordController.text,
      );
      Fluttertoast.showToast(
        msg: "Sign up successful!",
        toastLength: Toast.LENGTH_SHORT, // Duration for which the toast should be visible (Toast.LENGTH_SHORT or Toast.LENGTH_LONG)
        gravity: ToastGravity.BOTTOM, // Position of the toast on the screen (ToastGravity.TOP, ToastGravity.CENTER, or ToastGravity.BOTTOM)
        backgroundColor: Colors.grey[700], // Background color of the toast
        textColor: Colors.white, // Text color of the toast
        fontSize: 16.0, // Font size of the toast text
      );
      // Additional logic to store the user's name in Firestore or Realtime Database
      // You can use userCredential.user.uid as the user's unique identifier

      // Navigate to the home page or any other page after successful sign up
      Navigator.pushReplacement(
        context,
        MaterialPageRoute(builder: (context) => SignInPage()),
      );
    } catch (e) {
      print('Sign up failed: $e');

      // Check the error type and access the code property
      if (e is FirebaseAuthException) {
        if (e.code == 'weak-password') {
          setState(() {
            _message = 'The password provided is too weak.';
          });
        } else if (e.code == 'email-already-in-use') {
          setState(() {
            _message = 'The account already exists for that email.';
          });
        } else if (e.code == 'invalid-email') {
          setState(() {
            _message = 'Please enter a valid email address.';
          });
        } else {
          setState(() {
            _message = 'An error occurred during sign up. Please try again later.';
          });
        }
      } else {
        setState(() {
          _message = 'An error occurred during sign up. Please try again later.';
        });
      }
    }
  }


  void _goToSignInPage() {
    Navigator.push(
      context,
      MaterialPageRoute(builder: (context) => SignInPage()),
    );
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Sign Up'),
      ),
      body: Padding(
        padding: EdgeInsets.all(16.0),
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            CustomText(
              text: 'Welcome to Ma7fazti!',
              color: Colors.black,
              fontWeight: FontWeight.bold,
            ),
            SizedBox(height: 16.0),
            CustomTextField(
              controller: _emailController,
              labelText: 'Email',
            ),
            SizedBox(height: 16.0),
            CustomTextField(
              controller: _passwordController,
              labelText: 'Password',
            ),
            SizedBox(height: 16.0),
            CustomButton(
              text: 'Sign Up',
              onPressed: _signUp,
            ),
            SizedBox(height: 16.0),
            CustomButton(
              text: 'Already have an account? Sign In',
              onPressed: _goToSignInPage,
            ),
            SizedBox(height: 18.0),
            CustomText(
              text: _message,
              color: Colors.red,
              fontWeight: FontWeight.bold,
            ),
          ],
        ),
      ),
    );
  }
}