
<head>

    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        }
        .table{
            overflow-y: scroll;
            height: 80vh;
        }
        .table table {
            position: relative;
            margin-left: auto;
            margin-right: auto;
            top: 1rem;
            width: 90%;
            border: none;
        }

        .table tr {
            margin: 1rem;
            outline: 1px solid;
        }
        .table td {
            padding: 1rem;
        }
        .table th {
            padding: 0.5rem;
        }

        .table select {
            display: block;
            margin-right: auto;
            margin-left: auto;
            margin-top: 1rem;
            padding: 0.5rem;
            width: auto;
        }
        .bill_confirm input[type=text]{
            display: block;
            margin-right: auto;
            margin-left: auto;
            margin-top: 3rem;
            padding: 1rem;
            width: 240px;
        }
        .bill_confirm input[type=submit]{
            display: block;
            margin-right: auto;
            margin-left: auto;
            margin-top: 1rem;
            padding: 0.5rem;
            width: 200px;
            font-size: 1rem;
        }
        .bill_confirm img{
            margin-top: 2rem;
            max-height: 500px;
            display: block;
            margin-right: auto;
            margin-left: auto;
            text-align: center;
            margin-bottom: 2rem;
            color:red;
        }
    </style>
</head>

<body>
    <div class="table">
        <form method="POST" id="search">
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
        </form>
        <table id="load_details">

        </table>
    </div>
    <div class="bill_confirm">
        <form method="POST" class="search">
            <input type="text" id="insert_bill" placeholder="Enter Bill Name...">
            <input type="submit" id="submit" name="submit" value="Search Bill">
        </form>
        <img src="" id="image_load" alt="Image Not Found">
    </div>


    <script language="JavaScript" type="text/javascript" src="jquery.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="script.js"></script>

</body>
</html>
