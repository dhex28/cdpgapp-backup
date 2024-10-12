<!DOCTYPE html>
<html lang="en">
<head>
    <title>History Logs</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;700&display=swap"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Georgia:wght@400;700&display=swap">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container mt-4">
    <h1>Schedule History</h1>
    <table class="table table-striped table-bordered">
        <thead class="thead-light">
            <tr>
                <th>Schedule ID</th>
                <th>Updated By</th>
                <th>Update Time</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($historyLogs as $log): ?>
                <tr>
                    <td><?= htmlspecialchars($log['schedule_id']) ?></td>
                    <td><?= htmlspecialchars($log['updated_by']) ?></td>
                    <td><?= htmlspecialchars($log['update_time']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<style>
     h1 {
            font-family: 'Pacifico', cursive; /* Use script font */
        }
</style>
</body>
</html>