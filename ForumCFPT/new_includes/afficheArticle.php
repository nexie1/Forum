<?php
/*
 * Auteur       : Fernandes Marco
 * Description  : Forum du CFPT
 * Version      : 1.0.0
 * Date         : 07.05.2019
 * Copyright    : Fernandes Marco
 */
?>
<section id="maSection">      
    <article>
        <div class="row content">
            <div class="col-sm-9">
                </br>
                <?php foreach ($resultArt as $value) { ?>
                    <h2>Titre : <?= $value["title"] ?></h2>
                    <h5><span class="glyphicon glyphicon-time"></span> Post by <?= $value["pseudo"] ?>, <?= $value["creation_date"] ?></h5></br>
                    <p><?= $value["content"] ?></p>


                    <?php if (isset($value1) != null) { ?>

                        <h2>Commentaire :</h2>
                        
                    <?php }
                    foreach ($resultCom as $value1) {
                        ?>
                        <h5><span class="glyphicon glyphicon-time"></span> Post by <?= $value1["pseudo"] ?>, <?= $value1["creation_date"] ?></h5></br>

                        <p><?= $value1["content"] ?></p>
                        <?php
                    }
                }
                ?>
                <h4>Leave a Comment:</h4>
                <form method="POST" role="form">
                    <div class="form-group">
                        <textarea name="commentaire" class="form-control" rows="3" required></textarea>
                    </div>
                    <button type="submit" name="SubCommentaire" class="btn btn-success">Submit</button>
                </form>
                <br><br>
            </div>
        </div>
    </article>
</section>