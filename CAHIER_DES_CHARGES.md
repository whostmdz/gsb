
Voici le cahier des charges complet de 14 pages: fonctionnalités, règles métier, architecture, huit tâches obligatoires, livrables et 28 vérifications de recette.

GSB • Gestion des frais
Cahier des charges consolidé

Projet : AP GSB 2027 • BTS SIO, option SLAM

Destinataire : Thomas Diemoz

Version : 1.0 • 11 novembre 2026
Objet du document

Réunir le besoin métier, les fonctionnalités attendues, les contraintes techniques et les huit tâches obligatoires décrites dans les deux PDF du projet. Ce document sert de référence pour développer, vérifier et présenter l'application.

Il s'agit d'une consolidation des documents fournis, et non d'un nouveau sujet. Les critères de recette traduisent les consignes en vérifications concrètes. Les choix proposés et les points à confirmer sont identifiés pour éviter de les confondre avec des obligations du sujet.
Références et lecture
Repère	Document source	Pages du PDF utilisées
S1	GSB_partie_1-2(1).pdf	1 à 17 : contexte, besoin, règles de gestion, cas d'utilisation et données
S2	GSB_partie_3-4(1).pdf	1 à 10 : configuration, missions, architecture et maquettes

Les numéros cités sont ceux des PDF joints, pas ceux du fascicule d'origine. Les deux fichiers sont eux-mêmes des retranscriptions : les maquettes y sont décrites en texte et en tableaux.

Statuts employés : « Exigence » = consigne explicite du sujet ; « Recommandation » = conseil du fascicule ou proposition identifiée ; « À confirmer » = précision absente ou formulation contradictoire.
Organisation

    Contexte et périmètre • 2. Acteurs et droits • 3. Fonctions visiteur • 4. Fonctions comptable • 5. Règles métier • 6. Données • 7. Architecture et qualité • 8. Interfaces • 9. Missions obligatoires • 10. Livrables • 11. Recette • 12. Points à clarifier.

<!-- page -->
1. Contexte et périmètre

Sources : S1, p. 4 à 13 ; S2, p. 2 et 3.
1.1 Contexte professionnel

Galaxy Swiss Bourdin est un laboratoire pharmaceutique issu de la fusion de Galaxy et Swiss Bourdin. Son siège administratif européen est à Paris. Le contexte décrit 480 visiteurs médicaux en métropole et 60 outre-mer, organisés en sept secteurs.

Les visiteurs informent les professionnels de santé sur les produits du laboratoire. Leurs déplacements génèrent des frais de transport, de restauration, d'hébergement et des dépenses annexes. Les pratiques héritées des deux entreprises doivent être harmonisées. L'enveloppe annuelle de frais de déplacement est proche de 25 millions d'euros dans le contexte fourni.
1.2 Objectifs

    Uniformiser la déclaration et le traitement des frais de l'ensemble des visiteurs.
    Permettre une saisie en ligne des dépenses forfaitisées et hors forfait.
    Donner aux visiteurs une visibilité sur la prise en charge et le remboursement.
    Permettre aux comptables de contrôler, corriger, refuser, reporter et valider les frais.
    Suivre de façon datée la validation, la mise en paiement et le remboursement.
    Fournir un état de frais imprimable en PDF en évitant les générations inutiles.

1.3 Périmètre applicatif
Élément	Périmètre retenu
Module visiteur	Code fourni à étudier et à conserver fonctionnel ; adaptations demandées, dont PDF et indemnité kilométrique
Module comptable	Développement de la validation des fiches et du suivi du paiement
Authentification	Reconnaissance du profil visiteur ou comptable et sécurisation du stockage des mots de passe
Support	Application web accessible depuis un ordinateur, avec interface web pour les deux profils
Intégration	Module frais destiné à l'application de comptes-rendus de visite, dans une page ou un onglet spécifique
Existant	Architecture, scripts, base d'exemple et conventions du projet à respecter
1.4 Limites

Les PDF ne demandent pas de créer un logiciel complet de comptes-rendus de visite, une gestion des ressources humaines, un portail d'inscription, une application mobile native ni un système de virement bancaire. Le paiement est suivi par changement d'état ; aucune intégration bancaire n'est définie.

L'organisation réseau de GSB fournit le contexte d'hébergement et de sécurité. La refonte des VLAN, serveurs et équipements n'est pas une mission de développement SLAM de ce sujet.

La mission de développement comptable est annoncée de difficulté moyenne, pour 70 heures estimées. Aucun calendrier de livraison ni budget de réalisation n'est fixé dans les PDF.
<!-- page -->
2. Acteurs, accès et responsabilités

