<a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
</a>
<nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
        <div class="sidebar-brand">
            <a href="#">Gestion Bovins</a>
            <div id="close-sidebar">
                <i class="fas fa-times"></i>
            </div>
        </div>
        <div class="sidebar-header">
            <div class="user-pic">
                <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" alt="User picture">
            </div>
            <div class="user-info">
                <span class="user-name"><?= PRENOM_CLIENT ?><strong> <?= NOM_CLIENT ?></strong></span>
                <span class="user-role">Administrateur</span>
                <span class="user-status">
                    <i class="fa fa-circle"></i>
                    <span>En ligne</span>
                </span>
            </div>
        </div>
        <!-- sidebar-header  -->
        <div class="sidebar-search">
            <div>
                <form id="formSearchBovin" method="get" action="">
                    <div class="input-group">
                        <input id="inputSearchBovin" name="#" type="text" class="form-control search-menu" placeholder="ID bovin">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- sidebar-search  -->
        <div class="sidebar-menu">
            <ul>
                <li class="header-menu">
                    <span>Générale</span>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="far fa-cow"></i>
                        <span>Bovins</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="<?= SROOT ?>">Tous</a>
                            </li>
                            <li>
                                <a href="<?= SROOT ?>bovins/get/veau">Veaux</a>
                            </li>
                            <li>
                                <a href="<?= SROOT ?>bovins/get/vache">Vaches</a>
                            </li>
                            <li>
                                <a href="<?= SROOT ?>bovins/get/toureau">Toureaux</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fa fa-shopping-cart"></i>
                        <span>Achats</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="<?= SROOT ?>achats/ajouter">Nouvel achat</a>
                            </li>
                            <li>
                                <a href="<?= SROOT ?>bovins/achat_bovin">Ajouter bovin à un achat</a>
                            </li>
                            <li>
                                <a href="<?= SROOT ?>achats/get_liste">Consulter les achats</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="far fa-money-bill-alt"></i>
                        <span>Ventes</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="<?= SROOT ?>ventes/ajouter">Nouvelle vente</a>
                            </li>
                            <li>
                                <a href="<?= SROOT ?>bovins/vente_bovin">Ajouter bovin à une vente</a>
                            </li>
                            <li>
                                <a href="<?= SROOT ?>ventes/get_liste">Consulter les ventes</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fas fa-syringe"></i>
                        <span>Vétérinaire</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="<?= SROOT ?>traitements/ajouter">Nouveau traitement</a>
                            </li>
                            <li>
                                <a href="<?= SROOT ?>traitements/get_liste">Consulter les traitements</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fas fa-cubes"></i>
                        <span>Stock</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="<?= SROOT ?>stock/ajouter_medicament">Nouveau stock médicament</a>
                            </li>
                            <li>
                                <a href="<?= SROOT ?>stock/ajouter_nourriture">Nouveau stock nourriture</a>
                            </li>
                            <li>
                                <a href="<?= SROOT ?>stock/liste_nourriture">Nourriture</a>
                            </li>
                            <li>
                                <a href="<?= SROOT ?>stock/liste_medicament">Médicament</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fas fa-store"></i>
                        <span>Marchés</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="<?= SROOT ?>marches/ajouter">Nouveau marché</a>
                            </li>
                            <li>
                                <a href="<?= SROOT ?>marches/">Liste marchés</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fas fa-users"></i>
                        <span>Personnes</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="<?= SROOT ?>personnes/ajouter">Nouveau personne</a>
                            </li>
                            <li>
                                <a href="<?= SROOT ?>personnes/liste/clients">Clients</a>
                            </li>
                            <li>
                                <a href="<?= SROOT ?>personnes/liste/vendeurs">Vendeurs</a>
                            </li>
                            <li>
                                <a href="<?= SROOT ?>personnes/liste/transporteurs">Transporteurs</a>
                            </li>
                            <li>
                                <a href="<?= SROOT ?>personnes/liste/veterinaires">Vétérinaires</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="<?= SROOT ?>bovins/meilleurs_bovins">
                        <i class="fas fa-file-invoice"></i>
                        <span>Meilleurs bovins</span>
                    </a>
                </li>
                <li>
                    <a href="<?= SROOT ?>statistiques">
                        <i class="fas fa-search-plus"></i>
                        <span>Statistiques</span>
                    </a>
                </li>
                <li class="header-menu">
                    <span>Supplémentaire</span>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-book"></i>
                        <span>Documentation</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-calendar"></i>
                        <span>Calendrier</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- sidebar-menu  -->
    </div>
    <script>
        var inputSearchBovin = document.getElementById("inputSearchBovin");
        var formSearchBovin = document.getElementById("formSearchBovin");
        formSearchBovin.addEventListener("submit",function (e) {
            e.preventDefault();
            location = "<?= SROOT ?>bovins/details/"+inputSearchBovin.value;
        });
    </script>
</nav>