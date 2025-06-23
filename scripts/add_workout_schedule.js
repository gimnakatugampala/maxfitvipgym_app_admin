// add_schedule.js

function collectScheduleData(workoutsData) {
    const schedule = {};
    const restDays = [];

    const days = document.querySelectorAll('.day');

    days.forEach(dayDiv => {
        const dayName = dayDiv.dataset.day;
        const isRestDay = dayDiv.classList.contains('rest-day');

        if (isRestDay) {
            restDays.push(dayName);
            return;
        }

        const workouts = [];
        const workoutDivs = dayDiv.querySelectorAll('.workout');

        workoutDivs.forEach((wDiv, index) => {
            const name = wDiv.querySelector("span").textContent;
            const workout = workoutsData.find(w => w.name === name);
            if (!workout) return;

            const inputs = wDiv.querySelectorAll('input');
            const data = {
                workout_id: workout.id,
                order_index: index + 1
            };

            if (workout.type === "sets") {
                data.sets = inputs[0].value;
                data.reps = inputs[1].value;
            } else {
                data.duration_minutes = inputs[0].value;
            }

            workouts.push(data);
        });

        if (workouts.length > 0) {
            schedule[dayName] = workouts;
        }
    });

    return {
        title: document.querySelector('#scheduleTitle').value,
        schedule,
        rest_days: restDays
    };
}

function saveSchedule(workoutsData) {
    const payload = collectScheduleData(workoutsData);

    fetch('../api/add_workout_schedule.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(payload)
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            alert('Schedule saved!');
        } else {
            alert('Failed: ' + data.message);
        }
    })
    .catch(err => {
        console.error('Error saving schedule:', err);
        alert('An error occurred while saving.');
    });
}

// Attach event listener (you can call this from your main script after DOM is ready)
function initializeScheduleSaveButton(workoutsData) {
    const saveBtn = document.querySelector('#saveScheduleBtn');
    if (saveBtn) {
        saveBtn.addEventListener('click', () => saveSchedule(workoutsData));
    }
}

// Export for other scripts if using modules
// export { initializeScheduleSaveButton };
