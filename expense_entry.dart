import 'package:flutter/material.dart';
import 'package:intl/intl.dart';
import 'package:cloud_firestore/cloud_firestore.dart';
import 'custom_widgets.dart';
class ExpenseEntryPage extends StatefulWidget {
  @override
  _ExpenseEntryPageState createState() => _ExpenseEntryPageState();
}

class _ExpenseEntryPageState extends State<ExpenseEntryPage> {
  final TextEditingController nameController = TextEditingController();
  String? selectedCategory;
  final TextEditingController amountController = TextEditingController();
  DateTime? selectedDateTime;

  void addExpense() {
    String name = nameController.text;
    double amount = double.parse(amountController.text);
    DateTime? dateTime = selectedDateTime;

    FirebaseFirestore.instance.collection('expenses').add({
      'name': name,
      'category': selectedCategory,
      'amount': amount,
      'dateTime': dateTime,
    });

    // Clear the text fields after adding the expense
    nameController.clear();
    amountController.clear();
    setState(() {
      selectedCategory = null;
      selectedDateTime = null;
    });
  }

  Future<void> selectDateTime(BuildContext context) async {
    final DateTime? picked = await showDatePicker(
      context: context,
      initialDate: selectedDateTime ?? DateTime.now(),
      firstDate: DateTime(2022),
      lastDate: DateTime(2025),
      builder: (BuildContext context, Widget? child) {
        return Theme(
          data: ThemeData.light().copyWith(
            // Customize the date picker
            textButtonTheme: TextButtonThemeData(
              style: TextButton.styleFrom(
                primary: Colors.blue, // Set the color of the date picker buttons
              ),
            ),
          ),
          child: child!,
        );
      },
    );

    if (picked != null) {
      final TimeOfDay? pickedTime = await showTimePicker(
        context: context,
        initialTime: TimeOfDay.now(),
      );

      if (pickedTime != null) {
        setState(() {
          selectedDateTime = DateTime(
            picked.year,
            picked.month,
            picked.day,
            pickedTime.hour,
            pickedTime.minute,
          );
        });
      }
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: CustomText(
          text: 'Expenses Entry',
          color: Colors.black,
          fontWeight: FontWeight.bold,
        ),
      ),
      body: Padding(
        padding: EdgeInsets.all(16.0),
        child: Column(
          children: [
            CustomTextField(
              controller: nameController,
                labelText: 'Expense Name'
            ),
            PopupMenuButton<String>(
              onSelected: (category) {
                setState(() {
                  selectedCategory = category;
                });
              },
              itemBuilder: (BuildContext context) => [
                // ... List of PopupMenuItem
                PopupMenuItem(
                  value: 'Food',
                  child: Text('Food'),
                ),
                PopupMenuItem(
                  value: 'Utilities',
                  child: Text('Utilities'),
                ),
                PopupMenuItem(
                  value: 'Clothing',
                  child: Text('Clothing'),
                ),
                PopupMenuItem(
                  value: 'Medical',
                  child: Text('Medical'),
                ),
                PopupMenuItem(
                  value: 'Insurance',
                  child: Text('Insurance'),
                ),
                PopupMenuItem(
                  value: 'Education',
                  child: Text('Education'),
                ),
                PopupMenuItem(
                  value: 'Gifts/Donations',
                  child: Text('Gifts/Donations'),
                ),
                PopupMenuItem(
                  value: 'Entertainment',
                  child: Text('Entertainment'),
                ),
                PopupMenuItem(
                  value: 'Other',
                  child: Text('Other'),
                ),
              ],
              child: ListTile(
                title: Text('Category'),
                subtitle: Text(selectedCategory ?? 'Choose a category'),
              ),
            ),
            TextField(
              controller: amountController,
              keyboardType: TextInputType.number,
                decoration: InputDecoration( labelText: 'Amount',
                ),
            ),
            TextButton(
              onPressed: () {
                selectDateTime(context);
              },
              child: Text('Select Date and Time'),
            ),
            Text(
              'Selected Date and Time: ${selectedDateTime != null ? DateFormat('MM/dd/yyyy HH:mm').format(selectedDateTime!) : 'Not selected'}',
            ),
            ElevatedButton(
              child: Text('Enter New Expense'),
              onPressed: addExpense,
            ),
          ],
        ),
      ),
    );
  }
}
