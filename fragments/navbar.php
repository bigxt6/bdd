<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <div class="container-fluid">
        <div class="navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link <?php echo ((basename($_SERVER['PHP_SELF'], '.php') === '' || basename($_SERVER['PHP_SELF'], '.php') === 'index') ? 'active' : '') ?>" href="./">Accueil</a></li>
                <li class="nav-item"><a class="nav-link <?php echo (basename($_SERVER['PHP_SELF'], '.php') === 'clients' ? 'active' : '') ?>" href="./clients.php">Clients</a></li>
                <li class="nav-item"><a class="nav-link <?php echo (basename($_SERVER['PHP_SELF'], '.php') === 'ouvrages' ? 'active' : '') ?>" href="./ouvrages.php">Ouvrages</a></li>
                <li class="nav-item"><a class="nav-link <?php echo (basename($_SERVER['PHP_SELF'], '.php') === 'prets' ? 'active' : '') ?>" href="./prets.php">Prêts</a></li>
            </ul>
        </div>
    </div>
</nav>