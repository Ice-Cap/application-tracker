<x-layout>
    <x-slot:title>
        All applications
    </x-slot>
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
</x-layout>