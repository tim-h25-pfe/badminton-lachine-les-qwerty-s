<?php
/* Template Name: Projet Associatif */
?>

<?php get_header(); ?>

<section class="hero block">
    <div class="hero__media">
        <?php 
        if (has_post_thumbnail()) { 
            the_post_thumbnail(); 
        } else { ?>
            <img src="<?php bloginfo('template_url') ?>/assets/images/cordageAccueilServices.jpg" alt="image de raquettes" />
        <?php } ?>
    </div>
    <div class="hero__content">
        <h1>Projet associatif</h1>
        <div class="underline">
            <svg class="icon icon--lg">
                <use xlink:href="#icon-doubleLigneDessin"></use>
            </svg>
        </div>
    </div>
</section>

<section data-component="Ariane" data-ariane-single>
    <div class="wrapper">
        <div class="side_menu_grid">
            <nav class="side_menu">
                <ul class="ariane-nav"></ul>
            </nav>
            <div class="projet_content">
                <section class="introduction">
                    <div class="title">
                        <h2 data-ariane-section>Introduction</h2>
                        <div class="underline">
                            <svg class="icon icon--lg">
                                <use xlink:href="#icon-doubleLigneDessin"></use>
                            </svg>
                        </div>
                    </div>

                    <div class="block_description">
                        <div class="titre">
                            <h4><span>L’engagement associatif au coeur de notre projet</span></h4>
                            <hr />
                        </div>
                        <div class="content">
                            <div class="paragraphe">
                                <p>
                                    Dans le projet associatif 2023-2028, nous voulons réaffirmer notre identité, nos
                                    valeurs, nos missions et notre souhait d’évoluer, de nous développer et de
                                    progresser. Il s’articule autour de trois axes confirmant notre volonté de
                                    positionner Badminton Lachine comme un acteur majeur du badminton montréalais, mais
                                    également comme un acteur volontariste de l'économie sociale et solidaire afin de
                                    construire ensemble une société engagée et donnant l’accès au sport à tous.
                                </p>
                                <p>
                                    Pour cela, nous proposons une nouvelle vision du milieu associatif, un engagement
                                    possible sur l’ensemble des activités de l’Organisme afin de créer un sentiment
                                    d’appartenance, du partage et du social entre nos membres.
                                </p>
                                <p>
                                    En 10 ans, nous avons appris à expérimenter, améliorer et valoriser nos
                                    savoir-faire; nous voulons les faire connaître, les protéger en maintenant nos
                                    pratiques dans un secteur proche, garantir la qualité de nos services, gérer la
                                    complémentarité des services ainsi qu’assurer la formation qualifiante des
                                    professionnels et des bénévoles.
                                </p>
                                <p>
                                    Dans ce cadre, il est important que l’Organisme dispose de moyens nécessaires et du
                                    soutien de ses membres. Ce projet s’adresse donc à l’ensemble des acteur.rice.s de
                                    Badminton Lachine : partenaires, familles, professionnel.le.s, bénévoles et membres.
                                    Fondé sur notre histoire et orienté vers le futur, il établit une vision fédératrice
                                    pour les cinq années à venir.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="block_description">
                        <div class="titre">
                            <h4><span>Un contexte en évolution</span></h4>
                            <hr />
                        </div>
                        <div class="content">
                            <div class="paragraphe">
                                <p>
                                    Au fil des années passées, de profonds changements sont intervenus dans le contexte
                                    économique et social.
                                </p>
                                <p>
                                    La conjoncture économique défavorable ainsi que la covid-19 ont profondément
                                    bouleversé le secteur associatif le poussant à développer des relations différentes
                                    avec les membres, les bénévoles et les partenaires. Ainsi et dans un contexte marqué
                                    par des ressources difficiles à mobiliser pour des demandes toujours élevées, notre
                                    projet associatif a été conçu sur la base d’un postulat : adapter nos réponses et
                                    développer des solutions afin d’influencer et d’amener nos partenaires et nos
                                    membres à s’investir dans la vie de l’Organisme pour favoriser son développement.
                                </p>
                                <p>
                                    Cela nous encourage à repenser le fonctionnement de nos services et d’envisager de
                                    construire une nouvelle façon de voir les liens entre les membres et l’Organisme.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="block_description">
                        <div class="titre">
                            <h4><span>La méthodologie adoptée</span></h4>
                            <hr />
                        </div>
                        <div class="content">
                            <div class="paragraphe">
                                <p>
                                    Ce projet est le résultat d’un <span>travail collaboratif</span> associant le
                                    Conseil d’Administration et les professionnel.le.s de l’Organisme. Cette approche
                                    nous a permis <span>d’identifier les besoins</span> et de définir, ensemble, un
                                    <span>plan stratégique</span> cohérent, en lien avec nos valeurs et nos missions
                                    associatives.
                                </p>
                                <p>
                                    Réfléchi dans une logique de continuité entre le passé, le présent et le futur, ce
                                    projet a été conduit en trois grandes étapes fondées sur les questions suivantes :
                                    <span>« Où en sommes-nous ? Où voulons-nous aller ? »</span> .
                                </p>
                                <p>
                                    Ainsi, c’est à partir de ces deux thématiques de réflexion que les différents
                                    chapitres, ici présentés, ont été conçus. Le présent repose, d’une part, sur la
                                    caractérisation de l’Organisme, notamment ses missions et ses valeurs et, d’autre
                                    part, sur l’analyse de nos activités, des besoins non couverts et du contexte. Pour
                                    ce qui est du futur, celui-ci est le résultat d’une conjugaison complexe qui tient
                                    compte des éléments mentionnés précédemment ainsi que de nos souhaits de
                                    développement. Il se traduit par le plan stratégique définissant l’orientation de
                                    l’Organisme pour les cinq années à venir.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="organisme">
                    <div class="title">
                        <h2 data-ariane-section>L'organisme</h2>
                        <div class="underline">
                            <svg class="icon icon--lg">
                                <use xlink:href="#icon-doubleLigneDessin"></use>
                            </svg>
                        </div>
                    </div>

                    <div class="block_description">
                        <div class="content">
                            <div class="paragraphe">
                                <p>Badminton Lachine est un Organisme, à but non lucratif dont les missions sont :</p>
                                <ul>
                                    <li>
                                        <span>Promouvoir le badminton </span> auprès des personnes résidentes de Lachine
                                        et des environs en proposant des programmes et des activités accessibles à tous.
                                    </li>
                                    <li>
                                        <span>Permettre l’accès</span> facile au sport à tous les groupes d’âge et dans
                                        de bonnes conditions.
                                    </li>
                                    <li>
                                        <span>Participer au développement</span> éducatif et sportif des enfants de
                                        Lachine et des environs par l’intermédiaire du sport.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="block_description">
                        <div class="titre">
                            <h4><span>Nos activités</span></h4>
                            <hr />
                        </div>
                        <div class="content">
                            <div class="paragraphe">
                                <p>
                                    L'Organisme propose une variété d'activités pour répondre aux besoins et intérêts de
                                    tous les membres de la communauté de badminton sur le territoire de l’arrondissement
                                    de Lachine. Nos offres d’activités se divisent en deux volets, soit jeunesse et
                                    adulte.
                                </p>
                                <p>
                                    Pour les jeunes âgés de 5 à 17 ans, l’Organisme offre un programme complet, composé
                                    de cinq groupes de niveau allant du niveau débutant à élite. Ceci permet aux enfants
                                    et aux adolescent.e.s de développer leurs compétences et leur passion pour ce sport.
                                    Durant la saison, nous organisons deux soirées avec l’ensemble des membres du volet
                                    jeunesse afin de souligner les vacances de Noël et la fin de la saison. Ces
                                    événements permettent aux entraineur.e.s de féliciter les athlètes qui on eu de bons
                                    résultats ou qui ont été exemplaires.
                                </p>
                                <p>
                                    Les adultes compétitifs bénéficient d'un entraînement par semaine, spécifique pour
                                    affiner leur jeu, tandis que les adultes récréatifs peuvent profiter de sessions de
                                    badminton libre tous les soirs de la semaine.
                                </p>
                                <p>
                                    Les familles sont également les bienvenues pour des moments de jeu conviviaux entre
                                    petits et grands.
                                </p>
                                <p>En ce qui concerne les activités ponctuelles, nous organisons chaque saison :</p>
                                <ul>
                                    <li>un tournoi provincial et deux régionaux;</li>
                                    <li>
                                        deux camps d’entraînement pour les jeunes (ouverts aux membres et non-membres) :
                                        un dédié au haut niveau début septembre et l’autre ouvert à tous les niveaux de
                                        pratique durant le congé de mars;
                                    </li>
                                    <li>divers événements exclusifs réservés à nos membres.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="block_description">
                        <div class="titre">
                            <h4><span>Notre histoire – d’après Julie Bérubé</span></h4>
                            <hr />
                        </div>
                        <div class="content">
                            <div class="paragraphe">
                                <p>
                                    En septembre 2010, Stéphane Fortaich, Lachinois et bénévole de grand cœur, a pris la
                                    relève de l’organisation du badminton pour les citoyens de Lachine, sport qui était
                                    à risque d’extinction.  Peu à peu pendant la saison, des joueurs ont contacté
                                    Stéphane car ils étaient sensibles à la pérennité de leur sport. C’est alors que les
                                    premiers membres du conseil d’administration ont été réunis : René Breyel, Vickel
                                    Coossa, Steve Gagné, Stéphane Fortaich et Julie Bérubé. Ces premiers bénévoles ont
                                    organisé la toute première Classique de Badminton Lachine avec l’aide de la
                                    Fondation Bon Départ et Black Knight. Ce tournoi regroupait une cinquantaine de
                                    joueurs de tous niveaux, jeunes et adultes, et même un volet parent-enfant! Ce fût
                                    la 1ère tradition du club; une tradition qui se voulait rassembleuse, récréative et
                                    pleine d’esprit sportif. Les commerçants de Lachine étaient au rendez-vous en
                                    fournissant des prix de présences à faire tirer parmi les joueurs. Au fil des ans,
                                    ce tournoi a pris de plus en plus d’envergure laissant de côté le volet récréatif
                                    adulte pour se concentrer sur des joueurs de calibre provincial. À chaque mois de
                                    mai, vous pouvez compter sur la Classique pour vous faire vivre des émotions fortes
                                    sur les courts!
                                </p>
                                <p>
                                    Officiellement, Badminton Lachine est né à titre d’organisme à but non lucratif en
                                    juin 2011. Grâce au soutien de Bon Départ, Black Knight, le député de Marquette et
                                    l’Arrondissement (sans oublier le collège Sainte-Anne), le club a bonifié son offre
                                    de services aux citoyens. Au tout début des cours des jeunes, ceux-ci étaient tous
                                    présents en même temps dans le gymnase. Petit à petit, des niveaux se sont formés :
                                    débutant, intermédiaire, compétitif. Au fil des ans, le niveau de jeu des jeunes
                                    joueurs a augmenté grâce à la présence des coachs dévoués au club comme Mike Ngo,
                                    Thi-Van Luong, Martin Lafond, Denyse Julien, Christophe Boulanger, etc. Après
                                    quelques années et beaucoup d’efforts par les coachs et  bénévoles, une structure de
                                    cours a été mise en place, incluant un niveau élite. Une grande fierté est de voir
                                    les jeunes du club évoluer, continuer le sport jusqu’au jour qu’ils s’impliquent
                                    comme animateur, assistant-entraineur ou même entraineur en chef. 
                                </p>
                                <p>
                                    C’est alors que les adultes voulaient aussi bénéficier de plus d’enseignement de
                                    techniques. Des cliniques, des tournois internes ou amicaux avec d’autres clubs ne
                                    suffisaient plus. Un coach a donc débuté des entrainements avec le groupe adulte
                                    compétitif. 
                                </p>
                                <p>
                                    En 2013, notre coach en chef Thi-Van Luong voit le potentiel de l’équipe pour
                                    organiser une étape du circuit adulte provincial. En novembre 2013, l’Invitation
                                    Lachine a eu lieu pour la première fois, étape du circuit Yonex de Badminton Québec.
                                    La qualité des services offerts, des gymnases et la proximité ont aidé au franc
                                    succès de cet événement. 10 ans plus tard, le club est encore un comité organisateur
                                    de choix!   Et n’oublions pas l’implication du club aux Jeux du Québec. Pour la
                                    région du Lac-Saint-Louis, le club a été l’organisateur des tournois de sélections
                                    pour la région pendant plusieurs années. Un autre projet bénévole réussit à
                                    merveille! 
                                </p>
                                <p>
                                    Derrière tout coach, il y a une équipe de bénévoles qui organise, planifie. Les
                                    membres du C.A fondateur ont longtemps été bénévoles et même René et Vickel qui sont
                                    encore actifs après 12 ans! L’équipe a fait preuve de grande stabilité grâce à des
                                    gens dévoués pendant plus de 5 ans, comme Stéphane Fortaich, Francis Colpron,
                                    Martine Javelas, Myriam Leonard, Yannick Raby, Emilie Wong, Vanessa
                                    Blanchette-Luong, Christophe Boulanger et d’autres encore. L’implication des membres
                                    que ce soit ponctuelle ou de longue haleine a nourri les avancements de projets au
                                    club. Mentionnons aussi l’ajout il y a quelques années d’un.e  agent.e
                                    administratif.ve, Camille Deschamps, qui a grandement aidé les bénévoles.  En 2022,
                                    le 1er Directeur-général est arrivé au club, Jean-Samuel Lampron.  
                                </p>
                                <p>
                                    Plusieurs prix ont été remporté par des joueurs du club : des bannières de champion
                                    aux Jeux de Montréal, aux Jeux du Québec, aux championnats provinciaux annuels, des
                                    prix donnés par Badminton Québec marquant les saisons exceptionnelles de certains
                                    joueurs. N’oublions pas les prix gagné par les bénévoles : des prix reconnaissance
                                    de l’Arrondissement, des prix d’organisation pour une étape du circuit provincial,
                                    des mentions pour le meilleur club du Québec. 
                                </p>
                                <p>
                                    L’histoire du club est une de travail d’équipe dynamiques, d’idées innovatrices, de
                                    développement et surtout de bienveillance pour les joueurs. Petits et grands, tous
                                    sont les bienvenus!
                                </p>
                                <p>
                                    Le futur du club sera à découvrir. Pendant mes 11 ans à la présidence, à chaque
                                    année, je voyais nos objectifs se réaliser et même surpassé. Seul 1 rêve demeure :
                                    que le club trouve domicile au futur centre sportif de Lachine afin d’avoir
                                    finalement un «chez-nous» pour nos athlètes, nos bannières et l’esprit bénévole qui
                                    est le moteur derrière le club!  
                                </p>
                                <p><span>Julie Bérubé</span></p>
                                <p>Présidente de Badminton Lachine (2011-2022)</p>
                            </div>
                        </div>
                    </div>

                    <div class="block_description">
                        <div class="titre">
                            <h4><span>Nos valeurs</span></h4>
                            <hr />
                        </div>
                        <div class="content">
                            <div class="paragraphe">
                                <p>
                                    Les valeurs rassemblent les idéaux visés par l’Organisme. Elles fédèrent les
                                    personnes membres, administratrice.s, professionnelles et bénévoles, et façonnent
                                    nos manières de penser et d’agir.
                                </p>

                                <ul>
                                    <li><span>Respect</span></li>
                                    <p>
                                        L’Organisme s’engage à inciter les personnes impliquées de près ou de loin dans
                                        l’organisme à traiter avec égard et considération toutes les personnes qu’elles
                                        côtoieront, à respecter les équipements et à accepter les décisions de Badminton
                                        Lachine.
                                    </p>
                                    <li>
                                        <span>Éthique</span>
                                    </li>
                                    <p>
                                        Les personnes impliquées dans l’Organisme doivent respecter les principes, les
                                        valeurs et le code de conduite de Badminton Lachine et de la communauté sportive
                                        qui comprennent l’ensemble des acteur.rice.s du badminton.
                                    </p>
                                    <li>Partage</li>
                                    <p>
                                        Les personnes impliquées dans l’Organisme doivent partager les ressources mises
                                        à leur disposition (matériel, équipement, ressources humaines et financières)
                                        afin de contribuer à la réalisation des objectifs de Badminton Lachine. Elles
                                        s’engagent également à partager leurs savoirs et leurs connaissances dans le but
                                        de faire évoluer les projets de l’Organisme avant leurs intérêts personnels.
                                    </p>
                                    <li>Accessibilité</li>
                                    <p>
                                        L’Organisme s’engage à rendre ses activités accessibles à toutes les personnes
                                        sans aucune discrimination, quelle qu’elle soit.
                                    </p>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="block_description">
                        <div class="titre">
                            <h4><span>Nos ressources</span></h4>
                            <hr />
                        </div>
                        <div class="content">
                            <div class="paragraphe">
                                <p>
                                    L'Organisme s'appuie sur un éventail de ressources essentielles pour soutenir ses
                                    activités et promouvoir le développement du badminton dans la région.
                                </p>

                                <p>
                                    L’Organisme fait appel à deux catégories de ressources humaines, des personnes
                                    payé.e.s pour leurs services et des bénévoles
                                </p>

                                <ul>
                                    <li>
                                        Concernant la première catégorie, notre équipe comprend un directeur général
                                        dédié à la gestion globale des opérations, ainsi qu'une agente administrative
                                        chargée de l'organisation et de la coordination des activités administratives
                                        quotidiennes. Nous comptons également sur une équipe d'entraîneur.e.s qualifiés
                                        qui travaillent avec passion pour former nos jeunes athlètes et les joueurs
                                        adultes compétitifs. Pour le volet récréatif, nos animateur.rice.s sont là pour
                                        créer un environnement convivial lors des séances de badminton libre et des
                                        événements.
                                    </li>

                                    <li>
                                        De plus, nous pouvons compter sur l’aide précieuse d’une grande équipe de
                                        bénévoles dévouée à faire en sorte que l’Organisme atteint ses objectifs et
                                        remplisse les missions qu’elle se donne. Des bénévoles permanents remplissent
                                        des rôles au sein du conseil d’administration ou sont responsables d’un domaine
                                        indispensable au bon fonctionnement de l’Organisme, tel que la gestion du
                                        matériel et des inscriptions (cf. organigramme). Tandis que certains bénévoles
                                        remplissent des rôles plus ponctuels durant la saison pour organiser ou aider
                                        lors d’événements et activités.
                                    </li>
                                </ul>

                                <p>
                                    En ce qui concerne les <span>ressources matérielles</span> , nous avons accès à un
                                    grand nombre d’heures de plateaux pour les entraînements et le badminton libre grâce
                                    au soutien de l’arrondissement de Lachine qui collabore avec différentes
                                    organisations possédant des installations sportives (Collège Saint-Anne, Collège
                                    Saint-Louis, etc.). Ces infrastructures sont essentielles pour offrir des moments
                                    d’entrainement et de jeux à nos membres, et ce, 7 jours sur 7. De plus, nous avons
                                    accès à ces mêmes plateaux pour nos événements spéciaux, ce qui nous permet
                                    d'organiser des tournois et des camps pour toute la communauté de badminton, membres
                                    et non-membres.
                                </p>

                                <p>
                                    Nous percevons quatre types de <span>ressources financières</span> chaque saison :
                                </p>

                                <ul>
                                    <li>
                                        les frais d'inscription des membres, ainsi que les frais pour les invité.e.s,
                                        constituant la plus grosse part perçue par l’Organisme sans quoi nous ne
                                        pourrions mettre en place nos activités;
                                    </li>
                                    <li>
                                        les profits générés par les événements que nous organisons, tels que les
                                        tournois provinciaux et régionaux;
                                    </li>
                                    <li>
                                        des subventions régulières de l'arrondissement de Lachine pour l’ensemble de nos
                                        activités pour le volet jeunesse ainsi que la participation du Conseil du Sport
                                        de Montréal (CSM) qui soutient nos jeunes athlètes du groupe élite intégrant
                                        l’équipe du Québec;
                                    </li>
                                </ul>
                                <p>
                                    Grâce à ces ressources humaines, matérielles et financières, l'Organisme continue de
                                    prospérer et offre des opportunités exceptionnelles aux amateur.rice.s de badminton
                                    de tous âges et de tous niveaux.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="introduction">
                    <div class="title">
                        <h2 data-ariane-section>L'analyse</h2>
                        <div class="underline">
                            <svg class="icon icon--lg">
                                <use xlink:href="#icon-doubleLigneDessin"></use>
                            </svg>
                        </div>
                    </div>

                    <div class="block_description">
                        <div class="titre">
                            <h4><span>Nos points forts</span></h4>
                            <hr />
                        </div>
                        <div class="content">
                            <div class="paragraphe">
                                <p>
                                    L'Organisme bénéficie de plusieurs points forts qui contribuent à son succès
                                    continu.
                                </p>
                                <p>
                                    Tout d'abord, <span>son équipe actuelle</span> , composée du conseil
                                    d'administration, des bénévoles permanents, du directeur général et de l'agente
                                    administrative, est hautement engagée dans la mission de l’Organisme. Leur
                                    dévouement et leur expertise assurent une gestion efficace et un fonctionnement
                                    harmonieux de l'Organisme.
                                </p>
                                <p>
                                    L’Organisme a également établi une
                                    <span>excellente relation avec l'arrondissement</span> de Lachine, ce qui permet de
                                    bénéficier d'un accès à bas coût à des installations sportives de qualité. Cette
                                    collaboration renforce également les possibilités de développement.
                                </p>
                                <p>
                                    Une autre force majeure réside dans la <span>qualité des entraînements</span> pour
                                    le volet jeunesse que nous avons consolidé au fur et à mesure des années, ce qui se
                                    traduit par une forte demande de jeunes passionné.e.s pour ces activités.
                                </p>
                                <p>
                                    Enfin, la <span>faible concurrence</span> dans la région signifie que l'Organisme
                                    occupe une place privilégiée pour répondre aux besoins des amateur.rice.s locaux,
                                    renforçant ainsi son rôle central dans la promotion du sport dans la région.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="block_description">
                        <div class="titre">
                            <h4><span>Nos points à améliorer</span></h4>
                            <hr />
                        </div>
                        <div class="content">
                            <div class="paragraphe">
                                <p>
                                    L'Organisme, tout en présentant des atouts indéniables, peut s’améliorer sur
                                    certains points.
                                </p>
                                <p>
                                    Premièrement, la <span>connexion entre les membres et l'Organisme</span> est
                                    défaillante. Actuellement, l'implication bénévole demeure un défi, en partie en
                                    raison de la stabilité prolongée du conseil d'administration, qui pourrait gagner en
                                    diversité et en dynamisme grâce à un renouvellement périodique des
                                    administrateur.rice.s. Mais également, en raison du manque de communication et
                                    d’opportunités d’échanges entre les personnes impliquées et les membres.
                                </p>
                                <p>
                                    De plus, <span>l'Organisme dépend largement de l'arrondissement</span> de Lachine
                                    pour ses ressources matérielles, ce qui peut entraîner des contraintes en termes de
                                    disponibilité de plateaux sportifs. Cette dépendance peut limiter la flexibilité et
                                    le développement, voir même être un risque à moyen terme pour nos activités. Cela
                                    pourrait nécessiter une réflexion sur la manière de diversifier les sources de
                                    soutien matériel pour répondre plus efficacement à la demande croissante de ses
                                    membres et éviter une décroissance des activités.
                                </p>
                                <p>
                                    D’ailleurs, la <span>disponibilité restreinte de plateaux sportifs</span> dans
                                    l'arrondissement de Lachine par rapport à la demande est un défi important à relever
                                    pour satisfaire les besoins de joueurs. Étant majoritairement (voire exclusivement)
                                    localisés dans des établissements scolaires, les horaires d’accès à ces plateaux
                                    sont limités. Les horaires sont donc sous-optimaux pour la pratique du badminton,
                                    surtout pour nos jeunes athlètes (horaires tard en soirée).
                                </p>
                                <p>
                                    Enfin, l'Organisme doit faire face à des défis liés à la
                                    <span>stabilité de son personnel</span> , notamment les entraîneur.e.s et les
                                    animateur.rice.s. Les emplois étudiants à temps partiel, avec peu d'heures et
                                    d'horaires fixes, peuvent rendre difficile la fidélisation des professionnel.le.s du
                                    badminton et la création d'une équipe stable et compétente. Il est essentiel de
                                    revoir la professionnalisation de ces postes pour les rendre plus attractifs et
                                    valorisants.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="introduction">
                    <div class="title">
                        <h2 data-ariane-section>Le plan stratégique de développement</h2>
                        <div class="underline">
                            <svg class="icon icon--lg">
                                <use xlink:href="#icon-doubleLigneDessin"></use>
                            </svg>
                        </div>
                    </div>

                    <div class="paragraphe">
                        <p>
                            Le plan stratégique de développement constitue la feuille de route que suivra l’Organisme
                            pour les cinq années à venir.
                        </p>
                        <p>
                            Conçu de manière participative, il est le résultat de la conjugaison de plusieurs facteurs.
                            Il s’inscrit dans une logique de cohérence et d’équilibre entre, d’une part, ce qui nous
                            définit, c’est-à-dire, nos valeurs, nos missions et nos principes et, d’autre part, les
                            actions à mettre en oeuvre afin de répondre aux besoins identifiés dans le cadre de
                            l’analyse établi et ce, tout en tenant compte des évolutions de l’environnement.
                        </p>
                        <p>
                            Il se décline en axes de développement possédant eux-mêmes des objectifs stratégiques et
                            forment le schéma directeur de développement.
                        </p>
                    </div>

                    <div class="block_description">
                        <div class="titre">
                            <h4><span>Stimuler l’engagement associatif</span></h4>
                            <hr />
                        </div>
                        <div class="content">
                            <div class="paragraphe">
                                <p>
                                    L’engagement associatif est l’axe de développement le plus important pour les 5
                                    années qui vont suivre. Dans le but de nourrir la valeur de partage, nous souhaitons
                                    permettre aux membres de s’exprimer et d’échanger entre eux, mais également avec le
                                    Conseil d’Administration. Cela permettra de faire naitre un sentiment d’appartenance
                                    pour rapprocher les membres des acteur.rice.s qui permettent le bon fonctionnement
                                    de l’Organisme. L’objectif visé est donc que les membres et le Conseil
                                    d’administration développent l’Organisme ensemble.
                                </p>
                                <p>Cet axe va se traduire par quatre objectifs stratégiques sous-jacents :</p>
                                <ul>
                                    <li>Amener les membres à se côtoyer sur et en dehors des terrains de badminton</li>
                                    <li>Développer une politique de reconnaissance et d’accompagnement du bénévolat</li>
                                    <li>
                                        Améliorer la communication à l’interne concernant les actions de l’Organisme
                                    </li>
                                    <li>Comprendre les besoins et motivations des membres</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="block_description">
                        <div class="titre">
                            <h4><span>Développer nos activités sur le territoire de Montréal</span></h4>
                            <hr />
                        </div>
                        <div class="content">
                            <div class="paragraphe">
                                <p>
                                    Grâce à la qualité de nos services, depuis plusieurs années, nous ne pouvons
                                    répondre à la demande auprès des citoyen.ne.s de Lachine. Nous devons refuser des
                                    personnes aussi bien chez les jeunes que chez les adultes. Également, tel que
                                    mentionné dans l'analyse, nos accès à des structures sportives sont limités et à des
                                    horaires sous-optimaux pour nos membres. Dans ce contexte, nous souhaitons nous
                                    étendre sur le territoire de Montréal pour diffuser notre expertise, donner à nos
                                    membres l’opportunité de pratiquer dans les meilleures conditions et surtout
                                    pérenniser nos activités.
                                </p>
                                <p>Cet axe va se traduire par trois objectifs stratégiques sous-jacents :</p>
                                <ul>
                                    <li>Embaucher une ressource humaine stable et de qualité</li>
                                    <li>Rechercher de nouveaux lieux de pratique</li>
                                    <li>Envisager la création de nouvelles activités</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="block_description">
                        <div class="titre">
                            <h4><span>Augmenter la visibilité de notre Organisme</span></h4>
                            <hr />
                        </div>
                        <div class="content">
                            <div class="paragraphe">
                                <p>
                                    Cet axe s’inscrit dans le prolongement des deux premiers, il permet de les
                                    consolider et aidera à leur réalisation. La visibilité permettra le recrutement de
                                    nouveaux membres passionnés de badminton en plus de nous faire connaître auprès de
                                    futures instances partenaires.
                                </p>
                                <p>Cet axe va se traduire par deux objectifs stratégiques sous-jacents :</p>
                                <ul>
                                    <li>Améliorer la diffusion d’informations aux citoyen.ne.s de Montréal</li>
                                    <li>
                                        Développer une relation de confiance avec les arrondissements et les instances
                                        du sport
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="introduction">
                    <div class="title">
                        <h2 data-ariane-section>Le plan d'action 2023-2024</h2>
                        <div class="underline">
                            <svg class="icon icon--lg">
                                <use xlink:href="#icon-doubleLigneDessin"></use>
                            </svg>
                        </div>
                    </div>

                    <div class="paragraphe">
                        <p>
                            Nos actions vont être focalisées sur l’axe de développement “stimuler l’engagement
                            associatif” pour cette saison, car c’est la première marche qui va permettre à l’Organisme
                            d’être pérenne et de se développer.
                        </p>
                        <p>
                            Voici une liste d’actions proposées par le CA, pour chaque objectif stratégique de cet axe :
                        </p>
                        <ul>
                            <li>Amener les membres à se côtoyer sur et en dehors des terrains de badminton</li>
                            <li>Organisation d’activités de badminton les samedis pour nos membres</li>
                            <li>
                                Organisation d’un 5 à 7 lors de notre Assemblée Générale Annuelle le mardi 17 octobre
                            </li>
                            <li>Organisation d’un événement de fin d’année pour l’ensemble des membres</li>
                        </ul>

                        <ul>
                            <li>Amener les membres à se côtoyer sur et en dehors des terrains de badminton</li>
                            <li>Organisation d’activités de badminton les samedis pour nos membres</li>
                            <li>
                                Organisation d’un 5 à 7 lors de notre Assemblée Générale Annuelle le mardi 17 octobre
                            </li>
                            <li>Organisation d’un événement de fin d’année pour l’ensemble des membres</li>
                        </ul>

                        <ul>
                            <li>Amener les membres à se côtoyer sur et en dehors des terrains de badminton</li>
                            <li>Organisation d’activités de badminton les samedis pour nos membres</li>
                            <li>
                                Organisation d’un 5 à 7 lors de notre Assemblée Générale Annuelle le mardi 17 octobre
                            </li>
                        </ul>

                        <ul>
                            <li>Amener les membres à se côtoyer sur et en dehors des terrains de badminton</li>
                            <li>Organisation d’activités de badminton les samedis pour nos membres</li>
                            <li>
                                Organisation d’un 5 à 7 lors de notre Assemblée Générale Annuelle le mardi 17 octobre
                            </li>
                            <li>Organisation d’un événement de fin d’année pour l’ensemble des membres</li>
                        </ul>

                        <p>
                            Si une de ces actions vous intéresse, nous vous encourageons à nous contacter par courriel
                            (contact@badmintonlachine.com) ou directement dans le gymnase ou lors d’un événement, les
                            bénévoles de l’Organisme seront toujours à votre écoute et heureux d’échanger avec vous.
                        </p>
                    </div>
                </section>

                <section class="introduction">
                    <div class="title">
                        <h2 data-ariane-section>Conclusion</h2>
                        <div class="underline">
                            <svg class="icon icon--lg">
                                <use xlink:href="#icon-doubleLigneDessin"></use>
                            </svg>
                        </div>
                    </div>

                    <div class="paragraphe">
                        <p>
                            L’exercice stratégique décrit dans ce document permet de se rendre compte que malgré ses
                            défis, nous pouvons nous appuyer sur notre longue histoire, notre engagement envers le
                            développement du badminton et le soutien de la communauté locale pour surmonter ces
                            obstacles. En mettant en œuvre des stratégies visant à renforcer le sentiment d'appartenance
                            des membres; à diversifier et engager davantage de bénévoles, d’entraineur.e.s,
                            d’animateur.rice.s; à explorer d'autres sources de financement et de collaboration pour
                            l’accès à des plateaux sportifs, nous pouvons continuer à prospérer et à promouvoir le
                            badminton dans la grande région de Montréal.
                        </p>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>