<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2C3338;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #fff;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        .list {
            list-style: none;
            padding: 0;
        }

        .expense {
            background-color: #f8f8f8;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .form-control {
            margin: 10px 0;
        }

        .form-control label {
            display: block;
            font-weight: bold;
        }

        .form-control input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
        }

        .budget {
            display: flex;
            justify-content: space-between;
            position: relative;
        }

        .budget .editable .edit-icon {
            visibility: hidden;
            cursor: pointer;
        }

        .budget .editable:hover .edit-icon {
            visibility: visible;
        }

        .btn {
            background-color: #D44179;
            color: #fff;
            border: none;
            padding: 15px 30px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .logo {
            max-width: 500px;
            height: auto;
        }

        .meter {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .arrow {
            width: 0;
            height: 0;
            border-left: 8px solid transparent;
            border-right: 8px solid transparent;
            border-bottom: 12px solid red;
            margin-right: 10px;
        }

        .meter-text {
            font-weight: bold;
        }
        .upper-right-image {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .upper-right-image img {
        width: 100px;
        height: 50px;
        }
        img[src$="Palestine.jpg"]:hover {
            transform: scale(1.3);
            transition: transform 0.3s;
        }
        .remove-expense{
          background-color: #FF0000;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            margin-left: 10px;
        }
        .btn-sign-out {
            background-color: transparent;
            color: black;
            border: none;
            padding: 15px 30px;
            cursor: pointer;
            margin-top: 10px;
            margin-right: 10px;
            float: right;

        .btn-sign-out:hover {
          background-color: #FF0000;
          transform: scale(1.3);
          transition: transform 0.3s;        }
    </style>
</head>
<body>
  <div class="container">
    <div class="upper-right-image">
        <img src="Palestine.jpg" alt="Upper Right Image">
    </div>
    <div class="container">
        <h2><img src="Picture1 full.png" alt="Logo" class="logo"></h2>
        <div class="budget">
            <h3><span id="budget" class="editable" onmouseover="showEditIcon()" onclick="editBudget()">Your budget: $0.00<span class="edit-icon">&#9998;</span></span></h3>
        </div>
        <div class="meter">
            <div class="arrow"></div>
            <div class="meter-text">You have spent <span id="percentage">0%</span> from the budget</div>
        </div>
        <h3>Expense History</h3>
        <ul class="list" id="list">
            <!-- Transactions with remove buttons will be added dynamically here -->
        </ul>
        <h3>Your Expenses</h3>
        <ul class="list" id="your-expenses-list">
            <!-- Your expenses will be added dynamically here -->
            <li id="total-expenses">Total Expenses: $0.00</li>
        </ul>
        <h3>Add new expense</h3>
        <form id="form">
            <div class="form-control">
                <label for="text">Category:</label>
                <input list="categories" id="text" placeholder="Enter text or choose a category.." required>
              <datalist id="categories">
                  <option value="Coffee/Tea">Coffee/Tea</option>
                  <option value="Transportation">Transportation</option>
                  <option value="Groceries">Groceries</option>
                  <option value="Food and Dining">Food and Dining</option>
                  <option value="Housing">Housing</option>
                  <option value="Entertainment">Entertainment</option>
                  <option value="Health and Fitness">Health and Fitness</option>
                  <option value="Shopping">Shopping</option>
                  <option value="Travel">Travel</option>
                  <option value="Bills (utilities, insurance, subscriptions)">Bills (utilities, insurance, subscriptions)</option>
                  <option value="Education">Education</option>
                  <option value="Personal Care">Personal Care</option>
                  <option value="Gifts and Donations">Gifts and Donations</option>
              </datalist>
            </div>
            <div class="form-control">
                <label for="amount">Amount (positive - expense)</label>
                <input type="number" id="amount" placeholder="Enter amount..." required min="0">
            </div>
            <button class="btn btn-bigger" onclick="addExpense()">Add expense</button>
        </form>
        <a href = "index.php">
        <button class="btn btn-sign-out" onclick="signOut()">Sign Out</button>
      </a>
    </div>
</div>
<script>
    const budgetElement = document.getElementById('budget');
    const text = document.getElementById('text');
    const amount = document.getElementById('amount');
    const list = document.getElementById('list');
    const yourExpensesList = document.getElementById('your-expenses-list');
    const totalExpensesElement = document.getElementById('total-expenses');
    const percentageElement = document.getElementById('percentage');

    let expenses = [];
    let currentBudget = 0;

    function showEditIcon() {
        const editIcon = budgetElement.querySelector('.edit-icon');
        if (editIcon) {
            editIcon.style.visibility = 'visible';
        }
    }

    function editBudget() {
        const newBudget = prompt('Enter your new budget:', currentBudget);
        if (newBudget !== null && !isNaN(newBudget)) {
            currentBudget = parseFloat(newBudget);
            budgetElement.innerHTML = `Your budget: $${currentBudget.toFixed(2)} <span class="edit-icon" onmouseover="showEditIcon()" onclick="editBudget()">&#9998;</span>`;
            updateTotalExpenses();
        }
    }

    function addExpense() {
        if (text.value.trim() === '' || amount.value.trim() === '') {
            alert('Please add a text and amount');
        } else {
            const expense = {
                id: generateID(),
                text: text.value,
                amount: +amount.value
            };

            expenses.push(expense);

            addExpenseDOM(expense);
            updateTotalExpenses();

            text.value = '';
            amount.value = '';
        }
    }

    function generateID() {
        return Math.floor(Math.random() * 100000000);
    }

    function addExpenseDOM(expense) {
        const item = document.createElement('li');
        item.classList.add('expense');

        item.innerHTML = `
            ${expense.text} <span>$${expense.amount.toFixed(2)}</span>
        `;

        list.appendChild(item);
    }

    function updateTotalExpenses() {
        const totalExpense = expenses.reduce((acc, item) => acc + item.amount, 0).toFixed(2);
        totalExpensesElement.innerText = `Total Expenses: $${totalExpense}`;
        updateBudgetPercentage(totalExpense);
    }

    function updateBudgetPercentage(totalExpense) {
        const percentage = ((totalExpense / currentBudget) * 100).toFixed(2) + '%';
        percentageElement.innerText = `${percentage}`;
    }
    function addExpenseDOM(expense) {
        const item = document.createElement('li');
        item.classList.add('expense');

        item.innerHTML = `
            ${expense.text} <span>$${expense.amount.toFixed(2)}</span>
            <button class="remove-expense" data-id="${expense.id}">X</button>
        `;

        list.appendChild(item);

        const removeButton = item.querySelector('.remove-expense');
        removeButton.addEventListener('click', removeExpense);
    }

    function removeExpense(event) {
        const expenseId = parseInt(event.target.getAttribute('data-id'));

        expenses = expenses.filter((expense) => expense.id !== expenseId);

        event.target.parentElement.remove();

        updateTotalExpenses();
    }
</script>
</body>
</html>
