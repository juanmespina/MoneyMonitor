class Member {
    controller;

    constructor() {
        this.controller = "Member";
    }

    checkCredentials(action) {

        var user = $("#user").val();
        var password = $("#password").val();
        console.log(this.controller + " " + action);
        console.log(user+" "+password)
        $.ajax({
            type: "POST",
            data: { controller: this.controller, action: action, user: user, password: password },
            url: "../../controllers/FrontController.php",
            success: function (response) {

                switch (response) {
                    case "Bienvenido":

                        alert(response);
                        window.location.href = "views/expense/expenseView.php",true;
                        
                        break;

                    default:
                        alert(response);
                        break;
                }
            },
            ajaxError: function (response) {
                console.log(response );
            }
            //  ,
            //  async:false
        });
       
    }

}


