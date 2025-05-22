$(document).ready(function() {
    function loadWorkouts() {
        $.ajax({
            url: '../api/get_workouts.php',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                if(response.success) {
                    const workouts = response.data;
                    console.log(workouts)
                    let rows = '';
                    if(workouts.length > 0) {
                        workouts.forEach(function(workout) {
                            const imgSrc = "../" + workout.img;
                            const name = $('<div>').text(workout.name).html(); // escape text
                            const workoutType = $('<div>').text(workout.workout_type_name).html();
                            const editUrl = "../workouts/edit_workout.php?id=" + encodeURIComponent(workout.id);

                            rows += `
                                <tr class="gradeX">
                                    <td><img alt="image" class="rounded-circle" src="${imgSrc}" style="width:40px; height:40px; object-fit:cover;" /></td>
                                    <td>${name}</td>
                                    <td>${workoutType}</td>
                                    <td class="center">
                                        <a href="${editUrl}" type="button" class="btn btn-success">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            `;
                        });
                    } else {
                        rows = `<tr><td colspan="4" class="text-center">No workouts found.</td></tr>`;
                    }
                    $('#workoutTableBody').html(rows);
                    $('.footable').footable(); // re-init footable if needed
                } else {
                    alert('Failed to load workouts.');
                }
            },
            error: function() {
                alert('Error loading workouts from server.');
            }
        });
    }

    loadWorkouts(); // call on page load
});
