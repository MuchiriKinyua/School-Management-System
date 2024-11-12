<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Adm No</th>
        <th>Student Name</th>
        <th>Class</th>
        <th>Day or Boarding</th>
        <th>Stream</th>
        <th>Class Teacher</th>
        <th>Status</th>
        <th>DOB</th>
        <th>Gender</th>
    </tr>
    </thead>
    <tbody>
    @foreach($student as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->adm_no }}</td>
            <td>{{ $item->student_name }}</td>
            <td>{{ $item->class }}</td>
            <td>{{ $item->day_or_boarding }}</td>
            <td>{{ $item->stream }}</td>
            <td>{{ $item->classteacher }}</td>
            <td>{{ $item->status }}</td>
            <td>{{ $item->dob }}</td>
            <td>{{ $item->gender }}</td>
        </tr>
    @endforeach
    </tbody>
</table>