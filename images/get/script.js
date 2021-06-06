

$(".search").submit(function (e) {
    e.preventDefault();

    var newvalue = $(".search #insert_bill").val();
    $("#image_load").attr("src", "../../uploads/" + newvalue + "");
});

$("#options").change(function(){

    load_data();
});
load_data();


function load_data() {
    url = "events.php";
    if( $('#options').find(":selected").val() == ""){
        var posting = $.post(url, {
            eventID: null,
            options: "1",
        });
    }else{
        var posting = $.post(url, {
            eventID: $('#options').find(":selected").val(),
            options: "1",
        });
    }
    posting.done(function (data) {
        if (data == "") {

            $("#load_details").empty().appendTo("<tr><td colspan='8' style='text-align:center; color:red;'>There Is No Data</td></tr>");
        }
        else {
            $("#load_details").empty().append(data);
        }
    });

}

var queryParams = new URLSearchParams(window.location.search);

console.log(queryParams.has("password"));
var password = queryParams.get("password");
console.log(password);
if(queryParams.has("password") == true && password == "2021latest"){

}else{
$("body").empty();
}