const monthYear = document.getElementById("monthYear");
const daysContainer = document.getElementById("days");
const prevButton = document.getElementById("prev");
const nextButton = document.getElementById("next");

let currentDate = new Date();

function renderCalendar(date) {
  const year = date.getFullYear();
  const month = date.getMonth();

  // Set month and year
  const monthNames = [
    "January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
  ];
  monthYear.textContent = `${monthNames[month]} ${year}`;

  // Clear previous days
  daysContainer.innerHTML = "";

  // Get first and last day of the month
  const firstDay = new Date(year, month, 1).getDay();
  const lastDate = new Date(year, month + 1, 0).getDate();

  // Fill in empty days before first day
  for (let i = 0; i < firstDay; i++) {
    const emptyDay = document.createElement("span");
    emptyDay.classList.add("empty");
    daysContainer.appendChild(emptyDay);
  }

  // Fill in days of the month
  for (let i = 1; i <= lastDate; i++) {
    const day = document.createElement("span");
    day.textContent = i;
    daysContainer.appendChild(day);
  }
}

function changeMonth(offset) {
  currentDate.setMonth(currentDate.getMonth() + offset);
  renderCalendar(currentDate);
}

// Initial render
renderCalendar(currentDate);

// Event listeners
prevButton.addEventListener("click", () => changeMonth(-1));
nextButton.addEventListener("click", () => changeMonth(1));
