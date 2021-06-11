

var queryParams = new URLSearchParams(window.location.search);

var password = queryParams.get("password");
if (queryParams.has("password") == true && password == "2021latest") {

} else {
    $("body").empty();
}

var options = 2;
$.ajax({
    type: "POST",
    url: "events.php",
    data: {
        options: options,
    },
    success: function(data) {
        if (data == "") {

            $("#load_amb").empty().appendTo("<tr><td colspan='8' style='text-align:center; color:red;'>There Is No Data</td></tr>");
        }
        else {
            $("#load_amb").empty().append(data);
        }
    }
  }); 
