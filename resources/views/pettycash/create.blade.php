<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-color:f1f3f6">
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar bg-dark text-white" style="min-height: 100vh; width: 250px;">
            <!-- Company Logo -->
            <div class="text-center py-4">
                <img src="path/to/your/logo.png" alt="Company Logo" class="img-fluid" style="max-width: 150px;">
            </div>
            <h2 class="text-center">Petty Cash</h2>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('pettycash.create') }}">Dashboard</a>
                </li>
                {{-- <li class="nav-item"> --}}
                {{-- <a class="nav-link text-white" href="#submit-request" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Submit Request</a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link text-white" href="#view-requests">View Requests</a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link text-white" href="#manage-users">Manage Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#settings">Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#logout">Logout</a>
                </li> --}}
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-grow-1 p-4">
            @include('layouts.navigation')
            {{-- @include('pettycash.nav') --}}

            <!-- Button trigger modal -->
            <div class="container mt-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    New Request
                </button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New Request</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="pettyCashForm" method="POST" action="{{ route('pettycash.store') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="requesterName" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="requester_name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="amountRequested" class="form-label">Amount Requested</label>
                                    <input type="number" class="form-control" name="amount" required>
                                </div>
                                <div class="mb-3">
                                    <label for="reason" class="form-label">Reason for Request</label>
                                    <textarea class="form-control" name="reason" rows="3" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="dateNeeded" class="form-label">Date Needed</label>
                                    <input type="date" class="form-control" name="dateNeeded" required>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <input type="text" class="form-control" id="status" readonly>
                                </div>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Requests Table -->
            <div class="container mt-4">
                <h1>All Petty Cash Requests</h1>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Requester Name</th>
                            <th>Amount</th>
                            <th>Reason</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requests as $request)
                            <tr>
                                <td>{{ $request->id }}</td>
                                <td>{{ $request->requester_name }}</td>
                                <td>{{ $request->amount }}</td>
                                <td>{{ $request->reason }}</td>
                                <td>{{ $request->status }}</td>
                                <td>
                                    <!-- Delete form with confirmation dialog -->
                                    <form action="{{ route('pettycash.destroy', $request->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirmDelete()">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-danger text-white p-1 btn">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- JavaScript to handle delete confirmation -->
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this request? This action cannot be undone.');
        }
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