Sources : S1, p. 10 à 16 ; S2, p. 2 et 10.
2.1 Profils fonctionnels
Acteur	Fonctions attendues	Limites
Visiteur médical	Se connecter ; renseigner sa fiche ; consulter ses fiches ; télécharger le PDF	Ses propres fiches ; aucune modification après clôture
Comptable	Se connecter ; sélectionner un visiteur et un mois ; contrôler et valider ; suivre le paiement	Opérations du service comptable, après authentification
Délégué / responsable de secteur	Public mentionné dans la présentation générale de l'interface	Aucun cas d'utilisation ni droit supplémentaire détaillé

Les droits spécifiques d'un délégué ou d'un responsable ne doivent pas être inventés. Les deux profils explicitement décrits dans les cas d'utilisation sont le visiteur médical et le comptable.
2.2 Authentification et session

    ACC-01. Afficher un formulaire avec identifiant et mot de passe.
    ACC-02. Contrôler les informations ; en cas d'échec, informer l'utilisateur et permettre une nouvelle tentative.
    ACC-03. Reconnaître le profil visiteur ou comptable et informer l'utilisateur du profil activé.
    ACC-04. Maintenir l'identité de l'utilisateur connecté visible dans l'interface.
    ACC-05. Réserver les contenus aux acteurs authentifiés et proposer la déconnexion.
    ACC-06. Après déconnexion, ne plus permettre l'accès aux fonctions réservées sans nouvelle authentification.

Conséquence de conception : les contrôles de rôle et de propriété des fiches doivent être appliqués côté serveur, y compris pour un accès direct par URL et pour le téléchargement d'un PDF. Masquer un bouton ne suffit pas à respecter la séparation des profils.
2.3 Répartition des responsabilités
Partie prenante	Responsabilité décrite
Commanditaire	Fournir les informations de contexte, les sources, une base d'exemple et la modélisation nécessaires aux tests
Prestataire / étudiant	Développer un système opérationnel ; proposer les compléments techniques ; fournir documentation technique et modes opératoires
Réseau et système	Mettre à disposition les ressources serveur et les configurations réseau nécessaires à l'hébergement
Service comptable	Contrôler les frais et justificatifs ; régler les litiges ; informer le visiteur des refus ; suivre les règlements
Visiteur	Saisir les dépenses ; fournir les factures hors forfait ; conserver les justificatifs des frais forfaitisés
2.4 Confidentialité et transport

L'environnement doit être accessible uniquement aux acteurs de l'entreprise. L'authentification est préalable à l'accès au contenu. Tous les échanges doivent être chiffrés par le serveur web : le déploiement doit donc proposer HTTPS, y compris pour les documents téléchargés.
<!-- page -->
3. Fonctions du module visiteur

Sources : S1, p. 12 à 15 ; S2, p. 3 à 9.
3.1 Renseigner la fiche du mois courant

    VIS-01. Afficher les frais déjà saisis pour le visiteur connecté et le mois courant, en séparant forfait et hors forfait.
    VIS-02. À la première saisie du mois, créer la fiche et ses lignes forfaitisées avec des valeurs initiales à zéro ; clôturer la fiche du mois précédent si nécessaire.
    VIS-03. Permettre de modifier puis d'enregistrer les quantités de frais forfaitisés ; réafficher les valeurs actualisées.
    VIS-04. Proposer les quatre catégories visibles dans les maquettes : forfait étape, frais kilométriques, nuitée hôtel et repas restaurant.
    VIS-05. Permettre d'ajouter un frais hors forfait en renseignant date d'engagement, libellé et montant.
    VIS-06. Permettre au visiteur de supprimer un frais hors forfait après confirmation, tant que la fiche reste modifiable.
    VIS-07. Après clôture, autoriser la consultation mais interdire les modifications.

3.2 Contrôles et messages prévus
Contrôle	Réponse attendue
Quantité forfaitisée non numérique	« Valeur numérique attendue »
Date, libellé ou montant manquant	« Le champ date (ou libellé ou montant) doit être renseigné » en désignant le champ concerné
Date invalide	« La date d'engagement doit être valide »
Date hors de l'année écoulée	« La date d'engagement doit se situer dans l'année écoulée »
Demande de suppression	Confirmation avant enregistrement de la suppression

Les bornes exactes des quantités, le traitement des nombres négatifs, les plafonds et la précision des montants ne sont pas détaillés dans les PDF. Ils sont à vérifier dans les sources et les normes avant de fixer des règles supplémentaires.
3.3 Consulter ses fiches

    VIS-08. Proposer le choix d'un mois et afficher la fiche correspondante du visiteur connecté.
    VIS-09. Afficher l'état, la date associée à la dernière opération, le montant validé, les quantités forfaitisées, les lignes hors forfait et le nombre de justificatifs reçus.
    VIS-10. Permettre le suivi des montants remboursés et des prestations prises en compte sur l'année écoulée.
    VIS-11. Faciliter la sélection de la période. La liste des mois possédant une fiche est une possibilité citée ; un calendrier est suggéré dans les maquettes.
    VIS-12. Ajouter un lien « Télécharger PDF » à la consultation. Le document correspond à la fiche sélectionnée et doit être facilement imprimable.

