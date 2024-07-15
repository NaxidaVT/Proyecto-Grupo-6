<h1>List of Teachers</h1>
<a href="/proyecto_matricula/public/teacher/create">Add New Teacher</a>

<ul>
<?php foreach ($teachers as $teacher): ?>
    <li>
        <?php echo $teacher->name . ' (' . $teacher->email . ')'; ?>
        <a href="/proyecto_matricula/public/teacher/edit?id=<?php echo $teacher->id; ?>">Edit</a>
    </li>
<?php endforeach; ?>
</ul>
<a href="/proyecto_matricula/public/home">Go to Home</a>
