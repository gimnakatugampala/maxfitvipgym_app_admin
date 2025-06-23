document.addEventListener("DOMContentLoaded", () => {
    const urlParams = new URLSearchParams(window.location.search);
    const scheduleId = urlParams.get("id");

    if (!scheduleId) {
        alert("Schedule ID missing");
        return;
    }

    fetch(`../api/get_edit_workout_schedule.php?id=${scheduleId}`)
        .then(res => res.json())
        .then(data => {
            if (data.status === "success") {
                document.getElementById("scheduleTitle").value = data.schedule.title;
                renderScheduleWithDetails(data.details);
            } else {
                alert("Failed to load schedule");
            }
        })
        .catch(err => {
            console.error("Fetch error:", err);
            alert("Error loading schedule");
        });
});

function renderScheduleWithDetails(details) {
    const daysOfWeek = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
    const scheduleDiv = document.getElementById("schedule");
    scheduleDiv.innerHTML = ""; // Clear previous

    daysOfWeek.forEach(day => {
        const dayDiv = document.createElement("div");
        dayDiv.classList.add("day");
        dayDiv.dataset.day = day;

        const dayWorkouts = details.filter(d => d.day_name === day);

        // Check if rest day
        if (dayWorkouts.length === 0) {
            dayDiv.classList.add("rest-day");
            dayDiv.innerHTML = `<strong>${day}</strong><br><em>Rest Day</em>`;
        } else {
            const dayHeader = document.createElement("div");
            dayHeader.innerHTML = `<strong>${day}</strong>`;
            dayDiv.appendChild(dayHeader);

            dayDiv.addEventListener("dragover", (e) => e.preventDefault());
            dayDiv.addEventListener("drop", handleDrop);

            dayWorkouts.forEach(workout => {
                const workoutDiv = document.createElement("div");
                workoutDiv.classList.add("workout");

                const isTimeBased = workout.duration_minutes > 0;

                workoutDiv.innerHTML = `
                    <div><span>${workout.workout_name}</span></div>
                    <div>
                        ${isTimeBased
                            ? `<input type="number" placeholder="Minutes" value="${workout.duration_minutes}">`
                            : `
                                <input type="number" placeholder="Sets" value="${workout.sets}">
                                <input type="number" placeholder="Reps" value="${workout.reps}">
                              `
                        }
                    </div>
                    <button class="delete-btn">×</button>
                `;

                workoutDiv.querySelector(".delete-btn").addEventListener("click", () => workoutDiv.remove());

                dayDiv.appendChild(workoutDiv);
            });
        }

        scheduleDiv.appendChild(dayDiv);
    });
}

function handleDrop(e) {
    e.preventDefault();
    const workoutData = JSON.parse(e.dataTransfer.getData("text/plain"));

    const workoutItem = document.createElement("div");
    workoutItem.classList.add("workout");

    workoutItem.innerHTML = `
        <div><span>${workoutData.name}</span></div>
        <div>
            ${workoutData.type === "time"
                ? `<input type="number" placeholder="Minutes">`
                : `<input type="number" placeholder="Sets"><input type="number" placeholder="Reps">`
            }
        </div>
        <button class="delete-btn">×</button>
    `;

    workoutItem.querySelector(".delete-btn").addEventListener("click", () => workoutItem.remove());

    e.currentTarget.appendChild(workoutItem);
}

function initializeScheduleSaveButton() {
    const saveBtn = document.getElementById("saveScheduleBtn");
    if (!saveBtn) return;

    saveBtn.addEventListener("click", () => {
        const title = document.getElementById("scheduleTitle").value.trim();
        const scheduleData = [];

        document.querySelectorAll(".day").forEach(dayDiv => {
            const day = dayDiv.dataset.day;
            const workouts = [];

            dayDiv.querySelectorAll(".workout").forEach(workoutDiv => {
                const name = workoutDiv.querySelector("span").textContent.trim();
                const inputs = workoutDiv.querySelectorAll("input");
                let sets = 0, reps = 0, duration = 0;

                if (inputs.length === 1) {
                    duration = parseInt(inputs[0].value) || 0;
                } else if (inputs.length === 2) {
                    sets = parseInt(inputs[0].value) || 0;
                    reps = parseInt(inputs[1].value) || 0;
                }

                workouts.push({ name, sets, reps, duration });
            });

            scheduleData.push({ day, workouts });
        });

        // Submit via fetch to your save API
        fetch('../api/update_workout_schedule.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                schedule_id: SCHEDULE_ID_FROM_URL, // You must extract this earlier
                title,
                schedule: scheduleData
            })
        }).then(res => res.json())
          .then(data => {
              if (data.status === "success") {
                  alert("Schedule updated successfully!");
                  window.location.href = "workout_schedule_list.php";
              } else {
                  alert("Error updating schedule");
              }
          }).catch(err => {
              console.error("Error:", err);
              alert("Request failed");
          });
    });
}
