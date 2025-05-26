<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $campaign->subject ?? 'Campaign Email' }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f7fa;
            color: #333;
            padding: 20px;
        }
        .email-container {
            max-width: 600px;
            margin: auto;
            background-color: #ffffff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        }
        .header {
            font-size: 24px;
            margin-bottom: 15px;
        }
        .body {
            font-size: 16px;
            line-height: 1.6;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            {{ $campaign->subject }}
        </div>
        <div class="body">
            <p>Hi {{ $contact->name }},</p>
            <p>{!! nl2br(e($campaign->message)) !!}</p>
        </div>
        <div class="footer">
            <p>This email was sent as part of our campaign outreach.</p>
        </div>
    </div>
</body>
</html>
