<h1>Edit Subject</h1>
<form action="/proyecto_matricula/public/subject/update" method="post">
    <input type="hidden" name="id" value="<?php echo $subject->id; ?>">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php echo $subject->name; ?>" required>

    <button type="submit">Update Subject</button>
</form>

