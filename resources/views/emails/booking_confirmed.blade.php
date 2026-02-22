<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .button {
            background-color: #0056b3; /* Professional Blue */
            color: white;
            padding: 14px 28px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            font-weight: bold;
        }
        .container {
            font-family: 'Segoe UI', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            border: 1px solid #e1e1e1;
            padding: 40px;
        }
        .header-text {
            color: #1a202c;
            border-bottom: 2px solid #0056b3;
            padding-bottom: 10px;
        }
        .details-box {
            background: #f8fafc;
            padding: 20px;
            border-left: 4px solid #0056b3;
            border-radius: 4px;
            margin: 25px 0;
        }
        .footer {
            font-size: 12px;
            color: #718096;
            margin-top: 30px;
            text-align: center;
            border-top: 1px solid #edf2f7;
            padding-top: 20px;
        }
        .important-note {
            font-size: 14px;
            color: #c53030;
            background: #fff5f5;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="header-text">IELTS Mock Test Confirmation</h2>
        
        <p>Dear Student,</p>
        
        <p>Thank you for choosing <strong>Oasis Informatics</strong>. Your IELTS Mock Test has been successfully scheduled. This session is designed to simulate the real exam environment to help you achieve your target band score.</p>

        <div class="details-box">
            <strong>Exam Details:</strong><br>
            📅 <strong>Test Date:</strong> {{ $registration->schedule->date }}<br>
            ⏰ <strong>Reporting Time:</strong> {{ $registration->schedule->schedule }} (Local Time)<br>
            💻 <strong>Platform:</strong> Zoom Video Conferencing
        </div>

        <!-- <p class="important-note">
            <strong>Note:</strong> Please ensure you have a stable internet connection, a working microphone, and your ID/Passport ready for verification.
        </p> -->

        <p style="text-align: center; margin: 35px 0;">
            <a href="{{ $url }}" class="button">Start Your Mock Test</a>
        </p>

        <p>If the button above doesn't work, please use the direct link below:<br>
        <small style="word-break: break-all; color: #4a5568;">{{ $url }}</small></p>

        <p>We wish you the very best of luck with your preparation!</p>

        <p>Best Regards,<br>
        <strong>Oasis Informatics Team</strong></p>

        <div class="footer">
            &copy; {{ date('Y') }} Oasis Informatics. All rights reserved.<br>
            This is an automated confirmation. Please do not reply to this email.
        </div>
    </div>
</body>
</html>