<h1>All Petty Cash Requests</h1>

@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

<table>
    <thead>
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
        @foreach($requests as $request)
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
