class Note {
    controller;

    constructor() {
        this.controller = "Note";
    }

    deactivateNote(action) {
        var checkbox = $("td>input:checkbox:checked");
        var tRow = new Array();
        for (let i = 0; i < checkbox.length; i++) {
            console.log(this.controller + " " + action);
            tRow[i] = {
                "title": checkbox[i].parentElement.parentElement.cells[1].innerText,
                "date": checkbox[i].parentElement.parentElement.cells[2].innerText,
                "desc": checkbox[i].parentElement.parentElement.cells[3].innerText
            };
            //console.log(tRow[i]["name"] + ' ' + tRow[i]["date"]);
        }

        $.ajax({
            type: "post",
            data: { controller: this.controller, action: action, tRow: tRow },
            url: "../../controllers/FrontController.php",
            success: function (response) {

                if (response == "Desactivacion exitosa") {
                    alert(response);
                    // this.getActiveNotes("getActiveNotes");
                } else {
                    alert(response);
                }

            },
            ajaxError: function (response) {
                alert(response);
            }
        });



    }//deactivateNote


    editNote(action) {
        var checkbox = $("td>input:checkbox:checked");
        var tRow;
        var bool = false;

        console.log(this.controller + " " + action);
        tRow = {
            "title": checkbox[checkbox.length - 1].parentElement.parentElement.cells[1].innerText,
            "date": checkbox[checkbox.length - 1].parentElement.parentElement.cells[2].innerText,
            "desc": checkbox[checkbox.length - 1].parentElement.parentElement.cells[3].innerText
        };
        console.log(tRow["title"] + ' ' + tRow["date"] + ' hola');


        $.ajax({
            type: "post",
            data: { controller: this.controller, action: action, tRow: tRow },
            url: "../../controllers/FrontController.php",
            success: function (response) {

                if (response == "Desactivacion exitosa") {
                    alert(response);
                    ;
                } else {
                    var selectedNote = JSON.parse(response)
                    $("#rowInsertNote").css("display", "none");
                    $("#insertNoteTitle").css("display", "none");
                    $("#rowUpdateNote").css("display", "flex");
                    $("#updateNoteTitle").css("display", "flex");
                    $("#titleUpdate").val(selectedNote[0]);
                    $("#descriptionUpd").val(selectedNote[2]);
                    bool = true;

                    // $("#rowInsertNote").attr("id", "rowUpdateNote");
                    // $("#insertNoteTitle").attr("id", "updateNoteTitle");
                    // $("#submitBtn").attr("id", "updateBtn");
                    // $("#submitBtn").attr("value", "Actualizar");
                    // $("#updateNoteTitle>div>h2").text("Actualizar nota");
                    // $("#formInsertNote").attr("id", "formUpdateNote");


                }

            },
            ajaxError: function (response) {
                alert(response);
            }
        });

    }

    updateNote(action) {

        var title = $("#titleUpdate").val();
        var description = $("#descriptionUpd").val();
        console.log(this.controller + " " + action);
        $.ajax({
            type: "post",
            data: { controller: this.controller, action: action, title: title, description: description },
            url: "../../controllers/FrontController.php",
            success: function (response) {

                switch (response) {
                    case "Datos actualizados":
                        alert(response);
                        $("#rowInsertNote").css("display", "flex");
                        $("#insertNoteTitle").css("display", "flex");
                        $("#rowUpdateNote").css("display", "none");
                        $("#updateNoteTitle").css("display", "none");
                        break;
                    case "Error al guardar los datos":
                        alert("Error al guardar los datos. Intente de nuevo");

                        break;
                    case "Error al enviar parametro":

                        alert("Error al enviar parametro. Faltan datos.");
                        break;

                    default:
                        alert(response);
                        break;
                }
            },
            ajaxError: function (response) {
                alert(response);
            }
        });

    }//updateNote

    insertNote(action) {

        var title = $("#title").val();
        var description = $("#description").val();
        console.log(this.controller + " " + action);
        $.ajax({
            type: "post",
            data: { controller: this.controller, action: action, title: title, description: description },
            url: "../../controllers/FrontController.php",
            success: function (response) {

                switch (response) {
                    case "Datos guardados":
                        alert("Datos guardados");


                        break;
                    case "Error al guardar los datos":
                        alert("Error al guardar los datos.Intente de nuevo");

                        break;
                    case "Error al enviar parametro":

                        alert("Error al enviar parametro. Faltan datos.");
                        break;

                    default:
                        alert(response);
                        break;
                }
            },
            ajaxError: function (response) {
                alert(response);
            }
        });

    }//insertNote
    getActiveNotes(action) {
        console.log(this.controller + " " + action);
        $("#tBodyActiveNotes").empty();
        $.ajax({
            type: "post",
            data: { controller: this.controller, action: action },
            url: "../../controllers/FrontController.php",
            success: function (response) {


                if (response == false) {
                    alert("Error en la consulta de las notas");
                }
                else {
                    var activeNotes = JSON.parse(response);
                    for (let i = 0; i < activeNotes.length; i++) {
                        $("#tBodyActiveNotes").append("<tr id=noteRow" + i + "><td> <input type=checkbox id=cbNote" + i + "></td><td>" + activeNotes[i][0] + "</td><td>" +
                            activeNotes[i][1] + "</td><td>" + activeNotes[i][2] + "</td></tr>");
                    }
                }

            },
            ajaxError: function (response) {
                alert(response);
            }
        });

    }//getActiveNotes

    cleanInput() {
        $("Form>div>input").val("");
        $("Form>div>textarea").val("");

    }


    validateForm() {

        var text = $("form>div>input:text").val().trim();
        var textarea = $("form>div>textarea").val().trim();
        if (text.length > 1 && textarea.length > 1) {
            if (text.length < 20) {

                $("form>input:submit").prop("disabled", false);
            }
            else {
                $("form>input:submit").prop("disabled", true);
            }

        }
        else {
            $("form>input:submit").prop("disabled", true);
        }

    }



}



