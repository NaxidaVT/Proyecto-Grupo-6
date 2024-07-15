<h1>List of Students</h1>
<a href="/proyecto_matricula/public/student/create">Add New Student</a>
<ul>
<?php foreach ($students as $student): ?>
    <li><?php echo $student->name . ' (' . $student->email . ')'; ?></li>
    <a href="/proyecto_matricula/public/student/edit?id=<?php echo $student->id; ?>">Edit</a>
<?php endforeach; ?>
</ul>
<a href="/proyecto_matricula/public/home">Go to Home</a> <!-- Enlace para ir a la página principal -->
