function validateInput() {
  // Get values from each input
  const dateInput = document.getElementById("datetime").value;
  const timeInput = document.getElementById("time").value;
  const dayNightSelect = document.getElementById("daynight");
  const dayNight = dayNightSelect.value;

  // Basic validation (replace with your desired validation logic)
  if (!isValidDate(dateInput) || !timeInput) {
    alert("Please enter a valid date and time!");
    return;
  }

  // Combine and format the data (modify as needed)
  const formattedData = `${dateInput} ${timeInput} (${dayNight})`;

  // Display or submit the formatted data (replace with your logic)
  alert(formattedData);
  // You can also submit data to a server using AJAX or form submission here
}

// Optional function to validate date format (implement your own logic)
function isValidDate(date) {
  // This is a basic example, replace with a robust date validation function
  const regex = /^\d{4}-\d{2}-\d{2}$/;
  return regex.test(date);
}

// let checkDate = function() {
//   var inputDate = new Date(document.getElementById("date").value);
//   var yesterday = new Date();
//   yesterday.setDate(yesterday.getDate() - 1); // Get yesterday's date
  
//     var inputDateString = inputDate.toDateString();
//     var yesterdayDateString = yesterday.toDateString();
//   if (inputDateString === yesterdayDateString) {
//       // document.getElementById("error-msg").innerText = "Selected date is yesterday. Please choose a different date.";
//       alert("Yesterday date is selected");

//       // return false;
//     } else {
//       // document.getElementById("error-msg").innerText = "";
//       alert("your ticket is book");
//       // return true;
//   }
// }


// document.getElementById("date").addEventListener("change", checkDate)
// let checkDate = function() {
//   var inputDate = new Date(document.getElementById("date").value);
//   var today = new Date(); // Get today's date
  
  // Remove the time portion from both dates for accurate comparison
  // inputDate.setHours(0, 0, 0, 0);
  // today.setHours(0, 0, 0, 0);
  
//   if (inputDate < today) {
//       alert("Invalid date. Please select a date on or after today.");
//   } else {
//       alert("Your ticket is booked");
//   }
// }

// let btn = document.getElementById("btn");
// btn.addEventListener("click",checkDate);


   document.getElementById('date').min = new Date().toISOString().substring(0,16);

   var maxDate = new Date();
   maxDate.setDate(maxDate.getDate()+5);
   document.getElementById('date').max = maxDate.toISOString().substring(0,16);
   
  
// let btn = document.getElementById("btn");
// btn.addEventListener("click",checkDate);
