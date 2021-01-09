$(document).ready(function () {

    var member = new Member();



    $("#submitBtn").on("click", function () {
        console.log("form ready");
        member.checkCredentials('checkCredentials');

    });
    console.log("doc ready");
})











