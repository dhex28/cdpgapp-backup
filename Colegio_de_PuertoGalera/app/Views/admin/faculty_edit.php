<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Faculty</title>
</head>
<body>
    <h1>Edit Faculty</h1>
    <form action="/faculty/update/<?= $faculty['id']; ?>" method="post">
        <label for="id_no">ID No:</label>
        <input type="text" name="id_no" value="<?= $faculty['id_no']; ?>" required><br>

        <label for="last_name">last Name:</label>
        <input type="text" name="last_name" value="<?= $faculty['last_name']; ?>" required><br>

        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" value="<?= $faculty['first_name']; ?>" required><br>

        <label for="middle_name">Middle Name:</label>
        <input type="text" name="middle_name" value="<?= $faculty['middle_name']; ?>" required><br>
        
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?= $faculty['email']; ?>" required><br>

        <label for="contact">Contact:</label>
        <input type="text" name="contact" value="<?= $faculty['contact']; ?>" required><br>

        <label for="gender">Gender:</label>
        <input type="text" name="gender" value="<?= $faculty['gender']; ?>" required><br>

        <label for="address">Address:</label>
        <input type="text" name="address" value="<?= $faculty['address']; ?>" required><br>
        <button type="submit">Update</button>
    </form>
    <a href="/faculty">Back to Faculty List</a>
</body>
</html>