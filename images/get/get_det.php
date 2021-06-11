<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        .table {
            overflow-y: scroll;
            height: 80vh;
            display: block;
            width: 99%;
            margin-left: 0;
            margin-right: 0;
        }

        .table table {
            position: relative;
            margin-left: auto;
            margin-right: auto;
            top: 0rem;
            width: 90%;
            border: none;
        }

        .table tr {
            margin: 1rem;
            outline: 1px solid;
        }

        .table td {
            padding: 1rem;
            white-space: nowrap;
        }

        .table th {
            padding: 0.5rem;
        }

        #search a {
            display: block;
            margin-left: auto;
            margin-right: auto;
            float: left;
            background-color: red;
            border: none;
            padding: 0.5rem;
            color: #fff;
            font-size: 0.9rem;
            margin-left: 0.5rem;
            position: relative;
            top: 0.3rem;
            cursor: pointer;
        }

        #options {
            display: block;
            margin-right: auto;
            margin-left: auto;
            position: relative;
            top: 0.3rem;
            padding: 0.5rem;
            width: auto;
            margin-bottom: 1rem;
            float: right;
        }

        .left {
            float: left;
            width: 50%;
        }

        .image {
            float: left;
            width: 100%;
        }

        .bill_confirm {
            position: relative;
            margin-top: 0.5rem;
        }

        .bill_confirm input[type=text] {
            display: block;
            margin-right: auto;
            margin-left: auto;
            margin-top: 0rem;
            padding: 1rem;
            float: right;
            width: 240px;
        }

        .bill_confirm input[type=submit] {
            display: block;
            margin-right: auto;
            margin-left: auto;
            margin-left: 0.5rem;
            float: left;
            position: relative;
            color: #fff;
            border: none;
            background-color: green;
            margin-top: 0.5rem;
            padding: 0.5rem 0.1rem 0.5rem 0.1rem;
            width: 150px;
            font-size: 1rem;
        }

        .bill_confirm img {
            margin-top: 2rem;
            max-height: 500px;
            display: block;
            margin-right: auto;
            margin-left: auto;
            text-align: center;
            margin-bottom: 2rem;
            color: red;
        }

        @media(max-width:672px) {
            .left {
                float: left;
                width: 100%;
            }

            .bill_confirm {
                position: relative;
                top: 1rem;
            }

            .bill_confirm input[type=text] {
                display: block;
                margin-right: auto;
                margin-left: auto;
                float: none;
            }

            .bill_confirm input[type=submit] {
                display: block;
                margin-right: auto;
                margin-left: auto;
                float: none;
            }

            #options {
                float: none;
            }

            #search a {
                top: -0.3rem;
                text-align: center;
                margin: 0;
                display: block;
                margin-left: auto;
                margin-right: auto;
                float: none;
                width:80%;
            }

        }
    </style>
</head>


<body>
    <form method="POST" id="search">
        <div class="left">
            <select id="options">
                <option selected value>All Events</option>
                <option value="1">Crime Scene Investigation</option>
                <option value="2">Bitcoin Prediction</option>
                <option value="3">Coding Competition</option>
                <option value="4">Hackathon </option>
                <option value="5">Idea Pitching</option>
                <option value="6">Article Writing</option>
                <option value="7">Instagram Reels</option>
                <option value="8">Photography</option>
                <option value="9">Mega Quiz</option>
                <option value="10">Poster Design</option>
                <option value="11">Treasure Hunt</option>
                <option value="12">PES Tournament</option>
                <option value="13">COD Tournament</option>
                <option value="14">Chess</option>
                <option value="15">Ethical Hacking Workshop</option>
                <option value="16">Data science Workshop</option>
                <option value="17">Webinar on LinkedIn For Career Management</option>
                <option value="18">Webinar on Cryptocurrency</option>
            </select>
        </div>
        <div class="left">
            <a onclick="exportTableToCSV()">Download CSV File</a>
        </div>
    </form>
    <div class="table">
        <table id="load_details">

        </table>
    </div>
    <div class="bill_confirm">
        <form method="POST" class="search">
            <div class="left">
                <input type="text" id="insert_bill" placeholder="Enter Bill Name...">
            </div>
            <div class="left">
                <input type="submit" id="submit" name="submit" value="Search Bill">
            </div>
        </form>
        <div class="image">
            <img src="" id="image_load" alt="Image Not Found">
        </div>
    </div>



    <script language="JavaScript" type="text/javascript" src="jquery.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="script.js"></script>

</body>

</html>