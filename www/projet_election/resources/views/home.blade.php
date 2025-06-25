@extends('layouts.app')

@section('content')
    <div class="presentation_home">
        <div class="left">
            {{--The title that change according to the role of the user--}}
            <h1>
                @can('isAdmin')
                    Bienvenue sur le Portail Administratif de l'Établissement
                @elsecan('isStudent')
                    Bienvenue sur votre Espace Étudiant
                @elsecan('isTeacher')
                    Bienvenue sur votre Espace Enseignant
                @endcan
            </h1>
        </div>

        {{--A Carroussel with the images of the Coding Factory--}}
        <img id="carroussel" class="right"
             src="https://codingfactory.fr/wp-content/uploads/2023/06/MicrosoftTeams-image-6.jpg"
             alt="Image of the coding factory"/>
        <img id="carroussel" class="right" style="display:none"
             src="https://codingfactory.fr/wp-content/uploads/2023/06/MicrosoftTeams-image-5.jpg"
             alt="Image of the coding factory"/>
        <img id="carroussel" class="right" style="display:none"
             src="https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img/https://codingfactory.fr/wp-content/uploads/2023/04/Photo-Coding-11.jpg"
             alt="Image of the coding factory"/>
        <img id="carroussel " class="right" style="display:none"
             src="https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img/https://codingfactory.fr/wp-content/uploads/2023/06/Photo-Coding-24.jpg"
             alt="Image of the coding factory"/>
        <img id="carroussel " class="right" style="display:none"
             src="https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img/https://codingfactory.fr/wp-content/uploads/2023/04/Photo-Coding-9.jpg"
             alt="Image of the coding factory"/>
        <img id="carroussel" class="right" style="display:none"
             src="https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img/https://codingfactory.fr/wp-content/uploads/2023/06/MicrosoftTeams-image-6.jpg"
             alt="Image of the coding factory"/>
        <img id="carroussel " class="right" style="display:none"
             src="https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img/https://codingfactory.fr/wp-content/uploads/2023/04/Photo-Coding-22.jpg"
             alt="Image of the coding factory"/>
        <img id="carroussel " class="right" style="display:none"
             src="https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img/https://codingfactory.fr/wp-content/uploads/2023/06/Photo-Coding-28.jpg"
             alt="Image of the coding factory"/>
        <img id="carroussel" class="right" style="display:none"
             src="https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img/https://codingfactory.fr/wp-content/uploads/2023/06/MicrosoftTeams-image-9.jpg"
             alt="Image of the coding factory"/>
        <img id="carroussel " class="right" style="display:none"
             src="https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img/https://codingfactory.fr/wp-content/uploads/2023/06/MicrosoftTeams-image-10.jpg"
             alt="Image of the coding factory"/>
        <img id="carroussel " class="right" style="display:none"
             src="https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img/https://codingfactory.fr/wp-content/uploads/2023/06/Photo-Coding-6.jpg"
             alt="Image of the coding factory"/>
        <img id="carroussel " class="right" style="display:none"
             src="https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img/https://codingfactory.fr/wp-content/uploads/2023/06/Photo-Coding-21.jpg"
             alt="Image of the coding factory"/>

        <div class="left">
            {{--The welcome paragraph that change according to the role of the user--}}
            @can('isAdmin')
                <p>
                    Bonjour {{$user -> name}} {{$user -> lastname}}
                    <br>Nous sommes ravis de vous retrouver sur la plateforme de gestion de notre établissement scolaire.
                    <br>En tant qu’administrateur, vous avez accès à l’ensemble des outils essentiels pour assurer le bon fonctionnement de l’école :
                    <br>📋 Gestion des emplois du temps
                    <br>👩‍🏫 Suivi des équipes pédagogiques
                    <br>📊 Statistiques de fréquentation et de résultats
                    <br>📁 Administration des dossiers élèves et enseignants
                    <br>🔒 Sécurité et accès utilisateurs
                    <br>🆕 Nouveautés récentes :
                    <br>[Indiquez ici une nouveauté, ex : Mise à jour du module d’absences]
                    <br>[Indiquez ici une tâche urgente, ex : Validation des inscriptions en cours]
                    <br>Nous vous rappelons de toujours veiller à la sécurité des données personnelles et au respect du RGPD. En cas de doute ou de besoin d’assistance, l’équipe technique reste à votre disposition.
                    <br>📨 Contact support : support@ecole.fr
                    <br>Merci pour votre engagement quotidien pour la réussite de notre établissement.
                    <br>Bonne session de travail,
                    <br>L’équipe de Direction
                </p>
            @elsecan('isStudent')
                <p>
                    Bonjour {{$user -> name}} {{$user -> lastname}}
                    <br>Bienvenue sur le portail universitaire. Cet espace est conçu pour vous accompagner tout au long de votre parcours académique.
                    <br>Depuis votre compte, vous pouvez :
                    <br>📚 Accéder à vos cours, emplois du temps et ressources pédagogiques
                    <br>📝 Suivre vos notes, vos évaluations et vos résultats
                    <br>📅 Consulter les dates importantes (examens, soutenances, inscriptions)
                    <br>📨 Communiquer avec vos enseignants et l’administration
                    <br>📁 Gérer votre dossier étudiant et vos démarches en ligne
                    <br>🆕 À ne pas manquer :
                    <br>[Annonce récente, ex : Inscriptions aux examens ouvertes jusqu’au 5 juillet]
                    <br>[Événement à venir, ex : Forum des stages le 2 juillet au bâtiment B]
                    <br>🎯 Pensez à consulter régulièrement vos notifications et votre messagerie universitaire afin de ne rien manquer.
                    <br>Nous vous souhaitons une excellente continuation dans votre parcours et restons à votre écoute pour toute question ou difficulté.
                    <br>Bonne navigation et bon courage dans vos études,
                    <br>L’équipe pédagogique et administrative de l’université
                </p>
            @elsecan('isTeacher')
                <p>
                    Bonjour {{$user -> name}} {{$user -> lastname}}
                    <br>Nous vous souhaitons la bienvenue sur la plateforme pédagogique et administrative de l’université.
                    <br>Cet espace a été conçu pour faciliter votre activité d’enseignement, de suivi des étudiants et de gestion académique.
                    <br>Vous avez accès à :
                    <br>📅 Vos emplois du temps et les plannings de vos cours
                    <br>📁 Les ressources de vos unités d’enseignement (supports de cours, travaux dirigés, etc.)
                    <br>🧑‍🎓 Le suivi des étudiants : absences, notes, travaux rendus
                    <br>📝 La saisie et la consultation des résultats
                    <br>📨 Les outils de communication avec les étudiants et les équipes pédagogiques
                    <br>🔔 Les informations institutionnelles et les événements universitaires
                    <br>🆕 À noter cette semaine :
                    <br>[Actualité ou tâche importante, ex : Clôture de saisie des notes le 28 juin]
                    <br>[Rappel, ex : Réunion pédagogique du département jeudi à 14h en salle 312]
                    <br>🙏 Merci pour votre engagement et votre contribution à la réussite de nos étudiants et à la vie universitaire.
                    <br>L’équipe administrative reste à votre disposition pour toute assistance.
                    <br>Bonne session et bon enseignement,
                    <br>L’équipe de Direction de l’Université
                </p>
            @endcan
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/carroussel.js') }}"></script>
@endpush
