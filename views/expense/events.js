$(document).ready(function () {
    var updateAcc;
    var expense = new Expense();
    $("#submitBtn").prop("disabled", true);

    expense.getLastExpenses("getLastExpenses");
    expense.getLastAccount("getLastAccount");
    expense.getExchangePrice("getExchangePrice");

    $("#paymentMethod").change(function () {
        updateAcc = expense.validateInsertExpenseForm();

    });
    $("#amount").keyup(function () {
        updateAcc = expense.validateInsertExpenseForm();
    })
    $("#dollars").keyup(function () {
        updateAcc = expense.validateInsertExpenseForm();
    })
    $("#amount").keyup(function () {
        expense.calculateExchange("calculateExchange");
    })
    $("#formInsertExpense").submit("submit", function (e) {

        if (window.confirm("¿Está seguro?")) {
            e.preventDefault();
            expense.insertExpense("insertExpense");
            if (updateAcc) {
                console.log(updateAcc); 
                expense.updateAccMoney("updateAccMoney");
            }
            expense.cleanInput();
            expense.getLastExpenses("getLastExpenses");
            expense.getLastAccount("getLastAccount");
            expense.getExchangePrice("getExchangePrice");
        }


    });
    console.log("doc ready");
});










