<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Adm No</th>
        <th>Parent Name</th>
        <th>Telephone</th>
    </tr>
    </thead>
    <tbody>
    @foreach($parents as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->adm_no }}</td>
            <td>{{ $item->parent_name }}</td>
            <td>{{ $item->telephone }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
