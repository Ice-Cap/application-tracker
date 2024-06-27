<x-layout>
    <h1>{{ $application->company }} - {{ $application->title }}</h1>
    <h3>Edit application</h3>
    <form action="submit.php" method="post">
        <div>
            <label>
                Company
            </label>
            <input type="text" placeholder="Company" name="company" value={{ $application->company }}>
        </div>
        <div>
            <label>
                Title
            </label>
            <input type="text" placeholder="Title" name="title" value={{ $application->title }}>
        </div>
        <div>
            <label>
                Site
            </label>
            <select name="site" value={{ $application->site }}>
                <option value="linkedin">LinkedIn</option>
                <option value="indeed">Indeed</option>
                <option value="levels">Levels.fyi</option>
                <option value="direct">direct</option>
            </select>
        </div>
        <div>
            <label>
                Cover Letter
            </label>
            <input type="checkbox" placeholder="Cover letter" name="cover_letter" value={{ $application->cover_letter }}>
        </div>
        <div>
            <label>
                Contacted
            </label>
            <input type="checkbox" placeholder="Contacted" name="contacted" value={{ $application->contacted }}>
        </div>
        <div>
            <label>
                Application Type
            </label>
            <select name="application_type" value={{ $application->application_type }}>
                <option value="full">Full</option>
                <option value="easy">Easy</option>
            </select>
        </div>
        <div>
            <label>
                Response
            </label>
            <select name="response" value={{ $application->response }}>
                <option value="none">None</option>
                <option value="no interview">No Interview</option>
                <option value="interview">Interview</option>
                <option value="job offer">Job Offer</option>
            </select>
        </div>
        <button type="submit">Update</button>
    </form>
</x-layout>