/*Login or Registration Form Submit*/
$("#registration_form").submit(function (e) {
    e.preventDefault();
    var obj = $(this), action = obj.attr('name'); /*Define variables*/
    $.ajax({
        type: "POST",
        url: e.target.action,
        data: obj.serialize()+"&Action="+action,
        cache: false,
        success: function (JSON) {
            if (JSON.error != '') {
                $("#"+action+" #display_error").show().html(JSON.error);
            } else {
                window.location.href = "./";
            }
        }
    });
});

