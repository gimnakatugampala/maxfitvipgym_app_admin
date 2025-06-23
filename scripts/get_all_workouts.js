document.addEventListener("DOMContentLoaded", function () {
    const daysOfWeek = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
    const restDays = ["Sunday", "Wednesday"];

    let workouts = [];

    const workoutListDiv = document.getElementById("workoutList");
    const scheduleDiv = document.getElementById("schedule");
    const searchBar = document.getElementById("searchBar");

    function renderWorkouts(filter = "") {
        workoutListDiv.innerHTML = "";
        const query = filter.trim().toLowerCase();

        workouts
            .filter(w => w.name.toLowerCase().includes(query))
            .forEach(workout => {
                const workoutDiv = document.createElement("div");
                workoutDiv.classList.add("workout");

                const img = document.createElement("img");
                img.src = workout.image;
                img.alt = workout.name;

                const text = document.createElement("span");
                text.textContent = workout.name;

                workoutDiv.appendChild(img);
                workoutDiv.appendChild(text);
                workoutDiv.draggable = true;
                workoutDiv.dataset.type = workout.type;

                workoutDiv.addEventListener("dragstart", (e) => {
                    e.dataTransfer.setData("text/plain", JSON.stringify(workout));
                });

                workoutListDiv.appendChild(workoutDiv);
            });
    }

    function fetchWorkouts() {
        fetch('../api/get_all_workouts.php')
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    workouts = data.workouts;
                    renderWorkouts();
                    initializeScheduleSaveButton(workouts);
                } else {
                    console.error("Workout fetch failed");
                }
            })
            .catch(err => console.error("Error fetching workouts", err));
    }

function renderDaysOfWeek() {
    daysOfWeek.forEach(day => {
        const dayDiv = document.createElement("div");
        dayDiv.classList.add("day");
        dayDiv.dataset.day = day;

        const header = document.createElement("div");
        header.style.marginBottom = "10px";

        const label = document.createElement("label");
        label.style.display = "flex";
        label.style.alignItems = "center";
        label.style.justifyContent = "center";

        const checkbox = document.createElement("input");
        checkbox.type = "checkbox";
        checkbox.style.marginRight = "5px";
        checkbox.checked = false;

        const span = document.createElement("span");
        span.textContent = `${day}`;
        span.style.color = "#999";

        label.appendChild(checkbox);
        label.appendChild(span);
        header.appendChild(label);

        dayDiv.appendChild(header);

        // Initial behavior: allow drop
        setupDroppable(dayDiv, checkbox);

        // Toggle behavior on checkbox change
        checkbox.addEventListener("change", () => {
            if (checkbox.checked) {
                // Clear workouts & disable drag-drop
                [...dayDiv.querySelectorAll(".workout")].forEach(el => el.remove());
                dayDiv.classList.add("rest-day");
            } else {
                // Enable drag-drop again
                dayDiv.classList.remove("rest-day");
            }
            setupDroppable(dayDiv, checkbox); // Re-apply drag-drop logic
        });

        scheduleDiv.appendChild(dayDiv);
    });
}

function setupDroppable(dayDiv, checkbox) {
    // Remove previous handlers
    dayDiv.ondragover = null;
    dayDiv.ondrop = null;

    if (!checkbox.checked) {
        dayDiv.addEventListener("dragover", (e) => e.preventDefault());

        dayDiv.addEventListener("drop", (e) => {
            e.preventDefault();
            const workoutData = JSON.parse(e.dataTransfer.getData("text/plain"));

            const workoutItem = document.createElement("div");
            workoutItem.classList.add("workout");

            workoutItem.innerHTML = `
                <div style="display: flex; align-items: center; gap: 10px;">
                    <span>${workoutData.name}</span>
                </div>
                <div>
                    ${
                        workoutData.type === "time"
                            ? '<input type="number" placeholder="Minutes">'
                            : '<input type="number" placeholder="Sets"><input type="number" placeholder="Reps">'
                    }
                </div>
                <button class="delete-btn">×</button>
            `;

            workoutItem.querySelector(".delete-btn").addEventListener("click", () => workoutItem.remove());
            dayDiv.appendChild(workoutItem);
        });
    }
}


function resetSchedule() {
    document.querySelectorAll(".day").forEach(day => {
        // Reset content to show the header only (day name with checkbox)
        const header = day.querySelector("div"); // first child is the header
        const checkbox = header.querySelector("input[type='checkbox']");

        // Uncheck the checkbox and remove rest-day style
        checkbox.checked = false;
        day.classList.remove("rest-day");

        // Remove all other workout elements
        [...day.querySelectorAll(".workout")].forEach(el => el.remove());

        // Re-apply drag-drop handlers
        setupDroppable(day, checkbox);
    });
}


    // Attach events and initialize
    searchBar.addEventListener("input", (e) => renderWorkouts(e.target.value));
    renderDaysOfWeek();
    fetchWorkouts();
    window.resetSchedule = resetSchedule; // make resetSchedule available to the button
});