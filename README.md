# Épreuve finale du cours de : 31W – Introduction à un système de gestion de contenu
## Introduction à un système de gestion de contenu

### Objectifs :
- Une série de liens ou boutons contenant chacun un pays. Chaque lien permet d’exécuter une requête HTTPS permettant d’afficher les destinations par pays. Les pays que l’on peut sélectionner sont les suivants : "France","États-Unis", "Canada", "Argentine", "Chili", "Belgique", "Maroc", "Mexique", "Japon", "Italie", "Islande", "Chine", "Grèce", "Suisse"
- Cette application sera intégrée à partir d’une extension que vous allez créer et qui ressemble beaucoup à l’extension filtre du TP2 permettant d’extraire les destinations par catégorie. Cette fois vous allez créer une extension qui permet d’extraire les destinations par pays.
- Utiliser la requête rest-api suivante pour extraire les destinations par pays : Cette instruction permet d’extraire l’adresse du domaine.
window.location.origin + "/31w"; // pour ajouter un dossier au domaine
/wp-json/wp/v2/posts?search=canada&per_page=30 // la requête rest