

$(".search").submit(function (e) {
    e.preventDefault();

    var newvalue = $(".search #insert_bill").val();
    $(".image #image_load").attr("src", "../../uploads/" + newvalue + "");
});

$("#options").change(function () {

    load_data();
});
load_data();


function load_data() {
    var name = $("#options option:selected").text()
    $("#search a").text("Download "+ name +" CSV File");
    url = "events.php";
    if ($('#options').find(":selected").val() == "") {
        var posting = $.post(url, {
            eventID: null,
            options: "1",
        });
    } else {
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
            findlist = document.getElementsByClassName("college_list");
            for(var i=0; i<findlist.length; i++){
                newstring = findlist[i].innerText;
                newstring = newstring.replace(/,/g, ' - ');
                findlist[i].innerText = newstring;
            }
        }
    });

}

var queryParams = new URLSearchParams(window.location.search);

var password = queryParams.get("password");
if (queryParams.has("password") == true && password == "2021latest") {

} else {
    $("body").empty();
}


function downloadCSV(csv) {
    var csvFile;
    var downloadLink;

    csvFile = new Blob([csv], {type: "text/csv"});
    downloadLink = document.createElement("a");
    var newfilename = $("#options option:selected").text();
    downloadLink.download = Math.floor(Math.random()*10000)+"_"+newfilename+".csv";
    downloadLink.href = window.URL.createObjectURL(csvFile);
    downloadLink.style.display = "none";
    document.body.appendChild(downloadLink);
    downloadLink.click();
}

function exportTableToCSV() {
    var csv = [];
    var rows = document.querySelectorAll(".table table tr");
    
    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll("td, th");
        for (var j = 0; j < cols.length; j++) 
            row.push(cols[j].innerText);
        
        csv.push(row.join(","));        
    }

    downloadCSV(csv.join("\n"));
}
