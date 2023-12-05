<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Expenses Reminder</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #2C3338;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        .add-reminder {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        input {
            flex: 1;
            padding: 8px;
        }

        button {
            padding: 8px 16px;
            background-color: #D44179;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .reminder-item {
            display: flex;
            justify-content: space-between;
            padding: 8px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .reminder-item:hover {
            background-color: #f9f9f9;
        }

        .remove-icon {
            cursor: pointer;
            display: none;
        }

        .reminder-item:hover .remove-icon {
            display: inline-block;
            color: red;
        }
        a::before {
            content: "*";
            margin-right: 4px;
            color: #D44179;
        }
        img[src$="340.png"]:hover {
            transform: scale(1.3);
            transition: transform 0.3s;
        }
        img[src$="Palestine.jpg"]:hover {
            transform: scale(1.3);
            transition: transform 0.3s;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Remind me to pay..</h1>
        <div id="reminderList">
            <!-- Reminder items will be added here dynamically -->
        </div>
        <div class="add-reminder">
            <a>
            <input required type="text" id="reminderInput" placeholder="Reminder">
    </a>
    <a>
            <input required type="date" id="dueDateInput">
    </a>
            <input type="time" id="timeInput">
            <input type="number" id="amountInput" placeholder="Amount">
            <button onclick="addReminder()">Add</button>
        </div>
    </div>
    <img style="position: absolute; right: 10px; top: 10px; width: 100px; height: 50px;" src="Palestine.jpg" alt="Corner Image">
    <a href="main.php">
    <img style="position: absolute; left: 10px; top: 10px; width: 100px; height: 50px;" src="340.png" alt="Corner Image">
</a>
    <script>
        // Sample data for initial reminders
let reminders = [];

// Function to render reminders on the page
function renderReminders() {
    const reminderList = document.getElementById("reminderList");
    reminderList.innerHTML = ""; // Clear existing list

    reminders.forEach((reminder, index) => {
        const reminderItem = document.createElement("div");
        reminderItem.className = "reminder-item";
        
        const reminderText = document.createElement("span");
        reminderText.innerText = `${reminder.text} - ${reminder.date}`;
        
        const removeIcon = document.createElement("span");
        removeIcon.className = "remove-icon";
        removeIcon.innerHTML = "&#10006;";
        removeIcon.addEventListener("click", () => removeReminder(index));
        
        reminderItem.appendChild(reminderText);
        reminderItem.appendChild(removeIcon);
        
        reminderList.appendChild(reminderItem);
    });
}

// Function to add a new reminder
function addReminder() {
    const reminderInput = document.getElementById("reminderInput");
    const dueDateInput = document.getElementById("dueDateInput");
    const timeInput = document.getElementById("timeInput");
    const amountInput = document.getElementById("amountInput");

    const reminderText = reminderInput.value.trim();
    const dueDate = dueDateInput.value;
    const time = timeInput.value;
    const amount = amountInput.value.trim();

    // Validate dueDate format
    if (!isValidDate(dueDate)) {
        alert("Invalid date format. Please use YYYY-MM-DD.");
        return;
    }

    const newReminder = {
        text: amount ? `${reminderText} - ${amount}` : reminderText,
        date: new Date(`${dueDate}${time ? ' ' + time : ''}`).toLocaleString()
    };

    reminders.push(newReminder);
    reminderInput.value = "";
    dueDateInput.value = "";
    timeInput.value = "";
    amountInput.value = "";
    renderReminders(); // Update the displayed reminders
}

// Function to validate date format
function isValidDate(dateString) {
    const regex = /^\d{4}-\d{2}-\d{2}$/;
    return regex.test(dateString);
}

// Function to remove a reminder
function removeReminder(index) {
    reminders.splice(index, 1);
    renderReminders(); // Update the displayed reminders
}

// Initial rendering of reminders on page load
renderReminders();
    </script>
</body>
</html>
