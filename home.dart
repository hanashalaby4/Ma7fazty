import 'package:flutter/material.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:ma7fazti/expense_view.dart';
import 'package:ma7fazti/expense_entry.dart';

class HomePage extends StatelessWidget {
  final UserCredential userCredential;

  HomePage(this.userCredential);

  @override
  Widget build(BuildContext context) {
    String email = userCredential.user?.email ?? '';
    String userName = email.split('@')[0];

    return Scaffold(
      appBar: AppBar(
        title: Text('Home'),
      ),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            ElevatedButton(
              child: Text('Enter New Expenses'),
              onPressed: () {
                Navigator.push(
                  context,
                  MaterialPageRoute(builder: (context) => ExpenseEntryPage()),
                );
              },
            ),
            ElevatedButton(
              child: Text('View Expenses'),
              onPressed: () {
                Navigator.push(
                  context,
                  MaterialPageRoute(builder: (context) => ExpenseViewPage()),
                );
              },
            ),
            ElevatedButton(
              child: Text('Set a New Budget'),
              onPressed: () {
                // Add your logic for handling the "Set a New Budget" button press
              },
            ),
            ElevatedButton(
              child: Text('View Budgets'),
              onPressed: () {
                // Add your logic for handling the "View Budgets" button press
              },
            ),
          ],
        ),
      ),
    );
  }
}