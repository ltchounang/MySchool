
<form action="index.php?module=etudiant&action=validation_mail" method="post">
                            <p>Envoyez un mail aux etudiants pour les mettre au courant</p>
                            <p>Note: pour ecrire le nom ou le prenom de l'etudiant entrez [nom] ou [prenom]<p>
                            <p>Exemple : Bonjour,[prenom][nom] => Bonjour,Phillipe Bonnot</p>
                            <label for="sujet"> Objet : </label></br>
                            <input type="text" placeholder="objet du mail" id="sujet" name="sujet" value="IUT Montreuil"></br>
                            <label for="message"> Message : </label></br>
                            <textarea id="message" name="message" rows="10" cols="60" placeholder="contenu ..."><?php echo  "Bonjour,[prenom][nom],\nNous vous envoyons ce mail pour vous prevenir que vous etes sur la base de donnees des anciens de l'IUT.\nSi vous avez une quelconque question ou que vous ne souhaitez pas y etre, contactez-nous:\nk.bayoud@iut.univ-paris8.fr\np.bonnot@iut.univ-paris8.fr\nBonne journée"?>
                            </textarea></br>
                            <input type="submit" id="envoi" name="envoi" value="ok">
                        </form>  </article>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
