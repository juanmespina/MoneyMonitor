<?php require_once '../../utilities/session.php' ?>
<?php require_once '../layout/head.php' ?>

<body>

    <?php require_once '../layout/header.php' ?>

    <div class="container mt-5 " id="noteContainer">



        <div class="row my-5 justify-content-around ">
            <div class="col-5 ">
                <h2 class="d-inline">Notas Activas</h2>
            </div>
            <div class="col-1">
                <button class=" btn btn-primary-outline btn-sm" data-toggle="collapse" data-target="#rowActiveNotes"><img src="../../assets/img/caret-down.png"></button>
            </div>
        </div>
        <div class="row  justify-content-center collapse" id="rowActiveNotes">
            <div class="col-md-8 col-sm-10 text-justify">

                <table class="table table-dark">
                    <thead class="thead-light">
                        <tr>
                            <th>Seleccionar</th>
                            <th>Usuario</th>
                            <th>Fecha</th>
                            <th>Descripcion</th>
                        </tr>
                    </thead>
                    <tbody id="tBodyActiveNotes">

                    </tbody>
                </table>
                <button class="btn btn-warning mx-1 float-right" id="btnDeactivateNote">Desactivar nota</button>
                <button class="btn btn-primary mx-1 float-right" id="btnEditNote">Editar nota</button>
            </div>
        </div>

        <div class="row my-5 justify-content-around  " id="insertNoteTitle">
            <div class="col-5 ">
                <h2 class="d-inline">Agregar Nota</h2>
            </div>
            <div class="col-1">
                <button class=" btn btn-primary-outline btn-sm" data-toggle="collapse" data-target="#rowInsertNote"><img src="../../assets/img/caret-down.png"></button>
            </div>
        </div>

        <div class="row mt-5 justify-content-center" id="rowInsertNote">
            <div class="col-md-8 col-sm-10 text-justify">



                <form id="formInsertNote">
                    <div class="form-group mt-1">
                        <label for="title">Titulo de la nota</label>
                        <input  type="text" class="form-control" name="title" id="title" required />
                    </div>
                    <div class="form-group mt-1">
                        <label for="description">Descripción</label>
                        <textarea class="form-control" id="description" rows="10" required > </textarea>
                    </div>

                    <input type="submit" value="Enviar" id="submitBtn" class="btn btn-primary float-right"/>

                </form>
            </div>

        </div>
        <div class="row my-5 justify-content-around  " id="updateNoteTitle" style="display:none;">
            <div class="col-5 ">
                <h2 class="d-inline">Actualizar Nota</h2>
            </div>
            <div class="col-1"><button class=" btn btn-primary-outline btn-sm" data-toggle="collapse" data-target="#rowUpdateNote"><img src="../../assets/img/caret-down.png"></button></div>
        </div>
        <div class="row mt-5 justify-content-center" id="rowUpdateNote"style="display:none;">
            <div class="col-7 text-justify">
                <form id="formUpdateNote">
                    <div class="form-group mt-1"><label for="titleUpdate">Titulo de la nota</label><input type="text" class="form-control" id="titleUpdate" required></div>
                    <div class="form-group mt-1"><label for="descriptionUpd">Descripción</label><textarea class=" form-control" id="descriptionUpd" rows=" 10" required></textarea></div> 
                    <input type="submit" value="Actualizar" id="updateBtn" class="btn btn-primary float-right">
                </form>
            </div>
        </div>

    </div>


    <script src="Note.js"></script>
    <script src="events.js"></script>
    <?php require_once '../layout/footer.php' ?>





</body>

</html>