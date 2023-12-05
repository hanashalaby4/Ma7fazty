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

        .remove-expense {
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
            margin-top: 60px;
            margin-right: 10px;
            float: right;
        }

        .btn-sign-out:hover {
            background-color: #FF0000;
            transform: scale(1.3);
            transition: transform 0.3s;
        }
        #another-button {
           
            float: right;}

        .btn2 {
            background-color: #008000;
            color: #fff;
            border: none;
            padding: 15px 30px;
            cursor: pointer;
        }
        .btn2:hover {
            background-color: #0056b3;
        }
        .button-container {
    display: flex;
    justify-content: space-between;
    margin-top: 20px; 
}
.attachment-icon {
    cursor: default; 
    transition: transform 0.3s;
}

.attachment-icon.hoverable:hover {
    transform: scale(1.3); 
}
.tooltip {
    position: absolute;
    background-color: #555;
    color: #fff;
    padding: 5px;
    border-radius: 5px;
    font-size: 12px;
    z-index: 1;
}

    </style>
</head>
<body>
  <div class="container">
    <div class="upper-right-image">
        <img src="Palestine.jpg" alt="Upper Right Image">
    </div>
    <div class="form-button-container" style="display: flex; align-items: center;">
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
    </form>
            <div class="form-control">
                <label for="amount">Amount (positive - expense)</label>
                <input type="number" id="amount" placeholder="Enter amount..." required min="0">
            </div>
            <div class="form-control">
                    <label for="file">Attach Document (PDF or Image):</label>
                    <input type="file" id="file" accept=".pdf, .jpg, .jpeg, .png">
                </div>
            <button class="btn btn-bigger" onclick="addExpense()">Add expense</button>
            <button class="btn2" id="another-button" onclick="visualizeSpending()">Visualize your spending!</button>
            <br>
            <br>
            <button class="btn btn-bigger" type="file" id="fil2" accept=".pdf, .jpg, .jpeg, .png" onclick="oneClick()">One-Click Expense Entry</button>
     <div class="button-container">
     <a href = "SmsParsing.php">
        <button class="btn btn-sign-out">Parse SMS</button>
</a>
<a href = "reminder.php">
        <button class="btn btn-sign-out">Expense Reminder</button>
</a>
<a href = "contact.php">
        <button class="btn btn-sign-out">Contact Us</button>
</a>
<a href = "index.php">
        <button class="btn btn-sign-out">Sign Out</button>
</a>
    </div>
    </div>
    </div>
    <div id="charts-section"></div>
    <canvas id="expensesChart" width="400" height="400"></canvas>
    <canvas id="budgetChart" width="400" height="400"></canvas>
</div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            amount: +amount.value,
            attachment: getFileName()
        };

        expenses.push(expense);

        addExpenseDOM(expense);
        updateTotalExpenses();

        text.value = '';
        amount.value = '';
        const fileInput = document.getElementById('file');
        fileInput.value = '';
    }
}
function oneClick() {
    text.value = "Coffee/Tea";

    amount.value = "4.40";

    const fileInput = document.getElementById('file');
    fileInput.click();
}

const fileInput = document.getElementById('file');
fileInput.addEventListener('change', handleFileSelection);

function handleFileSelection() {
    const selectedFile = fileInput.files[0];

    const attachmentIcon = document.querySelector('.attachment-icon');
    showTooltip(attachmentIcon, generateTooltipContent(selectedFile.name));
}

function generateID() {
    return Math.floor(Math.random() * 100000000);
}

