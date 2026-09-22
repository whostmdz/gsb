<?php

/**
 * Vue Entête
 *
 * PHP Version 8
 *
 * @category  PPE
 * @package   GSB
 * @author    Réseau CERTA <contact@reseaucerta.org>
 * @author    José GIL <jgil@ac-nice.fr>
 * @copyright 2026 Réseau CERTA
 * @license   Réseau CERTA
 * @version   GIT: <0>
 * @link      http://www.reseaucerta.org Contexte « Laboratoire GSB »
 * @link      https://getbootstrap.com/docs/3.3/ Documentation Bootstrap v3
 */

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="UTF-8">
        <title>Intranet du Laboratoire Galaxy-Swiss Bourdin</title> 
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        ////<link href="./styles/bootstrap/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="https://jsdelivr.net">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link href="./styles/style.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <?php
            $uc = filter_input(INPUT_GET, 'uc', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if ($estConnecte) {
                ?>
            <div class="header">
                <div class="row vertical-align">
                    <div class="col-md-4">
                        <h1>
                            <img src="./images/logo.jpg" class="img-responsive" 
                                 alt="Laboratoire Galaxy-Swiss Bourdin" 
                                 title="Laboratoire Galaxy-Swiss Bourdin">
                        </h1>
                    </div>
                    <div class="col-md-8">
                        <ul class="nav nav-pills pull-right" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link <?php if (!$uc || $uc == 'accueil') echo 'active'; ?>"href="index.php">
                                <i class="bi bi-house-door"></i>
                                    Accueil
                            </a>
                        </li>
                        <li <?php if ($uc == 'gererFrais') { ?>class="active"<?php } ?>>
                            <a href="index.php?uc=gererFrais&action=saisirFrais">
                                <i class="bi bi-pencil"></i>
                                    Renseigner la fiche de frais
                            </a>
                        </li>

                        <li <?php if ($uc == 'etatFrais') { ?>class="active"<?php } ?>>
                            <a href="index.php?uc=etatFrais&action=selectionnerMois">
                                <i class="bi bi-card-list"></i>
                                    Afficher mes fiches de frais
                            </a>
                        </li>

                        <li <?php if ($uc == 'deconnexion') { ?>class="active"<?php } ?>>
                            <a href="index.php?uc=deconnexion&action=demandeDeconnexion">
                                <i class="bi bi-box-arrow-right"></i>
                                    Déconnexion
                            </a>
                        </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
            } else {
                ?>   
                <h1>
                    <img src="./images/logo.jpg"
                         class="img-responsive center-block"
                         alt="Laboratoire Galaxy-Swiss Bourdin"
                         title="Laboratoire Galaxy-Swiss Bourdin">
                </h1>
                <?php
            }
