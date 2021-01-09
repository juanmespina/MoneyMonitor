
$(document).ready(function () {

    var note = new Note();
    note.getActiveNotes("getActiveNotes")
    $("#btnDeactivateNote").prop("disabled", true);
    $("#btnEditNote").prop("disabled", true);
    $("form>input:submit").prop("disabled", true);

    $(document).on("change", "input:checkbox", function () {
        console.log("checked");
        var checkbox = $("td>input:checkbox:checked").length;
        console.log(checkbox);
        if (checkbox > 0 && checkbox < 2) {
            $("#btnEditNote").prop("disabled", false);

        } else if (checkbox > 1) {

            $("#btnDeactivateNote").prop("disabled", false);

        }



    });
    $("#btnDeactivateNote").on("click", function () {
        note.deactivateNote("deactivateNote");
        note.getActiveNotes("getActiveNotes");

    });
    $("form>div>input:text").on("keyup", function () {
        note.validateForm();


    });

    $("form>div>textarea").on("keyup", function () {
        note.validateForm();


    });

    $("#submitBtn").on("click", function (e) {
        e.preventDefault();
        note.insertNote("insertNote");
        note.getActiveNotes("getActiveNotes");
        note.cleanInput();
        console.log("form ready");

    });

    $("#btnEditNote").on("click", function (e) {
        $("#submitBtn").unbind('click');
        //e.stopPropagation();  
        upd = note.editNote("editNote");
        console.log("Edit ready");

        $("#updateBtn").on("click", function (e) {
            e.preventDefault();
            note.updateNote("updateNote");
            note.cleanInput();
            note.getActiveNotes("getActiveNotes");

            console.log("update ready");

        });
    });





    console.log("doc ready");
})