La consultation peut remonter au début de l'année civile précédente selon une possibilité du cas d'utilisation. Cette suggestion ne remplace pas l'exigence de consultation sur l'année écoulée ; la profondeur finale de l'historique est à préciser.
<!-- page -->
4. Fonctions du module comptable

Sources : S1, p. 12 à 16 ; S2, p. 2, 3 et 10.
4.1 Contrôler et valider une fiche

Préconditions : comptable authentifié ; clôture des fiches du mois terminé effectuée par un script ; éléments de contrôle disponibles.

    COM-01. Proposer la sélection d'un visiteur et d'un mois. Alimenter la liste des visiteurs depuis la base ; faciliter la recherche par nom. Automatiser le remplissage de la période en fonction de la date du jour.
    COM-02. Afficher le détail de la fiche sélectionnée, ses frais forfaitisés et ses frais hors forfait.
    COM-03. Si aucune fiche n'existe, afficher « Pas de fiche de frais pour ce visiteur ce mois », puis permettre une nouvelle sélection.
    COM-04. Permettre de corriger les quantités forfaitisées, enregistrer les modifications et afficher les valeurs actualisées avec un message de prise en compte.
    COM-05. Permettre le refus d'un frais hors forfait. Conserver la ligne et préfixer son libellé par « REFUSE : ». Exclure son montant du remboursement.
    COM-06. Si le préfixe entraîne un dépassement de la longueur du champ libellé, tronquer la fin du texte à la capacité du champ.
    COM-07. Permettre le report d'un frais hors forfait dont la facture n'a pas été reçue à temps. Déplacer la ligne vers la fiche du mois suivant et la retirer de la fiche d'origine.
    COM-08. Si la fiche de destination n'existe pas, la créer à l'état « Saisie en cours », avec les quantités forfaitisées à zéro.
    COM-09. Permettre d'enregistrer le nombre de justificatifs reçus, conformément à la maquette comptable.
    COM-10. Valider la fiche, la passer à l'état « Validée » et mettre à jour sa date de modification. Le montant validé doit refléter les frais retenus.

Règle de consolidation : le refus comptable conserve la ligne. La suppression autorisée au visiteur pour sa propre saisie reste une opération distincte.
4.2 Suivre le paiement

    COM-11. Proposer une sélection des fiches pertinentes pour le suivi du paiement et afficher le détail de la fiche choisie.
    COM-12. Permettre de mettre une fiche validée en paiement ; enregistrer l'état « Mise en paiement » et sa date de modification.
    COM-13. Lorsque le comptable indique que le paiement est effectué, passer à l'état « Remboursée » et enregistrer la date de modification.
    COM-14. Si la fiche demandée n'existe pas, afficher le message prévu en COM-03.

Le cas d'utilisation parle de fiches « à valider et mises en paiement » alors que le cycle métier place la validation avant la mise en paiement. Le filtre de sélection exact doit être confirmé ; le cycle de traitement reste la référence pour les transitions.
<!-- page -->
5. Règles de gestion

Sources : S1, p. 12 à 16 ; S2, p. 3.
ID	Règle à respecter
RG-01	Une fiche mensuelle est identifiée par le visiteur et le mois de l'année. Éviter tout doublon pour ce couple.
RG-02	Le visiteur peut compléter sa fiche tout au long du mois ; la clôture lui retire le droit de modification.
RG-03	Les frais déclarés peuvent remonter jusqu'à un an : l'exemple donné en août 2026 couvre septembre 2025 à août 2026.
RG-04	Les forfaits reposent sur des quantités et des montants unitaires : repas, étape, hôtel et kilométrage. Le tarif kilométrique varie selon la puissance du véhicule, au titre de la tâche 6.
RG-05	Les justificatifs forfaitisés ne sont pas adressés systématiquement à la comptabilité ; les visiteurs les conservent pendant trois ans.
RG-06	Un hors forfait possède une date, un libellé et un montant ; sa prise en charge repose sur une facture acquittée.
RG-07	Les factures hors forfait doivent parvenir au plus tard le 10 du mois suivant la saisie. Les éléments reçus en retard sont reportés au mois suivant la fiche traitée.
RG-08	La campagne de validation se déroule entre le 10 et le 20 du mois suivant la saisie. La mise en paiement est prévue le 20.
RG-09	Le comptable corrige les incohérences après échange avec le visiteur. Le sujet ne demande pas de conserver l'historique des valeurs corrigées.
RG-10	Une ligne refusée reste en base avec un préfixe de refus ; son montant ne participe pas au remboursement. Le motif du refus n'est pas enregistré. Le comptable informe le visiteur.
RG-11	Le nombre de justificatifs pris en compte doit être communiqué au visiteur.
RG-12	Le PDF est généré une seule fois puis réutilisé, conformément à la tâche Green-IT ; le moment de génération et les changements ultérieurs restent à définir.
5.1 Cycle de vie de la fiche
État	Déclencheur du passage à l'état suivant	État suivant
Créée / Saisie en cours	Fin du mois, avec clôture appliquée par les mécanismes prévus	Clôturée
Clôturée	Contrôle des frais, traitement des pièces et validation comptable	Validée
Validée	Ordre de mise en paiement saisi par le comptable	Mise en paiement
Mise en paiement	Confirmation du paiement effectif	Remboursée
Remboursée	Fin du cycle décrit	Aucun autre état défini

