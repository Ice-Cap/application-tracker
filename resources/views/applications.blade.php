<x-layout>
    <x-slot:title>
        All applications
    </x-slot>
    <h3>Applications</h3>
    <form action="/applications" method="get">
        <input type="text" placeholder="search" class="search" name="s" id="search-field"/>
    </form>
    <ul id="search-results" class="hidden">
    </ul>
    <p>Total applications: {{ count($applications) }}</p>
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
                <td>
                    <a href="/applications/{{$application->id}}/edit">
                        {{ $application->company }}
                    </a>
                </td>
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
    <script>
        const search = document.getElementById('search-field');
        const searchResults = document.getElementById('search-results');

        search.addEventListener('input', (e) => {
            const url = '/applications/search' + '?s=' + e.target.value;
            let result = fetch(url)
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Problem fetching data");
                    }
                    return response.json();
                })
                .then((data) => {
                    if (data.length > 0) {
                        searchResults.classList.remove('hidden');
                    } else {
                        searchResults.classList.add('hidden');
                    }
                    let htmlString = '';
                    data.forEach((item) => {
                        htmlString += `<li><a href="/applications?s=${item.company}">` + item.company + "</a></li>";
                        console.log(htmlString)
                    });
                    searchResults.innerHTML = htmlString;
                })
                .catch((error) => {
                    console.error(error)
                });
        });
    </script>
</x-layout>