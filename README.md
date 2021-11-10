# Pole_emploi_API - Evaluation

## "Dans le langage de votre choix parmi PHP, PYTHON et JS, vous avez pour mission de vous brancher sur l'API Pôle Emploi "Offres d'emploi"

URL de la documentation : [API de pôle emploi](https://pole-emploi.io/data/api/offres-emploi?tabgroup-api=documentation&doc-section=api-doc-section-rechercher-par-crit%C3%A8res)

URL pour comprendre la méthode l'accès : [Documentation](https://pole-emploi.io/data/documentation/utilisation-api-pole-emploi)

Après avoir authentifié votre client OAUTH, vous aurez a effectuer quelques requêtes et la mise en page de leurs résultats pour les rendre accessibles en lecture à un humain : 

- Trouver le code ROME correspondant au métier "Développeur / Développeuse full-stack" : [ROME](https://pole-emploi.io/data/api/rome?tabgroup-api=documentation&doc-section=api-doc-section-caracteristiques)

- A partir du code ROME trouvé, déterminer les soft-skills recommandée par Pôle Emploi pour ce métier : [Soft skills](https://pole-emploi.io/data/api/match-soft-skills?tabgroup-api=documentation&doc-section=api-doc-section-lister-des-comp%C3%A9tences-pour-un-m%C3%A9tier-donn%C3%A9)

- Exploiter et mettre en forme les données correspondant aux inscrits suivants (identifiant) via l'API Individu : [Individu](https://pole-emploi.io/data/api/individu-test?tabgroup-api=documentation&doc-section=api-doc-section-caracteristiques)