La clôture doit être assurée à la première saisie du mois suivant ou par un script au début de la campagne de validation. Les dates de campagne constituent des règles métier ; aucun déclenchement automatique du paiement ou blocage par date n'est explicitement demandé.
<!-- page -->
6. Données et intégrité

Sources : S1, p. 17 ; S2, p. 3 et 6 à 9.
6.1 Modèle fourni
Entité	Clé primaire décrite	Données mentionnées
Visiteur	id	nom, prenom, adresse, ville, cp, dateEmbauche, login, mdp
FicheFrais	mois + idVisiteur	nbJustificatifs, montantValide, dateModif ; relation vers Etat
Etat	id	libelle
LigneFraisHorsForfait	id	date, montant, libelle ; rattachement à une fiche
FraisForfait	id	libelle, montant
LigneFraisForfait	idVisiteur + mois + idFraisForfait	quantite

Les noms ci-dessus reprennent la modélisation du PDF. La casse, les types SQL, les tailles de champs et les noms des clés étrangères doivent être vérifiés dans le script SQL fourni avec l'application.
6.2 Relations à préserver

    Une fiche appartient à un visiteur et possède un état.
    Une ligne hors forfait appartient à une fiche.
    Une ligne forfaitisée appartient à une fiche et correspond à un type de forfait.
    Le couple visiteur / mois rattache les lignes à la fiche concernée.
    Les montants unitaires des forfaits sont portés par le référentiel FraisForfait dans le modèle présenté.

6.3 Évolutions nécessaires à concevoir
Besoin obligatoire	Conséquence de conception à définir
Authentifier des comptables	Le schéma décrit seulement Visiteur. Définir comment stocker et reconnaître les comptes et les rôles après examen de l'existant.
Adapter l'indemnité kilométrique	Représenter la puissance / catégorie du véhicule et le barème associé ; choisir leur rattachement à partir d'ETAT-FRAIS.docx.
Hacher les mots de passe	Vérifier la capacité du champ, migrer les comptes existants et adapter la vérification à la connexion.
Réutiliser un PDF	Définir son stockage, sa référence, son identification par fiche et les conditions d'accès.

Ces besoins n'imposent pas une nouvelle table particulière : le modèle d'évolution doit être justifié, documenté et compatible avec les données existantes.
6.4 Cohérence des traitements

Recommandations de réalisation dérivées du besoin : traiter un report comme une opération indivisible pour éviter perte ou duplication ; empêcher les doubles créations de fiches ; éviter de préfixer plusieurs fois une même ligne refusée ; conserver la cohérence entre montant validé et lignes retenues. Les transactions et contraintes adaptées sont des moyens possibles, non des technologies supplémentaires imposées par le fascicule.
<!-- page -->
7. Architecture, sécurité et qualité

Sources : S1, p. 10 et 11 ; S2, p. 2 à 9.
7.1 Environnement attendu
Sujet	Exigence ou niveau de prescription
Serveur	Serveur web avec PHP et MariaDB ; développement dans le langage de l'existant
IDE	NetBeans est explicitement demandé dans la configuration et les prérequis de mission
Configuration de l'IDE	Débogage, gestion de version, documentation automatique, tests unitaires et contrôle qualité / standards
Développement	Tests locaux ou sur serveur distant possibles
Déploiement	Application en ligne prévue par le besoin ; serveur en ligne pour présentation au jury très conseillé par le fascicule
Versionnement	Utilisation conseillée d'un outil de gestion de versions, de préférence sur un serveur distant
Bibliothèques	Bibliothèques, API et frameworks autorisés à l'appréciation du prestataire, dans le respect de l'architecture fournie

