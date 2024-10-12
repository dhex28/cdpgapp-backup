<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Subject</title>
</head>
<body>
    <h1>Edit Subject</h1>
    
    <!-- Form to edit an existing subject -->
    <form action="/subject_list/update/<?php echo $subject['id']; ?>" method="post">
        <label for="name">Subject Name:</label>
        <input type="text" name="name" id="name" value="<?php echo esc($subject['name']); ?>" required><br>

        <label for="description">Description:</label>
        <textarea name="description" id="description" required><?php echo esc($subject['description']); ?></textarea><br>

        <button type="submit">Update Subject</button>
    </form>

    <!-- Back to subject list -->
    <a href="/subject_list">Back to Subject List</a>
</body>
</html>


