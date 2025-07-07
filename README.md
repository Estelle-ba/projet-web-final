# Projet Election des délégués

## Contexte
Le projet a été développé dans le cadre d'un projet d'école à la Coding Factory.
L’objectif est de créer une application pour notre école qui facilite le déroulement des éléctions des délégués

## Objectif
### - Les objectifs principaux
- Rôle gestionnaire ou rôle étudiant 
- Qui se présente à l’élection + texte de présentation
- Création d’un lien pour se présenter à l’élection (d’un groupe donné)
- Importation d’un CSV avec nom + prénom +
  email @edu.esiee-if.fr + nom du groupe de tous les étudiant·es
- Déroulement de l’élection 
- Clôture de l’élection
- Création d’un document PDF avec les emails des délégués et suppléants de tous les groupes de la Coding

### - Les objectifs bonus
- Faire en sorte que les gestionnaires puissent définir la durée où les délégués peuvent se présenter et définir la durée de la propagande
- Ajout d'un vidéo par chaque futur délégué (lorsqu'on cliquera sur sa photo de profil on pourra visionner la vidéo)
- Faire une page de question lors de la semaine propagande
- Faire un salon vie de classe pour que les questions importantes et leurs réponse soit vu par tout le monde (accès par classe, seulement gestionnaire et délégués peuvent répondre)

## Stack Technique
- **Backend :** Laravel

- **Frontend :** Blade, HTML, CSS, JavaScript

- **Base de données :** MySQL

- **Versionning :** Git

## Organisation du Code

```
/www
    /projet_election
        /app
            /Http
                /Controllers    **Contrôleurs du projet**
            /Models             **Modèles Eloquent**
            /Policies           **Polices des modèles**
        /resources
            /views              **Vues Blade (pages HTML)**
        /routes
            web.php             **Routes web (celles des différentes pages)**
        /public
            /css                **Feuilles de style**
            /js                 **Scripts JavaScript**

```

## Auteurs


- [florianBounon](https://github.com/florianBounon)
- [Mathéo BEAUDET](https://github.com/L0ll0w)
- [Nayash](https://github.com/Nayash03)
- [Estelle-ba](https://github.com/Estelle-ba)
