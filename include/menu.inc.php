<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        	
    <a class="navbar-brand" href="../pages/accueil.php">PhotoForYou</a>
    <!-- Pour passer en mode hamburger si on est sur un petit écran -->

    <button class="navbar-toggler" type="button" data-toggle="collapse" 
        data-target="#navbarCollapse" aria-controls="navbarCollapse" 
        aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="../pages/accueil.php">Photos</a>
                <div class="dropdown-menu">
                <?php
                
                    
                    if (isset($_SESSION['login']) && $_SESSION['login']==true)  {
                        // Appeler la fonction getMenu
                        $sonType = $_SESSION['TypeUtilisateur'];
                        $menuItems = $menuManager->getMenu($sonType);
                        
                        // Générer le menu HTML
                        echo '<ul class="list-unstyled">';
                        foreach ($menuItems as $menuItem) {
                            echo '<li><a class="dropdown-item"  href="' . $menuItem['Lien'] . '">' . $menuItem['nomMenu'] . '</a></li>';
                        }
                        echo '</ul>';
                    } else {
                        // Appeler la fonction getMenu
                        $sonType = 'visiteur';
                        $menuItems = $menuManager->getMenu($sonType);
                        
                        // Générer le menu HTML
                        echo '<ul class="list-unstyled">';
                        foreach ($menuItems as $menuItem) {
                            echo '<li><a class="dropdown-item" href="' . $menuItem['Lien'] . '">' . $menuItem['nomMenu'] . '</a></li>';
                        }
                        echo '</ul>';
                    }
					
                    ?> 
                    
                </div>
            </li>
            <li class="nav-item">
                    <a class="nav-link" href="#">Tarifs</a>
            </li>
        </ul>

        <!-- formulaire de recherche -->
            <form method="POST" class="form-inline mt-md-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Votre recherche" aria-label="rechercher">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
                <?php
                if (isset($_SESSION['login']) && $_SESSION['login'] == False) {
                    echo '
                    <ul class="navbar-nav mr-right">
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-dark" href="../pages/inscription.php">S\'inscrire</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-dark"  type="submit"  href="../pages/connexion.php">S\'identifier</a>
                        </li>
                    </ul>';
                } else {
                    echo '
                    <ul class="navbar-nav mr-left">
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="../pages/accueil.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                </svg>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right ">';
                            
                   
                        // Appeler la fonction getMenu
                        $sonType = $_SESSION['TypeUtilisateur'];
                        $menuItems = $menuManager->MenuDiplay($sonType);

                        // Générer le menu HTML
                        echo '<ul class="list-unstyled">';
                        foreach ($menuItems as $menuItem) {
                            echo '<li><a class="dropdown-item font-weight-bold"  href="' . $menuItem['Lien'] . '">' . $menuItem['nomMenu'] . '</a></li>';
                        }
                        echo '</ul>';
                    

                    echo '
                        <form action="../pages/connexion.php" method="post">
                            <button type="submit" class="dropdown-item font-weight-bold" name="deconnexion">
                                Déconnexion
                            </button>
                        </form>
                    </div>
                    </li>
                    </ul>';
                }
                ?>
            </form>

    </div>
</nav>