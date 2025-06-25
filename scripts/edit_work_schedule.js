document.addEventListener("DOMContentLoaded", () => {
    const urlParams = new URLSearchParams(window.location.search);
    const scheduleId = urlParams.get("id");

    if (!scheduleId) {
        Swal.fire("Error", "Schedule ID missing", "error");
        return;
    }

    fetch(`../api/get_edit_workout_schedule.php?id=${scheduleId}`)
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                document.getElementById("scheduleTitle").value = data.schedule.title;
                renderScheduleWithDetails(data.details, data.rest_days);
            } else {
                Swal.fire("Failed", "Failed to load schedule", "error");
            }
        })
        .catch(err => {
            console.error("Fetch error:", err);
            Swal.fire("Error", "Error loading schedule", "error");
        });
});

function renderScheduleWithDetails(details, restDays = []) {
    const daysOfWeek = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
    const scheduleDiv = document.getElementById("schedule");
    scheduleDiv.innerHTML = "";

    daysOfWeek.forEach(day => {
        const isRest = restDays.includes(day);
        const dayDiv = document.createElement("div");
        dayDiv.classList.add("day");
        dayDiv.dataset.day = day;

        if (isRest) {
            dayDiv.classList.add("rest-day");
        }

        const dayHeader = document.createElement("div");
        dayHeader.innerHTML = `
            <strong>${day}</strong>
            <label style="margin-left:10px;">
                <input type="checkbox" class="rest-toggle" ${isRest ? "checked" : ""}>
                Rest Day
            </label>
        `;
        dayDiv.appendChild(dayHeader);

        const dayWorkouts = details[day] || [];

        dayDiv.addEventListener("dragover", e => {
            if (!dayDiv.classList.contains("rest-day")) e.preventDefault();
        });
        dayDiv.addEventListener("drop", handleDrop);

        if (!isRest) {
            dayWorkouts.forEach(workout => {
                const workoutDiv = document.createElement("div");
                workoutDiv.classList.add("workout");
                workoutDiv.dataset.workoutId = workout.workout_id;

                const isTimeBased = parseInt(workout.duration_minutes) > 0;

                workoutDiv.innerHTML = `
                    <div style="display:flex;align-items:center;gap:10px;">
                        <img src="${workout.workout_img}" alt="${workout.workout_name}" width="40" height="40">
                        <span>${workout.workout_name}</span>
                    </div>
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

        dayHeader.querySelector(".rest-toggle").addEventListener("change", function () {
            const checked = this.checked;
            if (checked) {
                dayDiv.classList.add("rest-day");
                dayDiv.querySelectorAll(".workout").forEach(w => w.remove());
            } else {
                dayDiv.classList.remove("rest-day");
            }
        });

        scheduleDiv.appendChild(dayDiv);
    });
}

function handleDrop(e) {
    e.preventDefault();
    const workoutData = JSON.parse(e.dataTransfer.getData("text/plain"));
    const imgSrc = workoutData.image || 'https://via.placeholder.com/40';

    const workoutItem = document.createElement("div");
    workoutItem.classList.add("workout");
    workoutItem.dataset.workoutId = workoutData.workout_id || 0;

    workoutItem.innerHTML = `
        <div style="display:flex;align-items:center;gap:10px;">
            <img src="${imgSrc}" alt="${workoutData.name}" width="40" height="40" style="border-radius:5px;">
            <span>${workoutData.name}</span>
        </div>
        <div>
            ${workoutData.type === "time"
                ? `<input type="number" placeholder="Minutes">`
                : `
                    <input type="number" placeholder="Sets">
                    <input type="number" placeholder="Reps">
                `
            }
        </div>
        <button class="delete-btn">×</button>
    `;
    workoutItem.querySelector(".delete-btn").addEventListener("click", () => workoutItem.remove());

    e.currentTarget.appendChild(workoutItem);
}

function getScheduleIdFromURL() {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get("id");
}

function initializeScheduleSaveButton() {
    const saveBtn = document.getElementById("saveScheduleBtn");
    if (!saveBtn) return;

    saveBtn.addEventListener("click", () => {
        const title = document.getElementById("scheduleTitle").value.trim();
        const scheduleId = getScheduleIdFromURL();
        const scheduleData = [];

        document.querySelectorAll(".day").forEach(dayDiv => {
            const day = dayDiv.dataset.day;
            const isRest = dayDiv.classList.contains("rest-day");
            const workouts = [];

            if (!isRest) {
                dayDiv.querySelectorAll(".workout").forEach(workoutDiv => {
                    const name = workoutDiv.querySelector("span").textContent.trim();
                    const inputs = workoutDiv.querySelectorAll("input");
                    const workout_id = parseInt(workoutDiv.dataset.workoutId) || null;

                    let sets = 0, reps = 0, duration = 0;

                    if (inputs.length === 1) {
                        duration = parseInt(inputs[0].value) || 0;
                    } else if (inputs.length === 2) {
                        sets = parseInt(inputs[0].value) || 0;
                        reps = parseInt(inputs[1].value) || 0;
                    }

                    workouts.push({ workout_id, name, sets, reps, duration });
                });
            }

            scheduleData.push({ day, workouts });
        });

        fetch('../api/update_workout_schedule.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                schedule_id: parseInt(scheduleId),
                title,
                schedule: scheduleData
            })
        })
        .then(res => res.json())
        .then(data => {
            if (data.status === "success") {
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: "Schedule updated successfully!",
                }).then(() => {
                    window.location.href = "../workout-schedule/";
                });
            } else {
                Swal.fire("Error", data.message || "Error updating schedule", "error");
            }
        })
        .catch(err => {
            console.error("Request failed:", err);
            Swal.fire("Error", "Failed to update schedule", "error");
        });
    });
}

initializeScheduleSaveButton();
