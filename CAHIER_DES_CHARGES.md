# Cahier des charges GSB — consignes reçues et suivi

Date de rédaction : 22 septembre 2026.

Ce document rassemble uniquement les extraits du cahier des charges.

Les exigences ci-dessous reprennent les consignes communiquées. 
Les applications au projet et les vérifications proposées sont
des notes de travail, distinctes des exigences elles-mêmes.

## 1. Documentation demandée

### Exigences transmises

La documentation devra présenter :

- l'arborescence des pages pour chaque module ;
- le descriptif des éléments, classes et bibliothèques utilisés ;
- la liste des frameworks ou bibliothèques externes utilisés.

### Application au projet

La documentation devra expliquer les parcours de navigation de chaque module,
et pas seulement présenter l'arborescence des dossiers du code source.
Les modules actuellement repérés sont :

| Module | Éléments à décrire |
| --- | --- |
| Connexion | Formulaire d'identification, validation et affichage des erreurs. |
| Accueil | Présentation et accès aux fonctions de gestion des frais. |
| Gestion des frais | Saisie des frais forfaitisés, ajout et suppression des frais hors forfait. |
| Consultation des frais | Sélection du mois et affichage de l'état de la fiche et de ses frais. |
| Déconnexion | Fin de session et retour à la connexion. |

Cette liste décrit l'existant connu ; elle pourra évoluer.

Pour chaque module, prévoir le parcours des pages, le rôle des formulaires et
tableaux, les actions possibles et les fichiers correspondants.

Éléments techniques à documenter :

- `public/index.php` : point d'entrée et orientation vers les contrôleurs.
- `src/Controleurs/` : traitement des actions et préparation des vues.
- `src/Modeles/PdoGsb.php` : accès aux données de l'application.
- `src/Vues/` : affichage des pages et formulaires.
- `resources/Outils/Utilitaires.php` : fonctions utilitaires regroupées dans une classe.
- `config/` : configuration des chemins et de la connexion à la base.
- Bootstrap 5.3.8 : bibliothèque d'interface, avec CSS conservé localement.
- `public/styles/style.css` : styles propres au projet.
- `public/images/icons.svg` : icônes SVG locales ajoutées lors de la migration.
- Composer : outil de gestion des dépendances et de chargement automatique des classes.
- PDO : extension PHP utilisée pour accéder à la base, à distinguer des bibliothèques externes.


### Place de la documentation générée

Le dossier `docs/` contient une documentation HTML générée à partir du code et
de ses commentaires. Elle sert de référence technique sur les classes et leurs
méthodes. Elle ne remplace pas la présentation des modules et des parcours exigée
par le cahier des charges.

Elle n'a pas été régénérée pendant la migration Bootstrap et peut contenir des
références à l'ancienne version.

## 2. Architecture

### Exigence transmise

L'architecture doit respecter celle des scripts fournis concernant la gestion
de l'enregistrement des frais engagés par les visiteurs.

### Application au projet

- Conserver l'organisation existante en contrôleurs, modèles et vues.
- Respecter le rôle du point d'entrée et le mécanisme de sélection des actions.
- Intégrer les évolutions dans cette structure.
- Vérifier que les parcours existants de gestion des frais fonctionnent toujours.


## 3. Ergonomie

### Exigences transmises

Les pages fournies ont été définies à la suite d'une consultation et constituent
une référence ergonomique. Des améliorations ou variations peuvent être proposées.

### Application au projet

- Prendre les pages d'origine comme référence pour la navigation, les formulaires
  et la présentation des informations.
- Conserver des repères cohérents pour les utilisateurs.
- Décrire les variations proposées et leur intérêt, notamment sur petit écran.
- Comparer le résultat de la migration avec les pages fournies.

La possibilité de proposer une variation ne supprime pas les contraintes de
couleurs et de disposition indiquées ci-dessous. Les éventuelles modalités de
validation des variations restent à préciser avec le document complet.

## 4. Codage, nommage et présentation

### Exigences transmises

- Respecter la PSR-2.
- Respecter le nommage des fichiers, variables et paramètres fournis.
- Respecter les codes couleurs et la disposition des éléments déjà fournis.

### Application au projet

La PSR-2 est la norme explicitement demandée : le code PHP devra être contrôlé
selon cette norme. Ce document ne remplace pas un contrôle de conformité.

Les adaptations techniques nécessaires à Bootstrap doivent préserver les noms
des fichiers applicatifs, variables et paramètres existants. Le remplacement
des classes CSS obsolètes doit être distingué d'un renommage de ces éléments.

Les couleurs, espacements, dimensions et positions devront être comparés aux
pages d'origine. Le remplacement du CSS Bootstrap ne suffit pas à garantir leur
conservation : les valeurs par défaut diffèrent entre les versions.

## 5. État connu après la migration Bootstrap

| Point | État connu |
| --- | --- |
| Version Bootstrap | CSS local remplacé par Bootstrap 5.3.8. |
| Composants des vues | Panneaux, navigation, formulaires, images et tableaux adaptés. |
| Icônes | Glyphicons remplacés par des SVG locaux. |
| Architecture applicative | Contrôleurs et modèles non modifiés par la migration. |
| Vérifications statiques | Structure HTML statique, présence des classes CSS et références SVG vérifiées. |
| Exécution de l'application | Parcours complets non validés lors de la migration ; PHP était alors absent de l'environnement. |
| Conformité visuelle | Comparaison avec les pages d'origine encore nécessaire. |
| Conformité PSR-2 | Contrôle dédié encore nécessaire. |
| Documentation demandée | À rédiger et compléter ; le présent fichier rassemble les exigences connues. |


## 6. Liste de vérifications à poursuivre

- [ ] Intégrer le cahier des charges complet et identifier les exigences supplémentaires.
- [ ] Confirmer la liste des modules et des livrables attendus.
- [ ] Présenter l'arborescence des pages et les parcours de chaque module.
- [ ] Décrire les éléments d'interface, classes et bibliothèques utilisés.
- [ ] Finaliser l'inventaire des frameworks et bibliothèques externes avec leurs versions et rôles.
- [ ] Vérifier le respect de l'architecture et des noms fournis.
- [ ] Comparer les couleurs et la disposition avec les pages de référence.
- [ ] Documenter les améliorations ou variations proposées.
- [ ] Contrôler le PHP selon la PSR-2 et traiter les écarts dans le périmètre demandé.
- [ ] Tester la connexion, la déconnexion, la saisie, la modification, la suppression et la consultation des frais.
- [ ] Vérifier l'affichage sur ordinateur et sur petit écran.
- [ ] Actualiser la documentation technique générée si elle fait partie du rendu.


**Suite en cours...**