<?php require_once 'partials/_header.php' ?>

    <a href="add.php"><button class="btn btn-primary">Ajouter une tâche</button></a>

    
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Tâches</th>
                    <th>Prévu pour</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($tasks as $task) : ?>
            <tr>
                <td><?= $task['name']; ?></td>
                <td><?= $task['to_do_at']; ?></td>
                <td>
                <a href="edit.php?id=<?= $task['id_task'] ?>" class="btn btn-warning">Modifier</a>
                <a href="delete.php?id=<?= $task['id_task'] ?>" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
            </tbody>
        </table>        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>