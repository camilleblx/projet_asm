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
                   <table class="table mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col" class="border-0">Date compétition</th>
                            <th scope="col" class="border-0">Intitulé - Lieu</th>
                            <th scope="col" class="border-0">Niveau</th>
                            <th scope="col" class="border-0">Catégorie</th>
                            <th scope="col" class="border-0">Type</th>
                            <th scope="col" class="border-0"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="compet in listeCompetFiltre">
                            <td>{{compet.datecompete}}</td>
                            <td>{{compet.nom}} <br/> {{compet.lieu}}</td>
                            <td>{{compet.niveau}}</td>
                            <td>{{compet.details}}</td>
                            <td>{{compet.type}}</td>
                            <td><button>M'inscrire</button></td>
                        </tr>
                    </tbody>
                </table>
        </div>
    </main>

        <?php TplBackTop() ?>
        <?php TplFooter() ?>
        <?php Script() ?>
        <script src="index.app.vue.js"></script>
    </body>
</html>