<?php require_once '../../utilities/session.php' ?>
<?php require_once '../layout/head.php' ?>

<body>

    <?php require_once '../layout/header.php' ?>

    <div class="container mt-5  ">
        <div class="jumbotron mt-2" id="jumboExpense">
            <h1 class="display-4" id="jumboExpenseTitle">Último precio $</h1>
            <p class="lead" id="jumboExpenseSubtitle"></p>
            <p class="lead" id="jumboExpenseSubtitle1"></p>
            <hr class="my-4">
        </div>
        <div class="row my-5 justify-content-around  ">
            <div class="col-5 ">
                <h2 class="d-inline">Últimos 15 gastos</h2>

                <!-- <input type="image"  data-toggle="collapse" data-target="rowTExpenses" src="../../assets/img/caret-down.png" alt=""> -->
            </div>
            <div class="col-1">
                <button class=" btn btn-primary-outline btn-sm" data-toggle="collapse" data-target="#rowTExpenses"><img src="../../assets/img/caret-down.png"></button>
            </div>
        </div>
        <div class="row  justify-content-center collapse" id="rowTExpenses">
            <div class="col-md-8 col-sm-10 text-justify">

                <table class="table table-dark">
                    <thead class="thead-light">
                        <tr>
                            <th>Usuario</th>
                            <th>Categoría</th>
                            <th>Monto en BS</th>
                            <th>Monto en dólares</th>
                            <th>Fecha</th>
                            <th>Descripción</th>
                        </tr>
                    </thead>
                    <tbody id="tBodyLastExpenses">

                    </tbody>
                </table>
            </div>
        </div>

        <div class="row my-5 justify-content-around  ">
            <div class="col-5 ">
                <h2 class="d-inline">Agregar Gasto</h2>

                <!-- <input type="image"  data-toggle="collapse" data-target="rowTExpenses" src="../../assets/img/caret-down.png" alt=""> -->
            </div>
            <div class="col-1">
                <button class=" btn btn-primary-outline btn-sm" data-toggle="collapse" data-target="#rowInsertExpense"><img src="../../assets/img/caret-down.png"></button>
            </div>
        </div>

        <div class="row mt-5 justify-content-center" id="rowInsertExpense">
            <div class="col-md-8 col-sm-10 text-justify">
                <div class="form-group mt-1">
                    <label for="paymentMethod">Metodo De Pago</label>
                    <select class="form-control" id="paymentMethod" required>
                        <option>Débito</option>
                        <option>Pago Móvil</option>
                        <option>Efectivo</option>
                        <option>Efectivo en dólares</option>
                        <option>Zelle o Transferencia normal en dólares</option>
                    </select>
                </div>

                <div class="form-group mt-1 ">
                    <label for="category">Categoría Del Pago</label>
                    <select class="form-control" id="category" required>
                        <option>Carne o Pollo</option>
                        <option>Verdura</option>
                        <option>Acompañantes</option>
                        <option>Frutas</option>
                        <option>Golosinas</option>
                        <option>Carro</option>
                        <option>Casa</option>
                        <option>Comida callejera</option>
                        <option>Perros</option>
                        <option>Gato</option>
                        <option>Peluqueria</option>
                        <option>Medicina</option>
                        <option>Panaderia</option>
                        <option>Charcuteria</option>
                        <option>Otros</option>
                    </select>
                </div>

                <form id="formInsertExpense">
                    <div class="form-group mt-1">
                        <label for="amount">Cantidad en Bolívares</label>
                        <input type="number" value="0" step="0.01" class="form-control" id="amount" required>
                    </div>

                    <div class="form-group mt-1">
                        <label for="dollars">Cantidad en USD</label>
                        <input type="number" value="0" step="0.01" class="form-control" id="dollars" required>
                    </div>



                    <div class="form-group mt-1">
                        <label for="description">Descripción</label>
                        <textarea class="form-control" id="description" required> </textarea>
                    </div>


                    <input id="submitBtn" type="submit" value="Enviar" class="btn btn-primary float-right">

                </form>
            </div>

        </div>


    </div>


    <script src="Expense.js"></script>
    <script src="events.js"></script>
    <?php require_once '../layout/footer.php' ?>





</body>

</html>