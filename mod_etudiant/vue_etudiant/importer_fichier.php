
<?php ob_start(); ?>

<?php require_once 'import.php'; ?>
<aside id="articleGestion" class="col-xs-10 col-sm-10 data-spy="scroll" class="scrollspy-example z-depth-1 mt-4" data-offset="0" style="background-color: blanchedalmond; scrollbar-ripe-malinka"><h2 > Quelques étapes avant l'importation </h2>
            <h3 > 1. Assurez vous que les attributs de votre tableau soit ecrit de cette maniere (l'ordre n'a pas d'importance)  </h3>
                </br>
                <img class="instructionEnImage1" src="ressources/imgSite/etapesImportExcel/etape1.png" alt="image etape 1" >
            <h3 > 2. Assurez vous que votre tableau commence bien par la case A1 </h3>
                </br>
                <img class="instructionEnImage" src="ressources/imgSite/etapesImportExcel/etap2.png" alt="image etape 2" >
            <h3 > 3. Exporter le fichier en format CSV </h3>
                </br>
                <img class="instructionEnImage" src="ressources/imgSite/etapesImportExcel/etape3.png" alt ="image etape 3" >
                
            <h3 > 4. Inserer le fichier CSV </h3>
                </br>
                <form action="index.php?module=etudiant&action=validation_fichier" method="post" enctype="multipart/form-data">
                    <input type="file" name="fileToUpload">
                    <input type="submit" value="Valider" name="submit">
                </form>

            </br>
            <h3 > Voici un exemple : <a href="https://docs.google.com/spreadsheets/d/10XmhcaLpoPMSDoTQrW__NF6Fp13D0kD4f7RlseMFY40/edit?usp=sharing" target="_blank"><img src="ressources/imgSite/logos/gestion/import_logo.png"></a> </h3>
                
            </aside>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
