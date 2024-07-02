<x-layout>
    @php
        $response = $response ?? null;
        $search = $search ?? null;
    @endphp
    <x-slot:title>
        All applications
    </x-slot>
    <h3>Applications</h3>
    <form action="/applications" method="get" autocomplete="off">
        <input
            type="text"
            placeholder="search"
            class="search" name="s"
            id="search-field"
            autocomplete="off"
            value="{{ $search }}"
        />
        <ul id="search-results" class="hidden">
        </ul>
        <label>
            Response
        </label>
        <select name="response">
            <option value="any">Any</option>
            <option value="none" @selected($response === 'none')>None</option>
            <option value="no interview" @selected($response === 'no interview')>No Interview</option>
            <option value="interview" @selected($response === 'interview')>Interview</option>
            <option value="job offer" @selected($response === 'job offer')>Job Offer</option>
        </select>
        <button type="submit">Filter</button>
    </form>
    <p class="total-applications">Total applications: {{ count($applications) }}</p>
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
            @php
                $cover_letter = $application->cover_letter;
                if ($cover_letter)
                {
                    $cover_letter = 'yes';
                }
                else
                {
                    $cover_letter = 'no';
                }

                $contacted = $application->contacted;
                if ($contacted)
                {
                    $contacted = 'yes';
                }
                else
                {
                    $contacted = 'no';
                }
            @endphp
            <tr>
                <td>
                    <a href="/applications/{{$application->id}}/edit">
                        {{ $application->company }}
                    </a>
                </td>
                <td>{{ $application->title }}</td>
                <td>{{ $application->site }}</td>
                <td>{{ $cover_letter }}</td>
                <td>{{ $contacted }}</td>
                <td>{{ $application->application_type }}</td>
                <td>{{ $application->response }}</td>
                <td>{{ $application->created_at }}</td>
            </tr>
        @endforeach
    </table>
    <script>
        const search = document.getElementById('search-field');
        const searchResults = document.getElementById('search-results');

        window.addEventListener('click', (e) => {
            if (!searchResults.classList.contains('hidden')) {
                searchResults.classList.add('hidden')
            }
        });

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
                    });
                    searchResults.innerHTML = htmlString;
                })
                .catch((error) => {
                    console.error(error)
                });
        });
    </script>
</x-layout>