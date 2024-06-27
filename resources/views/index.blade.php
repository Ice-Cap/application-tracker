<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applications</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    <h1>Applications</h1>
    <h3>Add application</h3>
    <form action="submit.php" method="post">
        <div>
            <label>
                Company
            </label>
            <input type="text" placeholder="Company" name="company">
        </div>
        <div>
            <label>
                Title
            </label>
            <input type="text" placeholder="Title" name="title">
        </div>
        <div>
            <label>
                Site
            </label>
            <select name="site">
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
            <input type="checkbox" placeholder="Cover letter" name="cover_letter">
        </div>
        <div>
            <label>
                Contacted
            </label>
            <input type="checkbox" placeholder="Contacted" name="contacted">
        </div>
        <div>
            <label>
                Application Type
            </label>
            <select name="application_type">
                <option value="full">Full</option>
                <option value="easy">Easy</option>
            </select>
        </div>
        <div>
            <label>
                Response
            </label>
            <select name="response">
                <option value="none">None</option>
                <option value="no interview">No Interview</option>
                <option value="interview">Interview</option>
                <option value="job offer">Job Offer</option>
            </select>
        </div>
        <button type="submit">Add</button>
    </form>
    <a href="/applications">View applications</a>
</body>
</html>