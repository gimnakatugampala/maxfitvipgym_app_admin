$(document).ready(function () {
    function loadAdmins() {
        $.ajax({
            url: '../api/get_admins.php',
            method: 'GET',
            success: function (data) {
                let html = '';
                if (data.length > 0) {
                    data.forEach(function (admin, index) {
                        html += `
                            <tr>
                                <td>${index + 1}</td> <!-- Display serial number instead of DB ID -->
                                <td>${admin.full_name}</td>
                                <td>${admin.email || 'N/A'}</td>
                                <td>${admin.created_at}</td>
                                <td>
                                    ${admin.is_active == 1 
                                        ? '<span class="badge badge-primary">Active</span>' 
                                        : '<span class="badge badge-danger">Inactive</span>'}
                                </td>
                                <td>System</td> <!-- Placeholder for created_by -->
                                <td class="center">
                                    <button class="btn btn-danger" type="button"><i class="fa fa-times"></i></button>
                                    <button class="btn btn-primary" type="button"><i class="fa fa-check"></i></button>
                                </td>
                            </tr>
                        `;
                    });
                } else {
                    html = '<tr><td colspan="7" class="text-center">No admins found.</td></tr>';
                }

                $('#adminList').html(html);
                $('.footable').trigger('footable_redraw');
            },
            error: function () {
                $('#adminList').html('<tr><td colspan="7" class="text-danger text-center">Error loading data.</td></tr>');
            }
        });
    }

    loadAdmins(); // Initial fetch
});
