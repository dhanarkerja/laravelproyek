<table class="table">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Added By</th>
    </tr>
    @foreach ($data as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->added_by }}</td>
            <td>
                <button class="btn btn-warning" onClick="show({{ $item->id }})">Edit</button>
                <button class="btn btn-danger" onClick="destroy({{ $item->id }})">Delete</button>
            </td>
        </tr>
    @endforeach
</table>
