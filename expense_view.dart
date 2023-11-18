import 'package:flutter/material.dart';
import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:intl/intl.dart';
import 'expense_data.dart'

class ExpenseViewPage extends StatelessWidget {
  final FirebaseFirestore _firestore = FirebaseFirestore.instance;

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Expense View'),
      ),
      body: StreamBuilder<QuerySnapshot>(
        stream: _firestore.collection('expenses').snapshots(),
        builder: (BuildContext context, AsyncSnapshot<QuerySnapshot> snapshot) {
          if (!snapshot.hasData) {
            return Center(
              child: CircularProgressIndicator(),
            );
          }

          final expenses = snapshot.data!.docs;

          return ListView.builder(
            itemCount: expenses.length,
            itemBuilder: (BuildContext context, int index) {
              final expense = expenses[index];

              final name = expense['name'];
              final category = expense['category'];
              final amount = expense['amount'];
              final dateTime = expense['dateTime'].toDate();

              final formattedDateTime = DateFormat('MM/dd/yyyy HH:mm').format(dateTime);

              return ListTile(
                title: Text(name),
                subtitle: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Text('Category: $category'),
                    Text('Amount: $amount'),
                    Text('Date and Time: $formattedDateTime'),
                  ],
                ),
              );
            },
          );
        },
      ),
    );
  }
}

Future<List<ExpenseData>> fetchExpenseData() async {
  QuerySnapshot querySnapshot = await FirebaseFirestore.instance.collection('expenses').get();
  List<ExpenseData> expenseData = [];

  for (var doc in querySnapshot.docs) {
    final data = doc.data() as Map<String, dynamic>;
    final date = (data['dateTime'] as Timestamp).toDate();
    final amount = data['amount'] as double;
    final category = data['category'] as String;  // Extract category

    expenseData.add(ExpenseData(date, amount, category));
  }

  return expenseData;
}
