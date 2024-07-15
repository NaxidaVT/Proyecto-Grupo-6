<h1>List of Subjects</h1>
<a href="/proyecto_matricula/public/subject/create">Add New Subject</a>

<ul>
<?php foreach ($subjects as $subject): ?>
    <li>
        <?php echo $subject->name; ?>
        <a href="/proyecto_matricula/public/subject/edit?id=<?php echo $subject->id; ?>">Edit</a>
    </li>
<?php endforeach; ?>
</ul>
<a href="/proyecto_matricula/public/home">Go to Home</a>