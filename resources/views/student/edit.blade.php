<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Student</title>
</head>
<body>
    <form action="{{route('student.update', $student->id) }}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="name" value ={{$student->name}}><br>
        <input type="date" name="birth_date" value ={{$student->birth_date}}><br>
        <input type="text" name="age" value ={{$student->age}}><br>
        <input type="submit" value="save">
    </form>
</body>
</html>