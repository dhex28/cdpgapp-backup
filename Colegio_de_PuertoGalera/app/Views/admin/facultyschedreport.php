<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty and Schedule Report</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add any additional CSS styles for your report -->
    <style>
        /* Example CSS styles */
        body {
            font-family: Courier, monospace;
            background-color: #f5f5f5;
        }
        .container {
            padding: 20px;
        }
        .table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }
        td {
            font-size: 14px;
            color: #555;
        }
        .section-title {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
            color: #333;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Faculty and Schedule Report</h2>

        <div class="section-title">Faculty Details</div>
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">ID No</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Contact</th>
                    <th class="text-center">Gender</th>
                    <th class="text-center">Address</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($faculty)): ?>
                    <tr>
                        <td class="text-center"><?= $faculty['id_no']; ?></td>
                        <td class="text-center"><?= $faculty['last_name'] . ', ' . $faculty['first_name']; ?></td>
                        <td class="text-center"><?= $faculty['email']; ?></td>
                        <td class="text-center"><?= $faculty['contact']; ?></td>
                        <td class="text-center"><?= $faculty['gender']; ?></td>
                        <td class="text-center"><?= $faculty['address']; ?></td>
                    </tr>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">No faculty details found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="section-title">Schedule Details</div>
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">Day</th>
                    <th class="text-center">Subjects</th>
                    <th class="text-center">Time</th>
                    <th class="text-center">Room</th>
                    <th class="text-center">Semester</th>
                    <th class="text-center">Course Year Section</th>
                    <th class="text-center">Description</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($schedules)): ?>
                    <?php foreach ($schedules as $schedule): ?>
                        <tr>
                            <td class="text-center"><?= esc($schedule['days_of_week']) ?></td>
                            <td class="text-center"><?= esc($schedule['title']) ?></td>
                            <td class="text-center"><?= esc($schedule['time_from']) ?> - <?= esc($schedule['time_to']) ?></td>
                            <td class="text-center"><?= esc($schedule['room']) ?></td>
                            <td class="text-center"><?= esc($schedule['sem']) ?></td>
                            <td class="text-center"><?= esc($schedule['schedule_type']) ?></td>
                            <td class="text-center"><?= esc($schedule['description']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">No schedule details found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
