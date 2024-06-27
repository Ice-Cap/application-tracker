<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css'])
    <title>All Applications</title>
</head>
<body>
    <div>
        <h3>Applications</h3>
        <p>Total applications: {{ count($applications) }}</p>
    </div>
    <table>
        <tr>
            <th>Company</th>
            <th>Title</th>
            <th>Site</th>
            <th>Cover Letter</th>
            <th>Contacted</th>
            <th>Application Type</th>
            <th>Response</th>
            <th>Date Created</th>
        </tr>
        @foreach ($applications as $application)
            <tr>
                <td>{{ $application->company }}</td>
                <td>{{ $application->title }}</td>
                <td>{{ $application->site }}</td>
                <td>{{ $application->cover_letter }}</td>
                <td>{{ $application->contacted }}</td>
                <td>{{ $application->application_type }}</td>
                <td>{{ $application->response }}</td>
                <td>{{ $application->date_created }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>