import 'package:flutter/material.dart';
import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:intl/intl.dart';
import 'expense_data.dart';
import 'custom_widgets.dart';

// Fetches data from firestore and turns it into a List of ExpenseData items
Future<List<ExpenseData>> fetchExpenseData() async {
  QuerySnapshot querySnapshot = await FirebaseFirestore.instance.collection('expenses').get();
  List<ExpenseData> expenseData = []; // Creates the list

  for (var doc in querySnapshot.docs) { // Iterating over documents
    final data = doc.data() as Map<String, dynamic>;
    final date = (data['dateTime'] as Timestamp).toDate();
    final amount = data['amount'] as double;
    final category = data['category'] as String;  // Extract info for each expense

    expenseData.add(ExpenseData(date, amount, category)); // Adds document to list
  }

  return expenseData; // Returns list
}

class ExpenseViewPage extends StatelessWidget {
  final FirebaseFirestore _firestore = FirebaseFirestore.instance;

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Expense View'),
      ),
      body: Column(
          children: [

            Expanded(
              flex: 2,
              child: FutureBuilder<List<ExpenseData>>(
                future: fetchExpenseData(),
                builder: (context, snapshot) {
                  if (snapshot.connectionState == ConnectionState.waiting) {
                    return Center(child: CircularProgressIndicator());
                  }
                  if (!snapshot.hasData || snapshot.data!.isEmpty) {
                    return Center(child:
                    CustomText(
                      text: 'No expense data available for chart.',
                      fontWeight: FontWeight.bold,
                      color: Colors.black,
                    )
                    );
                  }
                  return ExpenseLineChart(expenseData: snapshot.data!);
                },
              ),
            ),
            Expanded(
                flex: 3,
                child: StreamBuilder<QuerySnapshot>(
                    stream: _firestore.collection('expenses').snapshots(),
                    builder: (BuildContext context,
                        AsyncSnapshot<QuerySnapshot> snapshot) {
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

                            final formattedDateTime = DateFormat(
                                'MM/dd/yyyy HH:mm').format(dateTime);

                            return ListTile(
                                title: Text(name),
                                subtitle: Column(
                                  crossAxisAlignment: CrossAxisAlignment.start,
                                  children: [
                                    Text('Category:$category'),
                                    Text('Amount:$amount'),
                                    Text('Date and Time: $formattedDateTime'),
                                  ],
                                )
                            );
                          }
                      );
                    }
                )


            )
          ]
      ),
    );
  }
}




























/*     StreamBuilder<QuerySnapshot>(
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
}*/