function addExpenseDOM(expense) {
    const item = document.createElement('li');
    item.classList.add('expense');

    // Check if a file is attached and include the paper clip icon
    const hasAttachment = expense.attachment && expense.attachment.length > 0;
    const paperClipIcon = hasAttachment ? '📎' : '';

    item.innerHTML = `
        ${expense.text} <span>$${expense.amount.toFixed(2)}</span>
    <span class="attachment-icon hoverable" title="${generateTooltipContent(expense.attachment)}">${paperClipIcon}</span>
    <a href="share.php" target="_blank">
    <img src="shareIcon.png" alt="Ma7fazty Logo" style="width: 21px; height: 25px; border: none; cursor: pointer; margin-left: 10px;">
</a>
    <a href="https://www.linkedin.com/" target="_blank">
    <img src="LinkedIn.png" alt="LinkedIn Logo" style="width: 25px; height: 25px; border: none; cursor: pointer; margin-left: 10px">
</a>
<a href="https://accounts.google.com/v3/signin/identifier?continue=https%3A%2F%2Fmail.google.com%2Fmail%2Fu%2F0%2F&emr=1&followup=https%3A%2F%2Fmail.google.com%2Fmail%2Fu%2F0%2F&ifkv=AVQVeywxNbggDd6s645-_TGRWCSdcYMtdmJCgVL8f2-rdYojn4WRWweGzxkjUjM1tt9u2uYv6SzVTA&osid=1&passive=1209600&service=mail&flowName=GlifWebSignIn&flowEntry=ServiceLogin&dsh=S-1106534615%3A1698317430832209&theme=glif" target="_blank">
    <img src="Google.png" alt="Google Logo" style="width: 25px; height: 25px; border: none; cursor: pointer; margin-left: 10px;">
</a>
<a href=""https://www.facebook.com/" target="_blank">
    <img src="Facebook.png" alt="Facebook Logo" style="width: 25px; height: 25px; left: 300px; border: none; cursor: pointer; margin-left: 10px;">
</a>
        <button class="remove-expense" data-id="${expense.id}">X</button>
    `;

    list.appendChild(item);

    const removeButton = item.querySelector('.remove-expense');
    removeButton.addEventListener('click', removeExpense);

    const attachmentIcon = item.querySelector('.attachment-icon');
    attachmentIcon.addEventListener('mouseover', () => showTooltip(attachmentIcon, generateTooltipContent(expense.attachment)));
    attachmentIcon.addEventListener('mouseout', () => hideTooltip());
}

function showTooltip(element, content) {
    const tooltip = document.createElement('div');
    tooltip.classList.add('tooltip');
    tooltip.innerText = content;

    element.appendChild(tooltip);
}

function hideTooltip() {
    const tooltips = document.querySelectorAll('.tooltip');
    tooltips.forEach((tooltip) => tooltip.remove());
}
function generateTooltipContent(attachment) {
    if (attachment && attachment.length > 0) {
        return `Attached Document: ${attachment}`;
    } else {
        return 'No Attachment';
    }
}



function removeExpense(event) {
    const expenseId = parseInt(event.target.getAttribute('data-id'));

    expenses = expenses.filter((expense) => expense.id !== expenseId);

    event.target.parentElement.remove();

    updateTotalExpenses();
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

function getFileName() {
    const fileInput = document.getElementById('file');
    const file = fileInput.files[0];
    
    return file ? file.name : '';
}

    let expensesChart;
let budgetChart;

function visualizeSpending() {
    // Destroy existing charts if they exist
    if (expensesChart) {
        expensesChart.destroy();
    }

    if (budgetChart) {
        budgetChart.destroy();
    }

    // Extract unique categories from your expense history
    const uniqueCategories = [...new Set(expenses.map(expense => expense.text))];

    // Use default categories if none exist
    const categories = uniqueCategories.length > 0 ? uniqueCategories : ['No Categories'];

    // Map each category to its corresponding total expense
    const expensesData = categories.map(category => {
        const totalExpense = expenses
            .filter(expense => expense.text === category)
            .reduce((total, expense) => total + expense.amount, 0);
        return totalExpense;
    });

    // Calculate total expenses
    const totalExpenses = expenses.reduce((total, expense) => total + expense.amount, 0);

    // Use a default budget if not provided
    const budgetData = isNaN(currentBudget) ? 1000 : currentBudget; // Use currentBudget instead of budgetData

    // Create a bar chart for total expenses by category
    expensesChart = new Chart(document.getElementById('expensesChart'), {
        type: 'bar',
        data: {
            labels: categories,
            datasets: [{
                label: 'Expenses',
                data: expensesData,
                backgroundColor: 'rgba(255, 99, 132, 0.6)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1,
            }],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });

    // Create a doughnut chart for budget overview
    budgetChart = new Chart(document.getElementById('budgetChart'), {
        type: 'doughnut',
        data: {
            labels: ['Spent', 'Remaining'],
            datasets: [{
                data: [totalExpenses, budgetData - totalExpenses],
                backgroundColor: ['rgba(255, 99, 132, 0.6)', 'rgba(75, 192, 192, 0.6)'],
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1,
            }],
        },
        options: {
            cutout: '80%',
        },
    });

    // Scroll down to the charts section
    const chartsSection = document.getElementById('charts-section');
    if (chartsSection) {
        chartsSection.scrollIntoView({ behavior: 'smooth' });
    }
}
</script>
</body>
</html>