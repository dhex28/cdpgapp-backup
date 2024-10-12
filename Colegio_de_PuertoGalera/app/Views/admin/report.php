<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachers Report</title>
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
        .image-cell img {
            max-width: 100px; /* Adjust the maximum width of the image */
            height: auto;
            border: 1px solid #ddd;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Teachers Report</h2>
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">Name</th>
                    <th class="text-center">Designation</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Image</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($teachers as $teacher): ?>
                    <tr>
                        <td class="text-center"><?= $teacher['name']; ?></td>
                        <td class="text-center"><?= $teacher['designation']; ?></td>
                        <td class="text-center"><?= $teacher['description']; ?></td>
                        <td class="text-center image-cell">
                            <?php if (!empty($teacher['image'])): ?>
                                <img src="<?= base_url('uploads/' . $teacher['image']) ?>" alt="Teacher Image" style="max-width: 50px; max-height: 50px;">
                            <?php else: ?>
                                No Image
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
