**22/09/2026**
# Migration vers Bootstrap 5.3 

Le CSS officiel Bootstrap 5.3.8 est conservé dans
`public/styles/bootstrap/bootstrap.css`. 
Les icônes sont définies dans `public/images/icons.svg` : aucune connexion à un CDN n'est nécessaire. (Cela charge directement le fichier)

Changement :

- Panneaux remplacés par des cartes (`card`, `card-header`, `card-body`).
- Navigation avec `nav-item`, `nav-link`, `active` et `aria-current` sur le lien.
- Formulaires avec `mb-3`, `form-label`, `form-select`, `input-group-text` et `w-100`.
- Images avec `img-fluid` et centrage avec `d-block mx-auto`.
- Tableaux placés dans un conteneur `table-responsive`.
- Colonnes `col-md-*` de Bootstrap 3 remplacées par `col-lg-*` pour conserver
  le seuil de 992 px ; décalage du formulaire avec `offset-lg-3`.
- Glyphicons remplacés par des SVG locaux et anciennes polices supprimées.
- Pied de page en flex pour éviter le chevauchement du contenu.

Réf: [migration de v3 à v4](https://getbootstrap.com/docs/4.6/migration/)
et [migration de v4 à v5](https://getbootstrap.com/docs/5.3/migration/).
Le dossier `docs/` contient la documentation PHP générée ; il n'est pas utilisé
pour l'interface de l'application et n'a pas été régénéré.

