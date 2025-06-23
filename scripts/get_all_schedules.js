document.addEventListener("DOMContentLoaded", () => {
    fetch('../api/get_all_schedules.php')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                populateScheduleTable(data.data);
            } else {
                console.error("Failed to fetch schedules");
            }
        })
        .catch(err => {
            console.error("Error fetching schedules:", err);
        });
});

function populateScheduleTable(schedules) {
    const tbody = document.querySelector("#scheduleTableBody");
    tbody.innerHTML = "";

    schedules.forEach(schedule => {
        const tr = document.createElement("tr");

        tr.innerHTML = `
            <td>${schedule.id}</td>
            <td>${escapeHtml(schedule.title)}</td>
            <td>
                <span class="badge badge-primary">${schedule.workout_days} workout day${schedule.workout_days != 1 ? 's' : ''}</span>
                <span class="badge badge-danger">${schedule.rest_days} rest day${schedule.rest_days != 1 ? 's' : ''}</span>
            </td>
            <td>
                <a href="edit-work-schedule.php?id=${schedule.id}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
            </td>
        `;
        tbody.appendChild(tr);
    });
}

// Helper function to prevent XSS from user input
function escapeHtml(text) {
    return text.replace(/[&<>"']/g, function (match) {
        return ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        })[match];
    });
}
