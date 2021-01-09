    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark  ">
            <a class="navbar-brand">
                <h3> MoneyMonitor</h3>
            </a>
            <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="my-nav" class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="../expense/expenseView.php">Gastos </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="../note/noteView.php">Nota</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="../../utilities/sessionDestroy.php">Cerrar Sesión</a>
                    </li>
                </ul>
                <h5 class="text-white float-right"> Bienvenido  <?=$_SESSION['user']?> </h5>
            </div>
        </nav>
    </header>



    