import 'package:flutter/material.dart';
import 'package:cloud_firestore/cloud_firestore.dart';

class BudgetViewPage extends StatefulWidget {
  @override
  _BudgetViewPageState createState() => _BudgetViewPageState();
}

class _BudgetViewPageState extends State<BudgetViewPage> {
  double monthlyBudget = 0.0;

  @override
  void initState() {
    super.initState();
    fetchMonthlyBudget();
  }

  void fetchMonthlyBudget() async {
    DocumentSnapshot snapshot = await FirebaseFirestore.instance
        .collection('budgetSettings')
        .doc('userSettings')
        .get();

    if (snapshot.exists) {
      setState(() {
        Map<String, dynamic> data = snapshot.data() as Map<String, dynamic>;
        monthlyBudget = data['monthlyBudget'] ?? 0.0;
      });
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Budget View'),
      ),
      body: Center(
        child: Text(
          'Monthly Budget: \${monthlyBudget.toStringAsFixed(2)}',
          style: TextStyle(fontSize: 24),
        ),
      ),
    );
  }
}