Le sujet ne fixe pas de version précise de PHP, MariaDB ou Bootstrap. L'utilisation d'un autre IDE doit être validée avec l'enseignant si elle s'écarte de la consigne NetBeans.
7.2 Architecture existante à respecter

    Structure MVC réalisée dans l'application fournie : contrôleurs, modèle et vues séparés.
    Point d'entrée public/index.php : aiguillage vers les contrôleurs par cas d'utilisation et action.
    Accès aux données par PDO, encapsulé dans la classe PdoGsb ; les exemples utilisent des requêtes préparées.
    Modèle retournant des données, notamment des tableaux ; construction de l'HTML dans les vues.
    Répertoires de référence : bin, config, docs, nbproject, public, resources, src, tests et vendor ; sous src : Controleurs, Modeles et Vues.
    Conserver les conventions de nommage des fichiers, variables et paramètres du projet.

Les exemples citent notamment les entrées connexion, accueil, gererFrais, etatFrais, deconnexion, ainsi que les actions de saisie, modification, ajout et suppression. Les nouvelles fonctions comptables doivent s'intégrer à cette organisation ; leurs noms précis ne sont pas imposés dans les PDF.
7.3 Standards et documentation

Respecter PSR-2, les normes de développement du projet, HTML5 et CSS3. Prévoir la validation HTML et CSS avec les validateurs W3C cités. Générer automatiquement la documentation technique : phpDocumentor est l'outil normalement prévu, mais un autre outil est exceptionnellement autorisé.
7.4 Mots de passe et protection des accès

La tâche 5 demande un stockage haché, en proposant SHA-224, SHA-256, SHA-384 ou SHA-512 au choix. Elle impose aussi de rechercher les algorithmes et de savoir expliquer l'absence de MD5 et SHA-1 de la liste proposée. Le choix et la migration doivent être documentés et testés. Cette liste pédagogique ne constitue pas une étude de sécurité suffisante à elle seule : toute adaptation du mécanisme attendu est à valider avec l'enseignant.

Les contrôles côté serveur et le chiffrement des échanges doivent couvrir les formulaires, les opérations comptables et les PDF. Aucun mécanisme supplémentaire précis de journalisation, de double authentification ou de chiffrement de la base n'est imposé par les deux PDF.
<!-- page -->
8. Interfaces et ergonomie

Sources : S1, p. 11 ; S2, p. 5 à 10.
8.1 Principes communs

Les pages fournies sont la référence ergonomique issue d'une consultation. Les livrables doivent respecter les couleurs, les dispositions et les conventions existantes. Des améliorations ou variations peuvent être proposées, mais elles ne doivent pas compromettre les fonctions demandées.

L'identité de l'utilisateur reste affichée. Le menu indique la rubrique active. Les valeurs et listes sont alimentées par la base ; les dates et noms des maquettes sont des exemples, pas des constantes à coder.
8.2 Écrans attendus
Écran	Contenu et actions
Connexion	Identifiant, mot de passe, validation, information sur l'échec ou le profil reconnu
Accueil visiteur	Menu : Accueil ; Renseigner la fiche de frais ; Afficher mes fiches de frais ; Déconnexion
Saisie visiteur	Mois courant ; quatre types de forfait ; quantités ; boutons Ajouter et Effacer ; tableau des hors forfait et suppression avec confirmation
Nouveau hors forfait	Date au format jj/mm/aaaa, sélecteur de calendrier, libellé, montant en euros ; Ajouter et Effacer
Consultation visiteur	Sélection du mois ; Valider et Effacer ; état et date ; montant validé ; quantités ; lignes hors forfait ; nombre de justificatifs ; Télécharger PDF
Accueil comptable	Menu : Accueil ; Valider les fiches de frais ; Suivre le paiement des fiches de frais ; Déconnexion
Validation comptable	Visiteur, mois, forfaits préremplis modifiables ; Corriger et Réinitialiser ; hors forfait ; justificatifs ; validation de la fiche
Suivi du paiement	Sélection de la fiche ; détail ; actions de mise en paiement et de confirmation du remboursement
8.3 Précisions des maquettes

La partie comptable est présentée avec un thème orange. La recherche de visiteur doit permettre de saisir le nom pour aller plus vite. La période doit être alimentée en fonction de la date du jour. La maquette prévoit des boutons « Corriger » et « Réinitialiser » sur les lignes hors forfait ; leur portée exacte doit être rapprochée des règles de refus et de report du cas d'utilisation.

Le libellé « Effacer » des formulaires de référence correspond à un bouton de réinitialisation. Il ne faut pas l'assimiler à une suppression en base ; la suppression d'un frais est une action distincte avec confirmation.
8.4 Sidebar et modernisation visuelle

