<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
</head>
<body>
    <h1>Add Student</h1>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if($errors->any())
        <p>{{ $errors->first('file') }}</p>
    @endif

    <form method="POST" action="{{ route('students.store') }}">
    @csrf
    <label for="student_name">Student Name</label>
    <input type="text" name="student_name" id="student_name" required />

    <label for="stream">Stream</label>
    <input type="text" name="stream" id="stream" required />

    <label for="class">Class</label>
    <input type="text" name="class" id="class" required />

    <label for="adm_no">Admission Number</label>
    <input type="text" name="adm_no" id="adm_no" required />

    <label for="day_or_boarding">day_or_boarding</label>
    <input type="text" name="day_or_boarding" id="day_or_boarding" required />

    <label for="dob">Date of Birth</label>
    <input type="date" name="dob" id="dob" required />

    <label for="status">Status</label>
    <input type="text" name="status" id="status" required />

    <label for="gender">Gender</label>
    <input type="text" name="gender" id="gender" required />

    <label for="classteacher">Class Teacher</label>
    <input type="text" name="classteacher" id="classteacher" required />

    <button type="submit">Submit</button>
</form>

</body>
</html>
