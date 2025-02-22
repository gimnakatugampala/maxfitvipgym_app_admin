<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Maxfit VIP Gym | Attendance</title>

    <?php include_once '../includes/header.php';  ?>


    <style>
   
    .no-attendance {
      color: #ffc107;
    }

    .modal-content {
      border-radius: 10px;
    }

    .list-group-item {
      padding: 15px;
      font-size: 1.2em;
    }

    .list-group-item:hover {
      background-color: #f0f0f0;
      cursor: pointer;
    }
  </style>


</head>

<body>

    <div id="wrapper">

        <?php include '../includes/sidebar.php'; ?>

        <div id="page-wrapper" class="gray-bg">
            
        <?php include '../includes/navbar.php'; ?>


            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Members</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Members</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Attendance</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Search Attendance</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#" class="dropdown-item">Config option 1</a>
                                </li>
                                <li><a href="#" class="dropdown-item">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                    <div class="container">
                    <div class="row justify-content-center">
                    <div class="col-md-8">
                        <!-- Card for the Date Picker -->
                        <div class="card shadow-sm mb-4">
                        <div class="card-header text-center">
                            <h3 class="mb-0">Select Workout Date</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                            <label for="attendance-date">Select a Date:</label>
                            <input type="date" class="form-control" id="attendance-date">
                            </div>
                            <button class="btn btn-primary btn-block" id="showAttendanceBtn">Show Members Attended</button>
                        </div>
                        </div>

                        <!-- Modal for Attendance List -->
                        <div class="modal fade" id="attendanceModal" tabindex="-1" role="dialog" aria-labelledby="attendanceModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="attendanceModalLabel">Members Who Attended</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <ul class="list-group" id="members-list">
                                <!-- Members will be listed here -->
                                </ul>
                                <p id="no-attendance-msg" class="text-center no-attendance" style="display: none;">No members attended on this date.</p>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>

                    </div>
                </div>
            </div>
            </div>
        </div>
        <?php include '../includes/footer_copyrights.php'; ?>


        </div>
        </div>




  <?php include '../includes/footer.php'; ?>

  <!-- Custom JavaScript -->
  <script>
    // Sample Data: Members and their attendance on specific dates
    const attendanceData = {
      "2025-02-22": ["John Doe", "Jane Smith", "Mark Johnson"],
      "2025-02-21": ["Emily Brown", "Michael Green"],
      "2025-02-20": ["David White", "Sarah Black"]
    };

    // Function to update the list of members who attended
    function updateAttendanceList(date) {
      const membersList = document.getElementById("members-list");
      const noAttendanceMsg = document.getElementById("no-attendance-msg");
      membersList.innerHTML = '';  // Clear previous list
      noAttendanceMsg.style.display = 'none'; // Hide no attendance message

      // Check if there are members for the selected date
      if (attendanceData[date]) {
        attendanceData[date].forEach(member => {
          const listItem = document.createElement("li");
          listItem.classList.add("list-group-item");
          listItem.textContent = member;
          membersList.appendChild(listItem);
        });
      } else {
        noAttendanceMsg.style.display = 'block'; // Show no attendance message
      }
    }

    // Event Listener for date selection and button click
    document.getElementById("showAttendanceBtn").addEventListener("click", function () {
      const selectedDate = document.getElementById("attendance-date").value;
      if (selectedDate) {
        updateAttendanceList(selectedDate);
        $('#attendanceModal').modal('show'); // Show the modal
      } else {
        alert("Please select a date.");
      }
    });
  </script>



</body>

</html>
