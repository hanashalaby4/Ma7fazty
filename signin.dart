import 'package:flutter/material.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:ma7fazti/home.dart';

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

      // Navigate to the home page or any other page after successful sign in
      Navigator.push(
        context,
        MaterialPageRoute(
          builder: (context) => HomePage(userName: 'John'), // Pass the user's name here
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
            TextField(
              controller: _emailController,
              decoration: InputDecoration(
                labelText: 'Email',
              ),
            ),
            SizedBox(height: 16.0),
            TextField(
              controller: _passwordController,
              decoration: InputDecoration(
                labelText: 'Password',
              ),
              obscureText: true,
            ),
            SizedBox(height: 16.0),
            ElevatedButton(
              child: Text('Sign In'),
              onPressed: _signIn,
            ),
            SizedBox(height: 16.0),
            Text(
              _message,
              style: TextStyle(
                color: Colors.red,
                fontWeight: FontWeight.bold,
              ),
            ),
          ],
        ),
      ),
    );
  }
}