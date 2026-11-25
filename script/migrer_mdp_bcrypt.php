<?php

$connexion = new PDO(DB_DSN, DB_USER, DB_PWD);

$requetePrepare = $connexion->prepare(
    'SELECT visiteur.id AS id, visiteur.mdp AS mdp, '
    . 'visiteur.prenom AS prenom '
    . 'FROM visiteur '
);
$requetePrepare->execute();
$visiteurs=$requetePrepare->fetchAll(PDO::FETCH_ASSOC);

$requeteUpdateMdp =$connexion->prepare(
    'UPDATE visiteur '
    . 'SET mdp = :hash '
    . 'WHERE id = :id'
);

foreach ($visiteurs as $visiteur) {
    $infoMdp = password_get_info($visiteur['mdp']);

    if($infoMdp['algoName'] != 'unknown'){
        continue;
    }

    $hash = password_hash($visiteur['mdp'], PASSWORD_DEFAULT);

    $requeteUpdateMdp->execute([
        ':id' => $visiteur['id'],
        ':hash' => $hash
    ]);
    echo "Hash fait pour : " . $visiteur['id'];
}