Une sidebar ou une migration vers Bootstrap 5.3 ne figure pas parmi les huit tâches obligatoires. Ces adaptations peuvent constituer des propositions ergonomiques, puisque le sujet autorise des variations, mais leur conformité aux couleurs et dispositions de référence doit être vérifiée avec l'enseignant. Elles ne peuvent pas être considérées comme approuvées à partir des seuls PDF.

Le placement précis du nom en bas à gauche, la taille du pied de page et un copyright particulier ne sont pas prescrits. L'obligation explicite est de maintenir l'identité visible et de respecter la référence ergonomique.
<!-- page -->
9. Les huit tâches obligatoires

Source : S2, p. 2 et 3. Toutes les tâches sont obligatoires.
Tâche	Résultat à livrer	Critère de conformité principal
T1 • Validation	Interface et traitements du cas « Valider fiche de frais »	Sélection visiteur/mois, contrôle, correction, refus, report, justificatifs et validation datée fonctionnent
T2 • Paiement	Interface et traitements du suivi du paiement	Une fiche suit les transitions Validée → Mise en paiement → Remboursée avec les dates associées
T3 • Documentation	Documentation technique produite automatiquement	Génération reproductible à partir du code ; classes, éléments et bibliothèques décrits
T4 • Frais refusés	Conservation des lignes rejetées	Préfixe REFUSE, montant exclu du remboursement, aucune suppression comptable de la ligne refusée
T5 • Mots de passe	Stockage haché et connexion adaptée	Aucun mot de passe des comptes concernés conservé en clair ; authentification fonctionnelle ; choix justifié
T6 • Kilométrage	Indemnisation variant selon la puissance du véhicule	Application du barème d'ETAT-FRAIS.docx, après obtention de cette ressource
T7 • PDF	Export imprimable de la fiche consultée	Lien Télécharger PDF ; document correspondant à la fiche choisie, suivant le modèle fourni
T8 • Écologie	Réutilisation du PDF produit	Plusieurs téléchargements d'une même fiche n'entraînent pas une nouvelle génération inutile
9.1 Documents annexes nécessaires

    Normes de développement : règles complémentaires de réalisation et de documentation.
    Ressources/ETAT-FRAIS.docx : barème d'indemnisation selon le type / la puissance du véhicule.
    Ressources/REMBOURSEMENT_FRAIS_202607-GRANDPRÉ.docx : exemple d'état de remboursement pour l'export PDF.
    Sources de l'application et base d'exemple à récupérer sur Moodle selon les indications du fascicule.

Ces ressources sont citées mais leur contenu n'est pas inclus dans les deux PDF joints. Les taux kilométriques, la mise en page exacte de l'état PDF et les normes complémentaires ne peuvent donc pas être retranscrits ni inventés ici.
9.2 Articulation avec l'existant

La partie visiteur fournie constitue le socle à préserver. Le cœur du développement demandé porte sur la comptabilité, avec des évolutions transversales et côté visiteur. Terminer uniquement la navigation ou la présentation visuelle ne couvre pas les missions.

Ordre de réalisation proposé, non imposé : comprendre et lancer l'existant ; vérifier les comptes et droits ; construire la validation avec refus et report ; développer le suivi de paiement ; intégrer le barème réel ; produire et réutiliser le PDF ; finaliser la documentation et la recette. Les tests et les notes de documentation accompagnent chaque étape.
9.3 Calcul du montant retenu

Traduction métier à vérifier sur les ressources : additionner les quantités forfaitisées multipliées par leurs tarifs applicables, puis les montants hors forfait acceptés restants dans la fiche. Appliquer le barème correspondant au véhicule pour le kilométrage. Exclure les lignes refusées et les lignes reportées hors de la fiche.

Le barème, les arrondis, la précision monétaire et les éventuels plafonds ne peuvent pas être fixés avec les deux seuls PDF.
<!-- page -->
10. Livrables et conditions de réception

Sources : S1, p. 2, 3 et 11 ; S2, p. 2 et 3.
10.1 Livrables applicatifs

    Application opérationnelle : socle visiteur conservé, module comptable et huit tâches réalisés.
    Sources organisées selon l'architecture fournie et respectant les conventions demandées.
    Base compatible avec les évolutions retenues et jeu de données permettant les essais.
    Authentification avec reconnaissance des profils et mots de passe stockés sous forme hachée.
    Export PDF et dispositif de réutilisation du document.

