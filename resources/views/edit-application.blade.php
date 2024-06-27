<x-layout>
    <h1>{{ $application->company }} - {{ $application->title }}</h1>
    <h3>Edit application</h3>
    <form action="submit.php" method="post">
        <div>
            <label>
                Company
            </label>
            <input type="text" placeholder="Company" name="company" value="{{ $application->company }}">
        </div>
        <div>
            <label>
                Title
            </label>
            <input type="text" placeholder="Title" name="title" value="{{ $application->title }}">
        </div>
        <div>
            <label>
                Site
            </label>
            @php
                $site = $application->site;
            @endphp
            <select name="site">
                <option value="linkedin" @selected($site === 'linkedin')>LinkedIn</option>
                <option value="indeed" @selected($site === 'indeed')>Indeed</option>
                <option value="levels" @selected($site === 'levels')>Levels.fyi</option>
                <option value="direct" @selected($site === 'direct')>direct</option>
            </select>
        </div>
        <div>
            <label>
                Cover Letter
            </label>
            <input type="checkbox" placeholder="Cover letter" name="cover_letter" @checked($application->cover_letter)>
        </div>
        <div>
            <label>
                Contacted
            </label>
            <input type="checkbox" placeholder="Contacted" name="contacted" @checked($application->contacted)>
        </div>
        <div>
            <label>
                Application Type
            </label>
            @php
                $type = $application->application_type;
            @endphp
            <select name="application_type">
                <option value="full" @selected($type === 'full')>Full</option>
                <option value="easy" @selected($type === 'easy')>Easy</option>
            </select>
        </div>
        <div>
            <label>
                Response
            </label>
            @php
                $response = $application->response;
            @endphp
            <select name="response">
                <option value="none" @selected($response === 'none')>None</option>
                <option value="no interview" @selected($response === 'no interview')>No Interview</option>
                <option value="interview" @selected($response === 'interview')>Interview</option>
                <option value="job offer" @selected($response === 'job offer')>Job Offer</option>
            </select>
        </div>
        <button type="submit">Update</button>
    </form>
</x-layout>