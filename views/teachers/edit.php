<h1>Edit Teacher</h1>
<form action="/proyecto_matricula/public/teacher/update" method="post">
    <input type="hidden" name="id" value="<?php echo $teacher->id; ?>">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php echo $teacher->name; ?>" required>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $teacher->email; ?>" required>
    <button type="submit">Update Teacher</button>
</form>
<a href="/proyecto_matricula/public/home">Go to Home</a>
