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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="font-sans antialiased">

    @include('layouts.navigation')

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        New request
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                            <input type="date" class="form-control" id="dateNeeded" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" name="status" required>
                                <option value="" disabled selected>Select Status</option>
                                <option value="pending">Pending</option>
                                <option value="approved">Approved</option>
                                <option value="denied">Denied</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <h1>All Petty Cash Requests</h1>

    @if (session('success'))
        <div>{{ session('success') }}</div>
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
                        <form action="{{ route('pettycash.destroy', $request->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
