**** Workflow de développement ****
Initialisation du projet avec un dépôt Git.
Configuration des dépendances avec Composer.
Développement local en suivant l’architecture MVC.
Organisation et suivi des tâches avec Trello.
Tests réguliers avec Postman et navigateur.
Synchronisation avec GitHub pour assurer un suivi des versions.
Déploiement sur un serveur distant pour valider le fonctionnement.


***** Mise en place de l'environnement de travail ****

1. Éditeur de code : VS Code
   Justification : Visual Studio Code est un éditeur léger, performant et extensible, parfaitement adapté pour les projets web. Ses extensions comme PHP IntelliSense, Prettier, et MongoDB for VS Code facilitent le développement en PHP, la gestion des bases de données et l'uniformité du code.

3. Serveur local : MAMPP (MacOS)
Justification : MAMPP offre une solution complète pour exécuter un serveur Apache, une base de données MySQL, et PHP en local. Cela permet de développer et tester l'application dans un environnement contrôlé avant le déploiement.

4. Base de données NoSQL : MongoDB Compass
Justification : MongoDB Compass est utilisé pour interagir graphiquement avec la base NoSQL MongoDB, facilitant ainsi la visualisation des horaires et la gestion des jours de fermeture.

5. Versionnement : Git et GitHub
Justification : Git permet de suivre l'évolution du code et de collaborer efficacement, tandis que GitHub sert de dépôt centralisé pour le projet. Chaque nouvelle fonctionnalité est développée dans une branche spécifique pour éviter les conflits et faciliter les révisions.

6. Structure du projet : Architecture MVC
Justification : La structure MVC (Modèle-Vue-Contrôleur) organise le projet de manière modulaire. Elle sépare les responsabilités (logique métier, gestion des données, affichage), ce qui facilite la maintenance et les évolutions.

7. Dépendances : Composer
Justification : Composer est utilisé pour gérer les bibliothèques et dépendances, telles que le SDK MongoDB, garantissant que toutes les versions utilisées sont compatibles et à jour.

8. Environnement de test : Navigateur et Postman
Navigateur : Chrome pour tester l'affichage des pages web.
Postman : Pour tester les requêtes serveur.
Justification : Ces outils permettent de tester l’application dans des conditions réalistes, avec des réponses rapides et précises.

9. Gestion de projet : Trello
Justification : Trello a été utilisé pour organiser les tâches du projet et suivre leur progression. Les colonnes (To-Do, En cours, Terminé) ont permis une visualisation claire des étapes de développement, améliorant la planification et la gestion du temps. Cela a également facilité la priorisation des fonctionnalités à développer.

10. README.md
Justification : Un fichier README.md est inclus dans le dépôt Git pour documenter le projet, décrire son installation, et expliquer les principaux choix technologiques. Cela permet à toute personne reprenant le projet de comprendre rapidement son fonctionnement.

11. Extension MongoDB pour VS Code
Justification : Cette extension permet de gérer MongoDB directement depuis VS Code, simplifiant les requêtes et les vérifications sans basculer entre différents outils.

12. Dépôt de production : Serveur distant
Justification : Une fois testé en local, le projet est déployé sur un serveur distant compatible avec PHP et MySQL, pour tester dans un environnement plus proche de la production.