Compléments de transfert recommandés : scripts SQL d'évolution reproductibles, consignes d'installation et de configuration, description de la migration des comptes et procédure de génération des PDF. Leur forme exacte n'est pas imposée par les deux PDF ; ils rendent le système exploitable et vérifiable.
10.2 Documentation attendue
Livrable	Contenu attendu
Documentation technique	Arborescence des pages de chaque module ; description des éléments et classes ; bibliothèques et frameworks externes ; documentation générée automatiquement
Mode opératoire visiteur	Connexion, saisie, consultation, interprétation des états et téléchargement PDF
Mode opératoire comptable	Sélection, corrections, refus, report, justificatifs, validation, mise en paiement et remboursement
Justification du hachage	Algorithme choisi, adaptation de la connexion, étude demandée sur les algorithmes et explication de l'exclusion de MD5 / SHA-1
Preuves de vérification	Résultats de tests et démonstrations des scénarios de recette ; format libre proposé
10.3 Livrables pédagogiques

Le portefeuille de compétences doit être alimenté avec les compétences acquises. Le tableau de synthèse associé doit être complété. Le fascicule relie les AP aux épreuves E5 et E6 et demande d'utiliser ces travaux pour préparer l'épreuve pratique.

Le résumé du contexte de l'entreprise fait partie du travail attendu de la partie 1. L'étude de l'application existante est également un préalable explicite aux missions.
10.4 Réception du projet

La réception porte sur les fonctionnalités et règles décrites, la réalisation des huit tâches, l'intégration à l'existant, la qualité du code et la documentation. La matrice des pages suivantes propose des contrôles concrets ; elle n'est pas un barème de notation officiel.

Aucun seuil chiffré de performance, taux de disponibilité, budget, date limite ou volume de connexions simultanées n'est fixé. Ces éléments ne sont pas présentés comme des obligations contractuelles.
<!-- page -->
11. Recette fonctionnelle

Critères de vérification dérivés de S1 et S2 ; plan de recette proposé.
Test	Scénario	Résultat attendu
R01	Connexion avec un visiteur puis un comptable	Profil correct, identité visible et fonctions adaptées
R02	Connexion incorrecte ; accès sans connexion ; déconnexion	Message d'erreur ; accès réservé protégé ; session déconnectée
R03	Un visiteur change l'identifiant de fiche dans une URL ou demande un PDF tiers	Aucun accès aux données d'un autre visiteur
R04	Première saisie d'un mois après une fiche antérieure ouverte	Création unique de la nouvelle fiche, forfaits à zéro et clôture du mois précédent
R05	Modification de quantités puis saisie non numérique	Valeurs valides enregistrées ; saisie invalide refusée avec le message prévu
R06	Ajout d'un hors forfait valide ; champs manquants ; date impossible	Ajout valide enregistré ; erreurs signalées sans ligne incohérente
R07	Dates aux bornes de la période autorisée et hors période	Résultat conforme à la règle annuelle une fois sa borne exacte confirmée
R08	Suppression visiteur : annuler puis confirmer	Annulation sans effet ; suppression après confirmation
R09	Tentative de modification d'une fiche clôturée	Consultation possible ; écriture refusée côté serveur
R10	Consultation de plusieurs mois	Bonne fiche, état, date, montant, quantités, lignes et justificatifs
R11	Lancement du script de clôture sur le mois à traiter	Toutes les fiches encore ouvertes de ce mois sont clôturées
R12	Sélection comptable d'un visiteur/mois sans fiche	Message « Pas de fiche de frais pour ce visiteur ce mois »
R13	Correction comptable des quantités	Valeurs sauvegardées et réaffichées ; confirmation de prise en compte
R14	Refus d'un hors forfait, dont un libellé à longueur maximale	Ligne conservée, préfixe REFUSE : visible, fin tronquée si nécessaire et montant exclu
R15	Report vers une fiche existante puis vers une fiche absente	Ligne déplacée sans perte ni doublon ; fiche absente créée en saisie avec forfaits à zéro
R16	Report de décembre vers janvier	Mois et année de destination corrects

Les tests doivent être effectués sur une base d'essai. Les scripts de clôture et de migration nécessitent un jeu de données couvrant les états et périodes concernés.
<!-- page -->
11. Recette technique et finale

