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

        .attendance-list-container {
            margin-top: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th, .table td {
            padding: 15px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .table td {
            font-size: 1.1em;
        }

        .table td:hover {
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

                        <!-- Attendance List (Directly displayed in the DOM) -->
                        <div class="attendance-list-container" id="attendanceListContainer" style="display: none;">
                            <h4 class="text-center">Members Who Attended</h4>
                            <table class="table" id="attendance-table">
                                <thead>
                                    <tr>
                                        <th>Membership ID</th>
                                        <th>Full Name</th>
                                        <th>Attended Time</th>
                                    </tr>
                                </thead>
                                <tbody id="members-list">
                                    <!-- Members will be listed here -->
                                </tbody>
                            </table>
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
        <?php include '../includes/footer_copyrights.php'; ?>


        </div>
        </div>




  <?php include '../includes/footer.php'; ?>

  <!-- Custom JavaScript -->
  <script>
    // Sample Data: Members and their attendance on specific dates (with Membership ID and Attended Time)
    const attendanceData = {
      "2025-02-22": [
        { id: "M123", name: "John Doe", attendedTime: "8:30 AM" },
        { id: "M124", name: "Jane Smith", attendedTime: "9:00 AM" },
        { id: "M125", name: "Mark Johnson", attendedTime: "9:30 AM" }
      ],
      "2025-02-21": [
        { id: "M126", name: "Emily Brown", attendedTime: "7:30 AM" },
        { id: "M127", name: "Michael Green", attendedTime: "8:00 AM" }
      ],
      "2025-02-20": [
        { id: "M128", name: "David White", attendedTime: "6:45 AM" },
        { id: "M129", name: "Sarah Black", attendedTime: "7:00 AM" }
      ]
    };

    // Function to update the list of members who attended
    function updateAttendanceList(date) {
      const membersList = document.getElementById("members-list");
      const noAttendanceMsg = document.getElementById("no-attendance-msg");
      const attendanceListContainer = document.getElementById("attendanceListContainer");

      membersList.innerHTML = '';  // Clear previous list
      noAttendanceMsg.style.display = 'none'; // Hide no attendance message

      // Check if there are members for the selected date
      if (attendanceData[date]) {
        attendanceData[date].forEach(member => {
          const row = document.createElement("tr");

          const cellId = document.createElement("td");
          cellId.textContent = member.id;
          row.appendChild(cellId);

          const cellName = document.createElement("td");
          cellName.textContent = member.name;
          row.appendChild(cellName);

          const cellTime = document.createElement("td");
          cellTime.textContent = member.attendedTime;
          row.appendChild(cellTime);

          membersList.appendChild(row);
        });
        attendanceListContainer.style.display = 'block'; // Show attendance list container
      } else {
        noAttendanceMsg.style.display = 'block'; // Show no attendance message
        attendanceListContainer.style.display = 'none'; // Hide attendance list container
      }
    }

    // Event Listener for date selection and button click
    document.getElementById("showAttendanceBtn").addEventListener("click", function () {
      const selectedDate = document.getElementById("attendance-date").value;
      if (selectedDate) {
        updateAttendanceList(selectedDate);
      } else {
        alert("Please select a date.");
      }
    });
  </script>

</body>

</html>
