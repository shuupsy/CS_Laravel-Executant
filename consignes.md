Laravel_projet_executant
ATTENTION : Bien lire avant de coder

REGISTER:
- Rôle 'membre' par défaut
- Champs de base + Prénom + Age
- Possibilité de choisir un avatar parmi une liste (select)

DASHBOARD 
- Toutes les données de la personne connectée 
- Possibilité de modifier les infos persos
- 4 onglets dans un menu vertical :
    * AVATARS : Afficher les avatars. 
        .Possibilité d'ajouter un avatar (image) + champ pour le nom de l'avatar + button pour le supprimer.

    * IMAGES : 
        .Page qui permet d'ajouter des 'images' (ne pas confondre avec les images de l'onglet 'avatar'), 
        .Possibilité de choisir la catégorie de l'image

    * CATEGORIES : Afficher la liste des catégories + button Add / Edit / Delete

    * GALLERIE : Afficher les images sous forme de gallerie avec un button Download

    * UTILISATEURS : Afficher tous les users. 
        .Possibilité de changer leurs données (rôle aussi) sauf les users dont le rôle est admin.


ROLES
- ADMIN (dans le seeder)
    - Accès -> avatars + images + utilisateurs + "catégories"
    - Peut créer de nouvelles catégories d'images
    - Peut ajouter des avatars
    - Peut alimenter la page des images
- MEMBRE
    - Accès -> uniquement Dashboard avec son profil + Onglet Gallerie
- NON CONNECTÉ
    -> Accès au back refusé. (middleware)

CATEGORIES D'IMAGES
- voiture, 
- animal, 
- tech, 
- art,


Fonctions:
- 5 Avatars maximum
- Si suppression avatar -> avatar par défaut "anonyme" à tous les users raccrochés à l'avatar que l'on vient de supprimer
- Si suppression user -> ne supprime pas l'avatar raccroché
- Si suppression catégorie d'image -> supprime toutes les images raccrochées a cette catégorie
- Design du back soigné !!
- Validate, message d'erreur en FR
- Choix d'ajouter une image/avatar entre un input file ou un url
- Pagination quand on a plus de 5 utilisateurs


2ème PARTIE
-Adapter le projet avec les gates

-Rôle 'WebMaster' + un user avec ce rôle (voir plus bas)

-Nouvelle page 'Blog' qui comporte plusieurs articles.


-Cette page est visible par le rôle membre avec la méthode show. (sans les cruds)


- Nouveau rôle : WEBMASTER
    - Possibilité rajouter/éditer/supprimer un article
    - Ne peut pas éditer les autres users
    - Ne peut pas supprimer un admin, ni autre webmaster

- ADMIN 
    - Peut donner le rôle admin et webmaster à un user

