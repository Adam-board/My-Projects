$(document).ready(function () {


    $("#interview").click(function () {

        $(".item").load("interview.txt");


    });


    $(".item").hover(function () {

        $("img", this).css("display", "none");
        $(".reveal", this).css("display", "block");


    },
        function () {


            $("img", this).css("display", "block");
            $(".reveal", this).css("display", "none");
        });




})