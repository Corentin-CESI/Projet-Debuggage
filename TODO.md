## LES BUGS
 - [x] Page Blanche
 - [x] Accès au différent onglet
 - [x] Problème d'écriture sur des scripts ("{}", "()")
 - [x] Index négatif dans certain cas pour le DECHIFFRAGE
 - [x] Connection à la BDD (config)


## LES Ajouts Demandés
### Fonctionnel
 - [ ] Envoi d'email lors d'une validation d'un formulaire
 - [x] Possibilité de mettre des caractères spéciaux dans le formualaire
 - [ ] Ajout de différente devise dans la conversation EURO/DOLLARS (money)
 - [ ] Ajout de différente unité dans la conversation EURO/DOLLARS (maths)
 - [x] Accès ADMIN (faire le .env)

### Visuel
 - [x] Mise à jour de la version de Bootstrap (4 --> 5)
 - [x] Bootstrap local
 - [ ] Retravailler le formulaire pour qu'il soit plus "user friendly" (ex: avec un temps de chargement lors de la validation du formulaire)
    - [x] Temps de chargement
       - [x] HOME
       - [x] CESAR
       - [x] CONVERT
       - [x] POURCENTAGE
       - [x] REGLE DE TROIS

### CODE
 - [ ] Nettoyage du code inutile (préciser même si il n'y a rien) ( + il faudra recheck avec le projet initial au cas où)
    - [ ] dans les TEMPLATE
       - [ ] HOME
       - [ ] CESAR
       - [ ] CONVERT
       - [ ] POUCENTAGE
       - [ ] DEC/HEXA
       - [ ] REGLE DE TROIS
       - [ ] ADMIN
    - [ ] dans les FONCTIONS
       - [ ] ALERT
       - [ ] CALCULATION
       - [ ] CONNECTION
       - [ ] DATABASE
       - [ ] DUMPER
          - [ ] Suppression du fichier
             - [ ] Suppression de son appel dans APP.PHP
       - [ ] INCLUDER
       - [ ] ROUTER
          - [ ] Procainement : suppression de la fonction REDIRECT
       - [ ] TEMPLATE
       - [ ] UTILS
       - [ ] VALIDATION 
          - [ ] A vérifier l'utilité des option HASH et REMOVE de la fonction CHECK_VALIDATION
 - [x] Vérification des librairies
    - [x] La police de Open Sans n'est utilisé que rarement donc on l'a enlevé
    - [x] Font Awesome --> Icon SAUF que ce sont celles de BOXICON qui sont utilisées
    - [x] AOS CSS --> animation MAIS 'data-aos' n'est utilisé nulle part
 - [ ] Vérification W3C (c'est chiant)
 - [x] Commenter les templates
    - [x] HOME
    - [x] CESAR
    - [x] CONVERT
    - [x] POUCENTAGE
    - [x] DEC/HEXA
    - [x] REGLE DE TROIS
    - [x] ADMIN
 - [ ] Commenter les functions
    - [x] ALERT
    - [x] CALCULATION
    - [x] CONNECTION
    - [x] DATABASE
    - [x] DUMPER
       - [ ] Prochainement : suppression du fichier
    - [x] INCLUDER
       - [ ] incertitude sur la fonction get_file
    - [x] ROUTER
       - [ ] Procainement : suppression de la fonction REDIRECT
    - [x] TEMPLATE
    - [x] UTILS
    - [x] VALIDATION 
       - [ ] A vérifier l'utilité des option HASH et REMOVE de la fonction CHECK_VALIDATION
 - [ ] Mettre tous les calculs côté BACK
   - [x] DEC/HEXA : faire les fonctions de calcul dans l'API

## NOS Ajouts
 - [x] CSS a réparé
 - [ ] ~~Limitation de la clé pour le code cesar~~
 - [x] Modification de la fonction CESAR
    - [x] IF remplacer par des WHILE

## LA SECURITE
 - [x] "htmlspecialchar" utilisé dans le formaulaire
 - [ ] Ajout d'expression régulaire dans le formulaire