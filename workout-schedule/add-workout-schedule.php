<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Maxfit VIP Gym | Add Workout Schedule</title>

    <?php include_once '../includes/header.php';  ?>

    <style>

        .workout-section {
            overflow-x: auto;
            white-space: nowrap;
            padding-bottom: 10px;
        }
        .workout-list-container {
            display: flex;
            gap: 10px;
            /* border: 2px solid #007bff; */
            border-radius: 10px;
            padding: 10px;
            background: white;
            overflow-x: auto;
        }
        .schedule-section {
            flex: 1;
        }
        h2, h3 {
            color: #333;
        }
        .search-bar {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .workout-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .workout {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            border: 2px solid #007bff;
            border-radius: 10px;
            background: white;
            cursor: grab;
            user-select: none;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out;
            position: relative;
            flex-direction: column;
            width: 100%;
        }
        .workout:hover {
            transform: scale(1.05);
        }
        .workout img {
            width: 50px;
            height: 50px;
            border-radius: 5px;
        }
        .workout input {
            width: 50%;
            padding: 5px;
            border: 1px solid #007bff;
            border-radius: 5px;
            text-align: center;
        }

        .day-container {
            display: flex;
            flex-wrap: wrap;
            gap: 3px;
            /* justify-content: center; */
        }
        .day {
            min-height: 400px;
            width: 250px;
            text-align: center;
            background-color: #e3f2fd;
            font-weight: bold;
            padding: 10px;
            border: 2px solid #007bff;
            border-radius: 10px;
        }
        .delete-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            background: red;
            color: white;
            border: none;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 14px;
            line-height: 20px;
            text-align: center;
            cursor: pointer;
        }
        .reset-btn {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #dc3545;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .reset-btn:hover {
            background-color: #c82333;
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
                    <h2>Workout Schedules</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>Workout Schedule</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Add Workout Schedule</strong>
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
                        <h5>All Standard workout schedules</h5>
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

                    <div class="container-fluid">
                    <div class="workout-section">
                        <!-- <h3>Workouts</h3> -->
                        <input type="text" id="searchBar" class="search-bar" placeholder="Search workouts...">
                        <div class="workout-list-container" id="workoutList"></div>
                    </div>
                    
                    <div class="schedule-section">
                        <!-- <h2>Workout Schedule</h2>
                        <h3>Schedule</h3> -->
                        <label>Work Schedule Title: </label>
                        <input type="text" id="searchBar" class="search-bar" placeholder="Title ...">

                        <div id="schedule" class="day-container"></div>
                        <button class="reset-btn" onclick="resetSchedule()">Reset Schedule</button>
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



   
  <script>
        const daysOfWeek = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
        const workouts = Array.from({ length: 20 }, (_, i) => ({
            name: `Workout ${i + 1}`,
            type: i % 2 === 0 ? "time" : "sets",
            image: "https://www.anytimefitness.com/wp-content/uploads/2024/01/AF-HERO_BenchPress.jpg"
        }));

        const workoutListDiv = document.getElementById("workoutList");
        const scheduleDiv = document.getElementById("schedule");
        const searchBar = document.getElementById("searchBar");

        function renderWorkouts(filter = "") {
            workoutListDiv.innerHTML = "";
            workouts.filter(w => w.name.toLowerCase().includes(filter.toLowerCase())).forEach(workout => {
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

        searchBar.addEventListener("input", (e) => renderWorkouts(e.target.value));
        
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
                        <img src="${workoutData.image}" alt="${workoutData.name}">
                        <span>${workoutData.name}</span>
                    </div>
                    <div>
                        ${workoutData.type === "time" ? '<input type="number" placeholder="Minutes">' : '<input type="number" placeholder="Sets"><input type="number" placeholder="Reps">'}
                    </div>
                    <button class="delete-btn">×</button>
                `;
                workoutItem.querySelector(".delete-btn").addEventListener("click", () => workoutItem.remove());
                dayDiv.appendChild(workoutItem);
            });
            
            scheduleDiv.appendChild(dayDiv);
        });

        function resetSchedule() {
            document.querySelectorAll(".day").forEach(day => day.innerHTML = day.dataset.day);
        }

        renderWorkouts();
    </script>

</body>

</html>
