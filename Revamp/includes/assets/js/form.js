$(document).ready(function () {
    $("form").submit(function (event) {
        var formData = {
            name: $("#link").val(),
        };

        $.ajax({
            type: "POST",
            //url: "/home.php",
            data: formData,
            //dataType: "json",
            //encode: true,
        }).done(function (data) {
            console.log(data);
        });

        event.preventDefault();
    });
});