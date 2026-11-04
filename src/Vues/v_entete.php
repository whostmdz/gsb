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
 * @link      https://getbootstrap.com/docs/5.3/ Documentation Bootstrap v5.3
 */

$uc = filter_input(INPUT_GET, 'uc', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intranet du Laboratoire Galaxy-Swiss Bourdin</title>
    <link href="./styles/bootstrap/bootstrap.css" rel="stylesheet">
    <link href="./styles/style.css" rel="stylesheet">
</head>

<body>
    <div class="gsb-layout">
        <?php
        if ($estConnecte) {
            require PATH_VIEWS . 'v_sidebar.php';
        }
        ?>

        <div class="gsb-colonne">
            <main class="gsb-contenu p-3 p-lg-4">
                <?php if (!$estConnecte) { ?>
                    <h1>
                        <img src="./images/logo.jpg"
                            class="img-fluid d-block mx-auto"
                            alt="Laboratoire Galaxy-Swiss Bourdin"
                            title="Laboratoire Galaxy-Swiss Bourdin">
                    </h1>
                <?php } ?>