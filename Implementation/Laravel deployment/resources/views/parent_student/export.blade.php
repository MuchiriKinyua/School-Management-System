<table>
    <thead>
    <tr>
        <th>Adm No</th>
        <th>Student Name</th>
        <th>Class</th>
        <th>Day or Boarding</th>
        <th>Parent Name</th>
        <th>Telephone</th>
        <th>Stream</th>
        <th>Classteacher</th>
        <th>Status</th>
        <th>D.O.B</th>
        <th>Gender</th>
    </tr>
    </thead>
    <tbody>
    @foreach($parentstudent as $item)
        <tr>
            <td>{{ $item->adm_no }}</td>
            <td>{{ $item->student_name }}</td>
            <td>{{ $item->class }}</td>
            <td>{{ $item->day_or_boarding }}</td>
            <td>{{ $item->parent_name }}</td>
            <td>{{ $item->telephone }}</td>
            <td>{{ $item->stream }}</td>
            <td>{{ $item->classteacher }}</td>
            <td>{{ $item->status }}</td>
            <td>{{ $item->dob }}</td>
            <td>{{ $item->gender }}</td>
        </tr>
    @endforeach
    </tbody>
</table>