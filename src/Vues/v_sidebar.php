<nav class="gsb-sidebar d-flex flex-column flex-shrink-0 px-3 pt-3 bg-body-tertiary"
    aria-label="Navigation principale">

    <a href="index.php" class="d-block mb-3">
        <img src="./images/logo.jpg"
            class="gsb-logo img-fluid"
            alt="Accueil GSB">
    </a>

    <hr>

    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="index.php"
                class="nav-link<?php if (!$uc || $uc === 'accueil') { ?> active<?php } ?>"
                <?php if (!$uc || $uc === 'accueil') { ?>aria-current="page" <?php } ?>>
                <svg class="icon" aria-hidden="true" focusable="false">
                    <use href="./images/icons.svg#home"></use>
                </svg>
                Accueil
            </a>
        </li>

        <li class="nav-item">
            <a href="index.php?uc=gererFrais&amp;action=saisirFrais"
                class="nav-link<?php if ($uc === 'gererFrais') { ?> active<?php } ?>"
                <?php if ($uc === 'gererFrais') { ?>aria-current="page" <?php } ?>>
                <svg class="icon" aria-hidden="true" focusable="false">
                    <use href="./images/icons.svg#pencil"></use>
                </svg>
                Renseigner la fiche de frais
            </a>
        </li>

        <li class="nav-item">
            <a href="index.php?uc=etatFrais&amp;action=selectionnerMois"
                class="nav-link<?php if ($uc === 'etatFrais') { ?> active<?php } ?>"
                <?php if ($uc === 'etatFrais') { ?>aria-current="page" <?php } ?>>
                <svg class="icon" aria-hidden="true" focusable="false">
                    <use href="./images/icons.svg#list-alt"></use>
                </svg>
                Afficher mes fiches de frais
            </a>
        </li>

        <li class="nav-item">
            <a href="index.php?uc=deconnexion&amp;action=demandeDeconnexion"
                class="nav-link<?php if ($uc === 'deconnexion') { ?> active<?php } ?>"
                <?php if ($uc === 'deconnexion') { ?>aria-current="page" <?php } ?>>
                <svg class="icon" aria-hidden="true" focusable="false">
                    <use href="./images/icons.svg#log-out"></use>
                </svg>
                Déconnexion
            </a>
        </li>
    </ul>

    <hr class="my-2">

    <div class="text-start">
        <small class="d-block text-body-secondary">Visiteur médical</small>
        <span class="d-block fw-semibold">
            <?= htmlspecialchars(
                $_SESSION['prenom'] . ' ' . $_SESSION['nom'],
                ENT_QUOTES,
                'UTF-8'
            ) ?>
        </span>
    </div>
</nav>