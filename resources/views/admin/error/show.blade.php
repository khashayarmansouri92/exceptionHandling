<!DOCTYPE html>
<html>
<head>
    <title>Error List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
@php
    $error->data = json_decode($error->data);
@endphp
<h1>Error List</h1>
<table>
    <thead>
    <tr>
        <th>Error ID</th>
        <th>User ID</th>
        <th>Error Number</th>
        <th>Error message</th>
        <th>Error code</th>
        <th>Error file</th>
        <th>Error line</th>
        <th>Created At</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{$error->id}}</td>
        <td>{{$error->user_id ? $error->user_id  : 'guest'}}</td>
        <td>{{$error->error_number}}</td>
        <td>{{$error->data->message}}</td>
        <td>{{$error->data->code}}</td>
        <td>{{$error->data->file}}</td>
        <td>{{$error->data->line}}</td>
        <td>{{$error->created_at}}</td>
    </tr>
    </tbody>
</table>
</body>
</html>
