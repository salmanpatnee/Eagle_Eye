<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    
    .table-container {
    max-width: 300px;
    margin: auto;
}
        /* Reset default browser styles */

/* Style table headers */
th {
    background-color: #f2f2f2;
    border: 1px solid #dddddd;
    padding: 8px;
    text-align: left;
}

/* Style table cells */
td {
    border: 1px solid #dddddd;
    padding: 8px;
}

/* Style alternate rows */
tr:nth-child(even) {
    background-color: #f9f9f9;
}

/* Hover effect */
tr:hover {
    background-color: #f2f2f2;
}
table {
    /* border-collapse: collapse; */
    width: 100%;
    /* table-layout: fixed; */
    display: block;
    overflow-x: auto;
    white-space: nowrap;
}
    </style>
</head>
<body>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>phone</th>
                    <th>address</th>
                    <th>street</th>
                    <th>street 2</th>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>phone</th>
                    <th>address</th>
                    <th>street</th>
                    <th>street 2</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>id</td>
                    <td>name</td>
                    <td>email</td>
                    <td>phone</td>
                    <td>address</td>
                    <td>street</td>
                    <td>street 2</td>
                    <td>id</td>
                    <td>name</td>
                    <td>email</td>
                    <td>phone</td>
                    <td>address</td>
                    <td>street</td>
                    <td>street 2</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>