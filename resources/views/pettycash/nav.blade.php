<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Your Application</title>
    <style>
        /* Custom styles for the sidebar */
        body {
            display: flex;
        }

        .sidebar {
            min-height: 100vh;
            width: 250px;
            /* Width of the sidebar */
            background-color: #343a40;
            /* Dark background */
            color: white;
            display: block;
            /* Default to block */
        }

        .sidebar a {
            color: white;
            /* Link color */
        }

        .sidebar a:hover {
            background-color: #495057;
            /* Hover background color */
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h2 class="text-center">Petty Cash System</h2>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="#dashboard">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#submit-request">Submit Request</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#view-requests">View Requests</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#manage-users">Manage Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#settings">Settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#logout">Logout</a>
            </li>
        </ul>
    </div>

    <div class="content p-4">
        <button class="btn btn-primary" id="toggleSidebar">Toggle Sidebar</button>
        <h1>Welcome to the Petty Cash System</h1>
        <p>Here you can submit requests and manage your petty cash.</p>
    </div>

    <script>
        $(document).ready(function() {
            $('#toggleSidebar').on('click', function() {
                $('.sidebar').toggle(); // Toggle visibility of the sidebar
            });
        });
    </script>
</body>

</html>
