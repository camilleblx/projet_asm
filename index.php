<?php include("0-config/config-genos.php"); 
// var_dump($_SESSION);
?>


<!DOCTYPE html>
<html lang="fr">
    <?php TplHead(); ?>
    <body id="page-top">
        <?php TplHeader() ?>
        <main id="app">

            <div class="container" style="margin-top: 3em;">
                <div class="row">
                       <div class="col-md-4" v-for="new in listeNewsFiltre">
                           <h3><a href="{{ new.lien }}" target="_blank">{{new.objet}}</a></h3>
                           <img src="{{ new.img }}" width="100%">


                    </div>  <!-- Fin col-md-12 -->
                </div> <!-- row -->
            </div> <!-- Fin container-fluid -->
        </div>
    </main>

        <?php TplBackTop() ?>
        <?php TplFooter() ?>
        <?php Script() ?>
        <script src="index.app.vue.js"></script>
    </body>
</html>