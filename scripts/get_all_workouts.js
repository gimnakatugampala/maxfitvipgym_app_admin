document.addEventListener("DOMContentLoaded", function () {
    const daysOfWeek = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
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
            dayDiv.textContent = day;
            dayDiv.dataset.day = day;

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

            scheduleDiv.appendChild(dayDiv);
        });
    }

    function resetSchedule() {
        document.querySelectorAll(".day").forEach(day => {
            day.innerHTML = day.dataset.day;
        });
    }

    // Attach events and initialize
    searchBar.addEventListener("input", (e) => renderWorkouts(e.target.value));
    renderDaysOfWeek();
    fetchWorkouts();
    window.resetSchedule = resetSchedule; // make resetSchedule available to the button
});