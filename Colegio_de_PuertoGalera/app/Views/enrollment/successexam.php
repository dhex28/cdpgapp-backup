<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Result</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
        body {
            background-color: #f8f9fa;
            position: relative;
        }

        .result-container {
            margin-top: 50px;
            min-height: calc(100vh - 100px); /* Adjust for fixed button height */
        }

        .result-card {
            width: 100%;
            margin-top: 20px;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .result-card .card-body {
            text-align: center;
            margin-bottom: 50px; /* Adjust margin to make room for the button */
        }

        .result-card .result-info {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .text-success {
            color: #28a745;
            font-size: 24px;
        }

        .text-danger {
            color: #dc3545;
            font-size: 24px;
        }

        .back-button {
            position: absolute;
            bottom: 20px;
            right: 20px;
            z-index: 1;
        }

        .btn-back {
            font-size: 16px;
            font-weight: normal;
            padding: 5px 10px;
        }
    </style>
</head>

<body>
    <div class="container result-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="result-card card">
                <div class="card-body">
                    <h1 class="text-center mb-4">Exam Result</h1>
                    <?php if (!empty($result)) : ?>
                        <p class="result-info">Your Result: <?= $result['result'] ?></p>
                        <?php if ($result['result'] >= $passingScore) : ?>
                            <p class="text-success">Congratulations! You have passed the exam.</p>
                        <?php else : ?>
                            <p class="text-danger">Sorry, you did not pass the exam. Better luck next time.</p>
                        <?php endif; ?>
                    <?php else : ?>
                        <p class="text-center">No result available.</p>
                    <?php endif; ?>
                </div>
                    <!-- Back Button -->
                    <div class="back-button">
                        <a href="/profile" class="btn btn-primary btn-back">Back to Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