Suite du plan de vérification proposé.
Test	Scénario	Résultat attendu
R17	Enregistrer les justificatifs et valider la fiche	Nombre conservé, montant cohérent, état Validée et date actualisée
R18	Mise en paiement puis confirmation de règlement	États successifs et dates corrects ; suivi visible en consultation
R19	Calcul avec plusieurs catégories de véhicules	Montants conformes au barème réel fourni ; arrondis conformes à la règle retenue
R20	Contrôle de la base après migration et essai de connexion	Mots de passe hachés, comptes existants utilisables, mauvais mot de passe refusé
R21	Premier téléchargement du PDF puis téléchargements répétés	Document lisible et conforme à la fiche ; réutilisation sans nouvelle génération
R22	Tentative d'accès direct au PDF sans autorisation	Aucun contournement de l'authentification ou des droits
R23	Modification d'une fiche après un éventuel premier PDF	Comportement conforme à la politique de génération et de mise à jour validée
R24	Génération automatique de la documentation	Documentation exploitable et régénérable avec la procédure fournie
R25	Contrôle HTML / CSS et revue des conventions	Respect des standards et des règles du projet ; écarts éventuels identifiés
R26	Vérification de l'environnement de développement	Débogage, versionnement, documentation, tests et contrôle qualité configurés
R27	Navigation complète après ajout de la comptabilité	Connexion, saisie et consultation visiteur restent fonctionnelles
R28	Déploiement de l'application et téléchargement PDF	Accès par HTTPS et fonctions opérationnelles dans l'environnement cible
11.1 Données d'essai minimales proposées

    Deux visiteurs et un comptable afin de vérifier la séparation des accès.
    Des fiches en saisie, clôturées, validées, mises en paiement et remboursées.
    Un mois sans fiche, une destination de report existante et une destination absente.
    Des frais hors forfait acceptés, refusés, reportés et un libellé proche de la limite.
    Des dates limites, une date invalide et un passage décembre / janvier.
    Plusieurs catégories de véhicules après obtention du barème.

11.2 Validation finale

Chaque tâche T1 à T8 doit être associée à une démonstration ou un résultat de recette. Les éventuels écarts aux normes, aux maquettes ou à l'environnement prescrit doivent être explicités ; ils ne deviennent pas conformes par simple changement de présentation.

La preuve de réutilisation du PDF peut être apportée par un contrôle du fichier et une instrumentation de la génération. Le mode de preuve est libre ; l'exigence demeure l'absence de génération répétée inutile.
<!-- page -->
12. Points à clarifier et arbitrages

Ces limites sont présentes dans les sources ; elles ne doivent pas être comblées par des exigences inventées.
Point	Constat et traitement retenu
Refus ou suppression comptable	S1 p. 13 parle de suppression ; S1 p. 16 et T4 de S2 demandent de conserver la ligne. La consolidation retient la règle explicite de T4 : conservation, préfixe et exclusion du remboursement.
Préfixe de refus	Le cas détaillé écrit « REFUSE : » ; T4 cite « REFUSE ». Employer « REFUSE : » respecte le scénario détaillé.
Mois courant ou mois écoulé	La description métier évoque le mois écoulé, mais le scénario de saisie vise le mois courant. Le parcours suit le cas d'utilisation ; faire confirmer la formulation temporelle globale.
Ancienneté des frais	L'exemple est une fenêtre de douze mois calendaires, alors que le contrôle parle d'une année écoulée. Faire confirmer la borne au jour ou au mois et le traitement des dates futures.
Historique consultable	Une année écoulée est demandée ; un retour au début de l'année précédente est également proposé. Définir la profondeur finale sans réduire la couverture minimale.
Liste du suivi de paiement	Le cas écrit « à valider et mises en paiement ». Faire confirmer les états sélectionnables ; le cycle impose validation avant mise en paiement.
PDF unique et fiche modifiable	La tâche impose une génération unique, sans préciser comment actualiser un PDF déjà téléchargé après une modification. Arbitrer le moment de génération et la gestion des changements.
Indemnité kilométrique	Le barème est dans un DOCX absent. Taux, catégories, rattachement du véhicule et éventuelle conservation historique restent à préciser.
Comptables et états SQL	Le modèle résumé ne décrit ni les comptes comptables ni les codes SQL de chaque état. Examiner le SQL et les sources avant de choisir une évolution.
Normes et modèle de PDF	Obtenir les documents annexes avant d'affirmer une conformité complète aux normes de développement ou au formulaire de remboursement.
12.1 Choix de réalisation à faire valider

Proposition pour le PDF : privilégier une génération à un stade où les informations attendues sont stabilisées, puis conserver le document pour les téléchargements ultérieurs. Si le PDF doit refléter chaque évolution d'état, une politique de versions peut être envisagée, mais elle doit être validée au regard de la consigne « une seule et unique fois ». Aucun de ces choix n'est imposé par les deux PDF.

Autres décisions : préciser les règles numériques et les arrondis ; rapprocher les corrections hors forfait de la maquette et du scénario ; valider les évolutions visuelles et tout changement d'IDE ; fixer les conventions de stockage des documents et des rôles.
12.2 État de référence

Ce cahier des charges couvre l'ensemble des exigences lisibles dans les deux PDF transmis. La conformité détaillée au barème, au modèle de remboursement et aux normes complémentaires dépend de la récupération des ressources citées. L'avancement réel du code et sa conformité n'ont pas été audités dans ce document.


