<x-app-public-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>
            Tailwind Starter Template - Landing Page Template: Tailwind Toolbox
        </title>
        <meta name="description" content="Simple landind page" />
        <meta name="keywords" content="" />
        <meta name="author" content="" />
        <!--Replace with your tailwind.css once created-->
        <!-- Define your gradient here - use online tools to find a gradient matching your branding-->
        <style>
            .gradient {
                background: linear-gradient(90deg, #b91e1e 0%, #ffd8d8 100%);
            }
        </style>
    </head>
    <body class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">
    <!--Hero-->
    <div class="pt-24">
        <div class=" ml-12 container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
            <!--Left Col-->
            <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
                <p class="uppercase tracking-loose w-full">Welcome to the JNM site !</p>
                <h1 class="my-4 text-5xl font-bold leading-tight">
                    Bienvenue sur le site de la Journée Internationale de la MIAGE !
                </h1>
                <div class=" text-2xl font-bold py-6">
                    {{ __("Dans") }}
                    <label id="compteur"></label>
                    <script type="text/javascript">
                        var Affiche = document.getElementById("compteur");

                        function Rebour() {
                            var date1 = new Date();
                            var date2 = new Date("May 1, 2023 00:00:00");
                            var sec = (date2 - date1) / 1000;
                            var n = 24 * 3600;
                            if (sec > 0) {
                                j = Math.floor(sec / n);
                                h = Math.floor((sec - (j * n)) / 3600);
                                mn = Math.floor((sec - ((j * n + h * 3600))) / 60);
                                sec = Math.floor(sec - ((j * n + h * 3600 + mn * 60)));
                                Affiche.innerHTML = "" + j + " j " + h + " h " + mn + " min " + sec + " s";
                            }
                            tRebour = setTimeout("Rebour();", 1000);
                        }

                        Rebour();
                    </script>
                </div>
                <p class="leading-normal text-2xl mb-8">
                    Vous trouverez ici toutes les informations relatives à la JNM et la MIAGE en général.
                </p>
            </div>
            <!--Right Col-->
        </div>
    </div>
    <div class="relative -mt-12 lg:-mt-24">
        <svg viewBox="0 0 1428 174" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
                    <path
                            d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                            opacity="0.100000001"
                    ></path>
                    <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" id="Path-4" opacity="0.200000003"></path>
                </g>
                <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <path
                            d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z"
                    ></path>
                </g>
            </g>
        </svg>
    </div>
    <section class="bg-white border-b py-8">
        <div class="container max-w-5xl mx-auto m-8">
            <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                Présentation de la journée nationale des Miages
            </h2>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>
            <div class="flex flex-wrap">
                <div class="p-6">
                    <p class="text-gray-600 mb-8">
                        La Miage de Nanterre organise cette année et plus précisément en Mai 2023, les JNM
                        (Journées Nationales des Miages ) un événement qui se déroulera sur 3-4jours et qui
                        réunira des étudiants, des enseignants, des diplômés , des partenaires parmi les 21 Miage
                        de France.
                        <br />
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white border-b py-8">
        <div class="container max-w-5xl mx-auto m-8">
            <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                Université Paris Nanterre
            </h2>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>
            <div class="flex flex-wrap">
                <div class="p-6">
                    <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
                        À propos de l’Université Paris Nanterre
                    </h3>
                    <p class="text-gray-600 mb-8">
                        Située à l’ouest de Paris, au cœur d’un territoire d’une grande richesse sociale et urbaine, l’Université Paris Nanterre est une université pluridisciplinaire qui accueille chaque année plus de 35 000 étudiantes et étudiants. Son offre de formation et ses activités de recherche couvrent le large éventail des sciences humaines et sociales, des lettres et des langues, des sciences juridiques, économiques et de gestion, de la technologie, de la culture et des arts, des sciences de l’information et de la communication, des sciences pour l’ingénieur et des sciences et techniques des activités physiques et sportives.

                        L’université est implantée dans le département des Hauts-de-Seine, sur les sites de Nanterre (campus « vert » à 20 min du centre de Paris), Ville-d’Avray, Saint-Cloud et sur le parvis de la Défense.

                        L’établissement compte 1400 personnels enseignants, enseignants chercheurs, chercheurs et 970 personnels administratifs et techniques à l’appui de ses activités de formation (organisées en 10 UFR et instituts) et de recherche (6 écoles doctorales, 42 unités de recherche).

                        Sur le campus de l’Université Paris Nanterre se trouvent également la Maison des Sciences de l’Homme-Mondes et La contemporaine, bibliothèque, archives, musée des mondes contemporains. L’université est membre de la ComUE Université Paris Lumières, du Campus Condorcet et de l’université européenne EDUC.
                        <br />
                        <br />
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white border-b py-8">
        <div class="container mx-auto flex flex-wrap pt-4 pb-12">
            <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                Licence et Master MIAGE
            </h2>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>
            <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
                <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                    <a href="#" class="flex flex-wrap no-underline hover:no-underline">
                        <div class="w-full font-bold text-xl text-gray-800 px-6">
                            Licence MIASHS parcours MIAGE
                        </div>
                        <p class="text-gray-800 text-base px-6 mb-5">
                            La Licence MIASHS est une licence pluridisciplinaire qui associe un tronc commun de mathématiques appliquées et d’informatique à une formation complémentaire en économie et en gestion.
                            Dans cette formation, les étudiants apprennent à modéliser et traiter des problèmes issus du monde économique ou des systèmes d'information des entreprises.
                        </p>
                    </a>
                </div>
            </div>
            <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
                <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                    <a href="#" class="flex flex-wrap no-underline hover:no-underline">
                        <div class="w-full font-bold text-xl text-gray-800 px-6">
                            [Master] Méthodes informatiques appliquées à la gestion des entreprises (MIAGE)
                        </div>
                        <p class="text-gray-800 text-base px-6 mb-5">
                            Le diplôme de Master Miage propose une double compétence et vise la formation des futurs acteurs du développement des organisations capables d’accompagner et de piloter les évolutions de la stratégie des entreprises et des évolutions technologiques numériques.
                            Il se prépare en deux années avec deux formats possibles d’organisation des études : classique avec un stage en entreprise en fin de chacune des deux années ou apprentissage avec alternance de périodes à l’université et de périodes en entreprise tout au long de chacune des deux années.
                        </p>
                    </a>
                </div>
            </div>
            <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
                <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                    <a href="#" class="flex flex-wrap no-underline hover:no-underline">
                        <div class="w-full font-bold text-xl text-gray-800 px-6">
                            Et après ?
                        </div>
                        <p class="text-gray-800 text-base px-6 mb-5">
                            Une fois diplomé d'une licence ou d'un master MIAGE, on peut travailler dans différent secteur :
                            <br>- Les entreprises de services numériques
                            <br>- Les banques, plus largement le secteur de la finance et les compagnies d’assurance
                            <br>- Les entreprises de distribution, de transport, de tourisme
                            <br> Et bien d'autres domaines encore.
                        </p>
                    </a>
                </div>
                <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
                    <div class="flex items-center justify-end">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Change the colour #f8fafc to match the previous section colour -->
    <svg class="wave-top" viewBox="0 0 1439 147" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g transform="translate(-1.000000, -14.000000)" fill-rule="nonzero">
                <g class="wave" fill="#f8fafc">
                    <path
                            d="M1440,84 C1383.555,64.3 1342.555,51.3 1317,45 C1259.5,30.824 1206.707,25.526 1169,22 C1129.711,18.326 1044.426,18.475 980,22 C954.25,23.409 922.25,26.742 884,32 C845.122,37.787 818.455,42.121 804,45 C776.833,50.41 728.136,61.77 713,65 C660.023,76.309 621.544,87.729 584,94 C517.525,105.104 484.525,106.438 429,108 C379.49,106.484 342.823,104.484 319,102 C278.571,97.783 231.737,88.736 205,84 C154.629,75.076 86.296,57.743 0,32 L0,0 L1440,0 L1440,84 Z"
                    ></path>
                </g>
                <g transform="translate(1.000000, 15.000000)" fill="#FFFFFF">
                    <g transform="translate(719.500000, 68.500000) rotate(-180.000000) translate(-719.500000, -68.500000) ">
                        <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
                        <path
                                d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                                opacity="0.100000001"
                        ></path>
                        <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" opacity="0.200000003"></path>
                    </g>
                </g>
            </g>
        </g>
    </svg>
    @include('layouts.footer')
    <!-- jQuery if you need it
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  -->
    <script>
        /Toggle dropdown list/
        /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

        var navMenuDiv = document.getElementById("nav-content");
        var navMenu = document.getElementById("nav-toggle");

        document.onclick = check;
        function check(e) {
            var target = (e && e.target) || (event && event.srcElement);

            //Nav Menu
            if (!checkParent(target, navMenuDiv)) {
                // click NOT on the menu
                if (checkParent(target, navMenu)) {
                    // click on the link
                    if (navMenuDiv.classList.contains("hidden")) {
                        navMenuDiv.classList.remove("hidden");
                    } else {
                        navMenuDiv.classList.add("hidden");
                    }
                } else {
                    // click both outside link and outside menu, hide menu
                    navMenuDiv.classList.add("hidden");
                }
            }
        }
        function checkParent(t, elm) {
            while (t.parentNode) {
                if (t == elm) {
                    return true;
                }
                t = t.parentNode;
            }
            return false;
        }
    </script>
    </body>
    </html>
</x-app-public-layout>