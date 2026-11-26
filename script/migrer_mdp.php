<?php

require_once __DIR__ . '/../config/bdd.php';

$connexion = new PDO(DB_DSN, DB_USER, DB_PWD);

echo "Connexion réussie." . PHP_EOL;

$requetePrepare = $connexion->prepare(
    'SELECT utilisateur.id AS id, utilisateur.mdp AS mdp, '
    . 'utilisateur.prenom AS prenom '
    . 'FROM utilisateur '
);
$requetePrepare->execute();
$visiteurs=$requetePrepare->fetchAll(PDO::FETCH_ASSOC);

$requeteUpdateMdp =$connexion->prepare(
    'UPDATE utilisateur '
    . 'SET mdp = :hash '
    . 'WHERE id = :id'
);

foreach ($visiteurs as $visiteur) {
    $infoMdp = password_get_info($visiteur['mdp']);

    if($infoMdp['algoName'] != 'unknown'){
        continue;
    }

    $hash = password_hash($visiteur['mdp'], PASSWORD_ARGON2ID); //*Permet de hash le mdp avec argon2*/

    $requeteUpdateMdp->execute([
        ':id' => $visiteur['id'],
        ':hash' => $hash
    ]);
    echo "Hash fait pour le visiteur : " . $visiteur['id'] . PHP_EOL; //* PHP_EOL = retour à la ligne*/
}

$nbVisiteur = count($visiteurs);
echo $nbVisiteur;