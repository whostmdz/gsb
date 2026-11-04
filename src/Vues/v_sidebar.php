<div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary"
     style="width: 280px;">

    <a href="index.php"
       class="d-flex align-items-center mb-3 text-decoration-none">
        <img src="./images/logo.jpg"
             alt="Accueil GSB"
             class="img-fluid"
             style="max-width: 180px;">
    </a>

    <hr>

    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a class="nav-link<?php if (!$uc || $uc == 'accueil') { ?> active<?php } ?>"
                <?php if (!$uc || $uc == 'accueil') { ?>aria-current="page" <?php } ?>
                href="index.php">
                <svg class="icon" aria-hidden="true" focusable="false">
                    <use href="./images/icons.svg#home"></use>
                </svg>
                Accueil
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link<?php if ($uc == 'gererFrais') { ?> active<?php } ?>"
                <?php if ($uc == 'gererFrais') { ?>aria-current="page" <?php } ?>
                href="index.php?uc=gererFrais&action=saisirFrais">
                <svg class="icon" aria-hidden="true" focusable="false">
                    <use href="./images/icons.svg#pencil"></use>
                </svg>
                Renseigner la fiche de frais
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link<?php if ($uc == 'etatFrais') { ?> active<?php } ?>"
                <?php if ($uc == 'etatFrais') { ?>aria-current="page" <?php } ?>
                href="index.php?uc=etatFrais&action=selectionnerMois">
                <svg class="icon" aria-hidden="true" focusable="false">
                    <use href="./images/icons.svg#list-alt"></use>
                </svg>
                Afficher mes fiches de frais
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link<?php if ($uc == 'deconnexion') { ?> active<?php } ?>"
                <?php if ($uc == 'deconnexion') { ?>aria-current="page" <?php } ?>
                href="index.php?uc=deconnexion&action=demandeDeconnexion">
                <svg class="icon" aria-hidden="true" focusable="false">
                    <use href="./images/icons.svg#log-out"></use>
                </svg>
                Déconnexion
            </a>
        </li>
    </ul>

    <hr>

    <div class="mt-auto">
        <span class="d-block fw-semibold">
            <?= htmlspecialchars(
                $_SESSION['prenom'] . ' ' . $_SESSION['nom'], ENT_QUOTES,'UTF-8')
                ?>
        </span>
        <small class="text-body-secondary">Visiteur médical</small>
    </div>
</div>