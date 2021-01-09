class Expense {
    controller;

    constructor() {
        this.controller = "Expense";
    }

    insertExpense(action) {

            var amount = $("#amount").val();
            var dollars = $("#dollars").val();
            var paymentMethod = $("#paymentMethod").prop('selectedIndex') + 1;
            var category = $("#category").prop('selectedIndex') + 1;
            var description = $("#description").val();
            console.log(this.controller + " " + action);
            console.log(amount + " " + dollars + " " + paymentMethod + " " + category + " " + description)
            $.ajax({
                type: "post",
                data: { controller: this.controller, action: action, amount: amount, dollars: dollars, paymentMethod: paymentMethod, category: category, description: description },
                url: "../../controllers/FrontController.php",
                success: function(response) {
                    console.log(response)
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
                ajaxError: function(response) {
                    alert(response);
                }
            });

        } //insertExpense

    getLastExpenses(action) {
            console.log(this.controller + " " + action);
            $("#tBodyLastExpenses").empty();
            $.ajax({
                type: "post",
                data: { controller: this.controller, action: action },
                url: "../../controllers/FrontController.php",
                success: function(response) {


                    if (response == false) {
                        alert("Error en la consulta de los ultimos gastos");
                    } else {

                        var lastExpenses = JSON.parse(response);
                        for (let i = 0; i < lastExpenses.length; i++) {
                            $("#tBodyLastExpenses").prepend("<tr><td>" + lastExpenses[i][0] + "</td><td>" +
                                lastExpenses[i][1] + "</td><td>" + lastExpenses[i][2] + "</td><td>" + lastExpenses[i][3] +
                                "</td><td>" + lastExpenses[i][4] + "</td><td>" + lastExpenses[i][5] + "</td></tr>");

                        }
                    }
                },
                ajaxError: function(response) {
                    alert(response);
                }
            });

        } //getLastExpenses

    getLastAccount(action) {
        console.log(this.controller + " " + action);
        $.ajax({
            type: "post",
            data: { controller: this.controller, action: action },
            url: "../../controllers/FrontController.php",
            success: function(response) {

                if (response == false) {
                    alert("Error en la consulta de la cuenta bancaria");
                } else {
                    console.log(response)
                    var lastAccount = JSON.parse(response);
                    $("#jumboExpenseSubtitle1").text("Disponible en la cuenta " + lastAccount.money);
                }
            },
            ajaxError: function(response) {
                alert(response);
            }
        });
    }

    getExchangePrice(action) {
            console.log(this.controller + " " + action);
            $.ajax({
                type: "post",
                data: { controller: this.controller, action: action },
                url: "../../controllers/FrontController.php",
                success: function(response) {
                    if (response == false) {
                        alert("Error en la consulta de la tasa");
                    } else {
                        var lastAccount = JSON.parse(response);
                        $("#jumboExpenseSubtitle").text(lastAccount.rate + " tasa de la fecha " + lastAccount.date);
                    }
                },
                ajaxError: function(response) {
                    alert(response);
                }
            });

        } //getExchangePrice

    calculateExchange(action) {
        console.log(this.controller + " " + action);
        $("#dollars").val(" ");
        var bolivares = $("#amount").val();
        $.ajax({
            type: "post",
            data: { controller: this.controller, action: action, bolivares: bolivares },
            url: "../../controllers/FrontController.php",
            success: function(response) {

                switch (response) {
                    case "Error en la consulta de la tasa":
                        alert(response);
                        break;
                    default:
                        $("#dollars").val(parseFloat(response).toFixed(2));
                        break;
                }
            },
            ajaxError: function(response) {
                alert(response);
            }
        });

    }
    updateAccMoney(action) {
            console.log(this.controller + " " + action);
            var amount = $("#amount").val();
            $.ajax({
                type: "post",
                data: { controller: this.controller, action: action, amount: amount },
                url: "../../controllers/FrontController.php",
                success: function(response) {

                    switch (response) {
                        case "Datos guardados":
                            console.log("Datos guardados");

                            break;
                        case "Error al guardar los datos":
                            console.log("Error al guardar los datos.Intente de nuevo");

                            break;
                        case "Error al enviar parametro":

                            console.log("Error al enviar parametro. Faltan datos.");
                            break;

                        default:
                            alert(response);
                            break;
                    }
                },
                ajaxError: function(response) {
                    alert(response);
                }
            });

        } //updateAccMoney


    validateInsertExpenseForm() {
        var updateAcc = true;
        var amount = $("#amount");
        var dollars = $("#dollars");

        if ($("#paymentMethod").prop('selectedIndex') == 4 || $("#paymentMethod").prop('selectedIndex') == 3) {
            updateAcc = false;
            amount.val('');
            amount.prop("disabled", true);

            if (dollars.val().trim().length > 0 && typeof parseFloat($("#dollars").val()) == "number") {
                $("#submitBtn").prop("disabled", false);
            } else {
                console.log("olololol");
                $("#submitBtn").prop("disabled", true);
            }

        } else {
            amount.prop("disabled", false);
            updateAcc = true;
            if (dollars.val().trim().length > 0 && typeof parseFloat($("#dollars").val()) == "number") {
                if (amount.val().trim().length > 0 && typeof parseFloat($("#amount").val()) == "number") {
                    $("#submitBtn").prop("disabled", false);
                } else {

                    $("#submitBtn").prop("disabled", true);
                }
            } else {
                $("#submitBtn").prop("disabled", true);
            }

        };
        return updateAcc;
    }

    cleanInput() {
        $("Form>div>input").val("");
        $("Form>div>textarea").val("");

    }




}