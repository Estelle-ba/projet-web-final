@extends('layouts.app')
@section('content')
    {{----}}
    <section class="presentation_welcome">
        <div class="right">
            <iframe src="https:///www.youtube.com//embed/6at5tbZh8EE?si=-KjIBtW-AMENkFQo"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
            </iframe>
        </div>

        <div class="left">
            <h2>L'école qui bouscule le &lt;/code&gt;
            <br>Coding Factory by ESIEE-IT.</h2>

            <p>Devenez développeur web ! La <strong>Coding Factory by ESIEE-IT</strong> vous propose une formation de <strong>
            Développeur web</strong> complète et innovante en 3 ans, puis avec une spécialisation en Bac +5, en <strong>Lead Dev</strong> ou
            <strong>VR &amp; Jeux vidéo</strong>. Nos formations dispensées à Paris 15e (Montparnasse) et Cergy-Pontoise vous permettront d&rsquo;acquérir
            toutes les compétences nécessaires pour devenir un expert du web.</p>

            <div class="container_2_div">
                <div class="button_1 hover">
                    <a href="https://www.esiee-it.fr/fr/les-formations-de-la-coding-factory" target="_blank">
                       NOS FORMATIONS ❯
                    </a>
                </div>
                <div class="button_2 hover">
                    <a href="https://www.esiee-it.fr/fr/evenements" target="_blank">
                         NOS EVENEMENTS ❯
                    </a>
                </div>
            </div>
        </div>

    </section>


    <section class="content">
        {{--Type of teaching--}}
        <div class="section_1">

            <div class="right">
                <h2>L'école qui bouscule le &lt;/code&gt;</h2>

                <p>Avec sa pédagogie <strong>EDUSCRUM</strong>, la <strong>Coding Factory</strong> offre à ses étudiants une
                    approche pédagogique originale et innovante qui s&rsquo;inspire de la <strong>méthode agile</strong>, une méthode
                    de gestion de projets utilisée dans l&rsquo;univers du<strong> développement web et logiciel.</strong></p>
            </div>

            <div class="left">
                <iframe src="https:///www.youtube.com//embed/T8JvYuoerG8?si=SAiXT3Ed6DUDrIFR"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                </iframe>
            </div>
        </div>


        {{--A normal week--}}
        <h4><br><b>C'est-à-dire ?</b></h4>
        <p>L’apprentissage par la pratique grâce à des projets concrets, qui permettent<br />de transformer les
            connaissances théoriques en compétences pratiques.</p>

        <div class="container_2_div_small">
            <div class="left_small">
                <h4 class="title"><b>Les sprints éducatifs :</b></h4>
                <p>une semaine pour apprendre, faire et restituer !</p>
            </div>

            <div class="right_small">
                <h4 class="title"><b>La mission des formateurs :</b></h4>
                <p>rebaptisés Product Owners, ils sont des guides inspirants et aident les étudiants à prendre confiance en
                    eux et monter en compétences !</p>
            </div>
        </div>

        <div class="container_2_div_small">
            <div class="left_small">
                <h4 class="title"><b>Le travail d’équipe</b></h4>
                <p>est au coeur de notre pédagogie, pour favoriser le développement de compétences et la résolution de problèmes.</p>
            </div >

            <div class="right_small">
                <h4 class="title"><b>Devenir des pros :</b></h4>
                <p>les étudiants sont préparés à réussir dans un environnement professionnel exigeant, ils travaillent sur
                    des projets réels, en équipe.</p>
            </div>
        </div>

        <img src="https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img,w_1024,h_193/https://codingfactory.fr/wp-content/uploads/2023/06/image-removebg-preview-4.png"
             alt="Plannig d'une semaine type à la Coding Factory">


        {{--Training courses--}}
        <section class="section_2">
            <div class="formation">
                <h2>Bachelor</h2>
                <h3>Développeur Web<br>Parcours Web Sécurité</h3>
                <div class="bottom">
                    <button class="hover">
                        <a href="https://www.esiee-it.fr/fr/bachelor-developpeur-de-solutions-web-et-mobiles">
                            Découvrir
                        </a>
                    </button>
                </div>
            </div>

            <div class="formation">
                <h2>Bac+5</h2>
                <h3>Lead Dev</h3>
                <div class="bottom">
                    <button class="hover">
                        <a href="https://www.esiee-it.fr/fr/bac5-lead-dev">
                            Découvrir
                        </a>
                    </button>
                </div>
            </div>

            <div class="formation">
                <h2>Bac+5</h2>
                <h3>Dev VR &amp; Jeux Vidéo</h3>
                <div class="bottom">
                    <button class="hover">
                        <a href="https://www.esiee-it.fr/fr/bac5-developpeur-vr-et-jeux-video">
                            Découvrir
                        </a>
                    </button>
                </div>
            </div>
        </section>


        {{--Campus--}}
        <div class="section_3">
            <div class="left">
                <h2>Découvrez l'univers du code en mode startup !</h2>
                <p>Dans des open spaces de 200 m² à Paris Montparnasse ou Cergy, se côtoient nos codeurs dans une ambiance start-up.</p>
            </div>

            <div class="right">
                <img src="https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img,w_1024,h_576/https://codingfactory.fr/wp-content/uploads/2023/06/MicrosoftTeams-image-6.jpg"
                     alt="Coding Factory">
            </div>
        </div>


        {{----}}
        <div class="section_4">
            <iframe src="https:///www.youtube.com//embed/yV3IQOfyQDk?si=ucGKhv6jcVW2y10M"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
            </iframe>

            <h2>Code, expérimente et partage !</h2>
        </div>


        {{--carroussel--}}
        <div class="carroussel_computer">
        </div>
        <div class="carroussel_phone">
        </div>
            <span onclick="currentDiv(1)"></span>
            <span onclick="currentDiv(2)"></span>
            <span onclick="currentDiv(3)"></span>
            <span onclick="currentDiv(4)"></span>




        {{--job catalog--}}
        <div class="container_2_div">
            <div class="left">
                <img src="https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img,w_600,h_407/https://codingfactory.fr/wp-content/uploads/2022/11/guide-des-metiers-coding.png" alt="Guide des métier">
                <div class="description">Les entreprises et les start-up recherchent de nouveaux talents pour répondre aux évolutions technologiques et numériques.</div>
            </div>

            <div class="right">
                <h2>Découvrez l'univers du code en mode startup !</h2>
                <p>Découvrez les métiers du code et les formations pour y accéder, pour réussir pleinement votre orientation professionnelle.<br>
                <br>Téléchargez le guide complet des métiers du Code informatique :</p>
                <button class="button_3 hover">
                    <a href="https://www.esiee-it.fr/fr/le-guide-des-metiers-du-code">
                        Télécharger
                    </a>
                </button>
            </div>
        </div>


        {{--Staff--}}
        <h2 class="elementor-heading-title elementor-size-default">L'équipe Coding Factory</h2>
        <div class="section_6">
            <div class="staff">
                <img src="https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img/https://codingfactory.fr/wp-content/uploads/2023/10/Untitled-design-18.jpg"
                     alt="Delphine GARNIER">
                <div class="name">Delphine GARNIER</div>
                <div class="role">Responsable des programmes Paris & Cergy</div>
                <div class="description">07 88 03 22 45
                    <br>dgarnier@esiee-it.fr</div>
            </div>

            <div class="staff">
                <img src="https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img/https://codingfactory.fr/wp-content/uploads/2023/10/Untitled-design-14.jpg"
                     alt="Michaël JOLY">
                <div class="name">Michaël JOLY</div>
                <div class="role">Conseiller Career Center</div>
                <div class="description">06 59 54 67 46
                    <br>mjoly@esiee-it.fr</div>
            </div>

            <div class="staff">
                <img src="https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img/https://codingfactory.fr/wp-content/uploads/2025/01/marie.png"
                     alt="Marie GNANA">
                <div class="name">Marie GNANA</div>
                <div class="role">Chargée des Admissions</div>
                <div class="description">07 72 31 94 60
                    <br>magnana@esiee-it.frr</div>
            </div>

            <div class="staff">
                <img src="https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img/https://codingfactory.fr/wp-content/uploads/2023/10/Untitled-design-17.jpg"
                     alt="Valérie ECALLE">
                <div class="name">Valérie ECALLE</div>
                <div class="role">Assistante pédagogique Cergy</div>
                <div class="description">06 31 19 36 16
                    <br>vecalle@esiee-it.fr</div>
            </div>

            <div class="staff">
                <img src="https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img/https://codingfactory.fr/wp-content/uploads/2025/01/frederic-lefevre.png"
                     alt="Frédéric LEFEVRE">
                <div class="name">Frédéric LEFEVRE</div>
                <div class="role">Enseignant, Responsable Cycle L</div>
                <div class="description">06 72 09 73 27
                    <br>flefevre@esiee-it.fr</div>
            </div>

            <div class="staff">
                <img src="https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img/https://codingfactory.fr/wp-content/uploads/2025/06/maxime-joullin.png"
                     alt="Maxime JOULLIN">
                <div class="name">Maxime JOULLIN</div>
                <div class="role">Enseignant, Responsable Cycle M</div>
                <div class="description">06 61 82 65 15
                    <br>mjoullin@esiee-it.fr</div>
            </div>
        </div>


        {{--Brands--}}
        <h2 class="elementor-heading-title elementor-size-default">Ils nous ont fait confiance</h2>
        <div class="section_6">
            <div class="brands">
                <img src="https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img,w_100,h_100/https://codingfactory.fr/wp-content/uploads/2019/05/logo-bnp-cardif.png"
                     alt="Logo de bnp-cardif">
            </div>

            <div class="brands">
                <img src="https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img,w_100,h_100/https://codingfactory.fr/wp-content/uploads/2019/05/logo-cergy-internet.png"
                     alt="Logo de Cergy Internet">
            </div>

            <div class="brands">
                <img src="https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img,w_100,h_100/https://codingfactory.fr/wp-content/uploads/2019/05/logo-cloudi-fi.png"
                     alt="Logo Cloudi-fi">
            </div>

            <div class="brands">
                <img src="https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img,w_100,h_100/https://codingfactory.fr/wp-content/uploads/2019/05/logo-edf-enegies.png"
                     alt="Logo de EDF">
            </div>

            <div class="brands">
                <img src="https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img,w_100,h_100/https://codingfactory.fr/wp-content/uploads/2019/05/logo-laposte.png"
                    alt="Logo de la poste">
            </div>

            <div class="brands">
                <img src="https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img,w_100,h_100/https://codingfactory.fr/wp-content/uploads/2019/05/logo-leetchi.png"
                     alt="Logo de Leetchi">
            </div>

            <div class="brands">
                <img src="https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img,w_100,h_100/https://codingfactory.fr/wp-content/uploads/2021/01/logo-les-digiteurs.png"
                     alt="Logo les digiteurs">
            </div>

            <div class="brands">
                <img src="https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img,w_100,h_100/https://codingfactory.fr/wp-content/uploads/2019/05/logo-fdj.png"
                     alt="Logo de FDJ">
            </div>
        </div>


        {{--Lab Day--}}
        <div class="section_3">
            <div class="left">
                <h2>Lab Day</h2>
                <p><strong>Lab Day de la Coding Factory </strong>: 5 semaines pour coder votre projet !<br><br>
                    Durant 5 semaines, <strong>la Coding Factory by ESIEE-IT</strong> donne carte blanche à ses étudiants pour créer :
                    applications, jeux vidéo, sites web… À eux de choisir !</p>
            </div>
            <div class="right">
                <iframe src="https:///www.youtube.com//embed/e8KyW4yPet4?si=1vCaJ8zgJggX5rYc"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                </iframe>
            </div>
        </div>

    </section>
@endsection

@push('scripts')
    <script src="{{ asset('js/carroussel_welcome.js')}}"></script>
@endpush
