<?php require_once 'views/layout/head.php'?>
<body>
    <header class="container-fluid">
        <div class="row bg-dark text-white">
            <div class="col text-center">
                <h1>MoneyMonitor</h1>
            </div>
        </div>

    </header>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-5 ">

                <form id="formLogin" >
                    <img class="img-thumbnail img-fluid  rounded-circle" src="assets/img/snorlaxIcon.png" alt="">
                    <div class="form-group">
                        <label for="user">Nombre</label>
                        <input type="text" class="form-control"  id="user" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" required>
                    </div>

                    <input type="button" value="Enter" class="btn btn-primary float-right" id="submitBtn">


                </form>
            </div>
        </div>

    </div>
    <script src="views/member/Member.js"></script>
    <script src="views/member/events.js"></script>

<?php require_once 'views/layout/footer.php' ?>

</body>
</html>


