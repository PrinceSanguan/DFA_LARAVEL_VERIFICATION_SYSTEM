<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <form action="{{ route('register.post') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>
        <div>
            <label for="usertype">User Type:</label>
            <select id="usertype" name="usertype" required>
                <option value="verifier">Verifier</option>
                <option value="processor">Processor</option>
                <option value="supervisor">Supervisor</option>
                <option value="programmer">Programmer</option>
            </select>
        </div>
        <div>
            <button type="submit">Register</button>
        </div>
    </form>
</body>
</html>