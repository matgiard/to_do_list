<?php require_once 'partials/_header.php' ?>
<body>
    <div class="row mt-5">
        <div class="col-12">
            <form action="add.php" method="POST">
                <div class="form-group">
                    <label for="content">Contenu de la tâche</label>
                    <textarea type="text" name="name" id="name" class="form-control" required></textarea>
                    <?php $today = date("Y-m-d H:i:s"); ?>
                    <input type="datetime-local" id="to_do_at" name="to_do_at" value="<?php echo $today; ?>" min="" max="">

                </div>
                                            
                <a href="index.php"><button type="submit" class="btn btn-primary">Ajouter</button></a>

            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>    
</body>
</html>