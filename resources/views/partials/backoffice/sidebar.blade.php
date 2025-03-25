<div class="left-side-menu">

    <div class="h-100" data-simplebar>
        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{ asset('avatars/default.png') }}" alt="user-img" title="Mat Helme" class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                    data-bs-toggle="dropdown">{{ auth()?->user()->email  }} </a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="/admin/profile" class="dropdown-item notify-item">
                        <i class="fe-user"></i>
                        <span>Mon Profil</span>
                    </a>

                    <!-- item-->
                    <a href="/admin/change-password" class="dropdown-item notify-item">
                        <i class="fe-settings"></i>
                        <span>Changer de mot de passe</span>
                    </a>
                    <!-- item-->
                    <a href="/admin/logout" class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>Déconnexion</span>
                    </a>
                </div>
            </div>
            <p class="text-muted">
                @if (getAdminAuth()->level == 3)
                    Super Admin
                @else
                    Administrateur
                @endif
            </p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">
                <li class="menu-title mt-2">Menu Principal</li>
                <li>
                    <a href="/admin/dashboard">
                        <i data-feather="airplay"></i>
                        <span> Tableau de bord </span>
                    </a>
                </li>

                @if (getAdminAuth()->level == 3)
                    <li>
                        <a href="#sidebarAdmin" data-bs-toggle="collapse">
                            <i data-feather="users"></i>
                            <span> Administrateurs </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarAdmin">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="/admin/admins/add">Ajouter un administrateur</a>
                                </li>
                                <li>
                                    <a href="/admin/admins">Voir tout</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif

                <li>
                    <a href="/admin/posts/immo">
                        <i data-feather="home"></i>
                        <span> Publications Immo </span>
                    </a>
                </li>

                <li>
                    <a href="/admin/posts/auto">
                        <i data-feather="layers"></i>
                        <span> Publications Auto </span>
                    </a>
                </li>


                <li>
                    <a href="#sidebarUsers" data-bs-toggle="collapse">
                        <i data-feather="users"></i>
                        <span> Utilisateurs </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarUsers">
                        <ul class="nav-second-level">
                            <li>
                                <a href="/admin/users/clients">Clients</a>
                            </li>
                            <li>
                                <a href="/admin/users/agents">Agents</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="/admin/posts/boost">
                        <i data-feather="layers"></i>
                        <span> Demandes Boost </span>
                    </a>
                </li>

                <li>
                    <a href="/admin/inquiries">
                        <i data-feather="layers"></i>
                        <span> Demandes clients</span>
                    </a>
                </li>
                <li>
                    <a href="#sidebarBlogs" data-bs-toggle="collapse">
                        <i data-feather="message-square"></i>
                        <span> Blog </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarBlogs">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#">Post</a>
                            </li>
                            <li>
                                <a href="/admin/blog/create">Nouveau</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="/admin/chat">
                        <i data-feather="info"></i>
                        <span> Chat Appli</span>
                    </a>
                </li>

                <li class="menu-title mt-2"> Autres</li>
                <li>
                    <a href="/admin/notifications">
                        <i data-feather="bell"></i>
                        <span> Notifications</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/categories">
                        <i data-feather="layers"></i>
                        <span> Catégories</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/videos">
                        <i data-feather="layers"></i>
                        <span> Vidéos</span>
                    </a>
                </li>

                <li>
                    <a href="/admin/logout">
                        <i class="fe-log-out"></i>
                        <span> Déconnexion </span>
                    </a>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
