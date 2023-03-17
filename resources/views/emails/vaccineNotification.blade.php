<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Vaccine Registration Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
        }

        .header {
            background-color: #0099ff;
            padding: 20px;
            text-align: center;
            color: #fff;
        }

        .content {
            padding: 20px;
            background-color: #f9f9f9;
        }

        .footer {
            padding: 20px;
            text-align: center;
            background-color: #0099ff;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Vaccine Registration Notification</h1>
        </div>
        <div class="content">
            <p>Dear {{ $emailData['name'] }},</p>
            <p>This is a reminder that your scheduled vaccination date is tomorrow in
                {{ $emailData['scheduled_date'] }}. Please make sure to arrive
                on time and bring your ID and any necessary paperwork.</p>
            <p>Thank you for registering for the vaccine and helping to protect yourself and others.</p>
        </div>
        <div class="footer">
            <p>If you have any questions or concerns, please contact us at help@example.com.</p>
        </div>
    </div>
</body>

</html>
