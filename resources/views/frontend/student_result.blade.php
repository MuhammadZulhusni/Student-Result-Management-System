<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.ico')}}">
    <title>Result</title>
    <style>
        body {
            background-color: #f0f2f5; /* Light gray background color for the page */
            font-family: Arial, sans-serif;
        }
        .card-container {
            max-width: 600px;
            margin: auto;
            background-color: #ffffff; /* White background color for the card */
            border-radius: 10px; /* Rounded corners for the card */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for the card */
            padding: 20px;
        }
        .fit-content {
            width: 1%;
            white-space: nowrap;
        }
        .table-hover tbody tr:hover {
            background-color: #f5f5f5;
        }
        .card-header div {
            margin-bottom: 10px;
        }
        .page-header {
            text-align: center;
            /* margin-top: 30px; */
            margin-bottom: 20px;
            background-color: #fff;
            padding: 5px 0px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #0056b3;
        }

        .back {
            width: 600px;
            margin: 10px auto;
        }

        .back a {
            color: #222;
            font-family: arial;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Student's Result</h1>
    </div>
    <div class="card-container">
        <div class="card-header">
            <div><strong>Student Name : </strong>  </div>
            <div><strong>Roll ID : </strong>  </div>
            <div><strong>Class : </strong> </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="fit-content">#</th>
                        <th>Subjects</th>
                        <th>Marks</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                  
                    <tr>
                        <td colspan="2" class="text-right"><strong>Total Marks</strong></td>
                        <td> </td>
                    </tr>

                    <tr>
                        <td colspan="2" class="text-right"><strong>Percentage</strong></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td colspan="3" class="text-center">
                            <a href="javascript:window.print()" class="btn">Print Result</a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
    <div class="back"><a href="/">Back To Home</a></div>
    
</body>
</html>
