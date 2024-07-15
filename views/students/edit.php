<h1>Edit Student</h1>
<form action="/proyecto_matricula/public/student/update" method="post">
    <input type="hidden" name="id" value="<?php echo $student->id; ?>">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php echo $student->name; ?>" required>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $student->email; ?>" required>
    <button type="submit">Update Student</button>
</form>
