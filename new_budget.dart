import 'package:flutter/material.dart';

class BudgetSettingsPage extends StatefulWidget {
  @override
  _BudgetSettingsPageState createState() => _BudgetSettingsPageState();
}

class _BudgetSettingsPageState extends State<BudgetSettingsPage> {
  final formKey = GlobalKey<FormState>();
  double monthlyBudget = 0.0;

  void saveSettings() {
    if (formKey.currentState?.validate() == true) {
      formKey.currentState?.save();
      // Save settings to database or server
      Navigator.pop(context); // Go back to previous screen
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Budget Settings'),
      ),
      body: Padding(
        padding: EdgeInsets.all(16.0),
        child: Form(
          key: formKey,
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            children: <Widget>[
              TextFormField(
                decoration: InputDecoration(labelText: 'Monthly Budget'),
                keyboardType: TextInputType.number,
                onSaved: (value) {
                  //Ensure the value is not null before parsing.
                  final nonNullValue = value ?? '';
                  monthlyBudget = double.tryParse(nonNullValue) ?? 0;
                },
                validator: (value) {
                  // Provide a default value (empty string) if value is null before validation
                  final nonNullValue = value ?? '';
                  if (nonNullValue.isEmpty) {
                    return 'Please enter your monthly budget';
                  }
                  if (double.tryParse(nonNullValue) == null) {
                    return 'Please enter a valid number';
                  }
                  return null;
                },
              ),
              // Add more settings fields here
              Padding(
                padding: const EdgeInsets.symmetric(vertical: 16.0),
                child: ElevatedButton(
                  onPressed: saveSettings,
                  child: Text('Save'),
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
