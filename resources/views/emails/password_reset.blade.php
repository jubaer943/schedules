<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style>
        /* Base styles for email clients */
        body {
            background-color: #f3f4f6;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            margin: 0;
            padding: 0;
            width: 100% !important;
        }

        .wrapper {
            background-color: #f3f4f6;
            padding: 40px 20px;
        }

        .content {
            background-color: #ffffff;
            border-radius: 8px;
            max-width: 600px;
            margin: 0 auto;
            padding: 40px;
            border: 1px solid #e5e7eb;
        }

        .button {
            background-color: #1e40af;
            border-radius: 6px;
            color: #ffffff !important;
            display: inline-block;
            font-weight: bold;
            padding: 12px 30px;
            text-decoration: none;
            margin-top: 25px;
        }

        .footer {
            color: #9ca3af;
            font-size: 12px;
            text-align: center;
            margin-top: 20px;
        }

        .break-link {
            word-break: break-all;
            color: #3b82f6;
            font-size: 12px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="content">
            <h2 style="color: #111827; margin-top: 0;">Password Reset Request</h2>
            <p style="color: #4b5563; line-height: 1.6;">Hello, {{ $user->name }}</p>
            <p style="color: #4b5563; line-height: 1.6;">
                You are receiving this email because we received a password reset request for your account. This link
                will expire in <strong>60 minutes</strong>.
            </p>

            <div style="text-align: center;">
                <a href="{{ $url }}" class="button">Reset Password</a>
            </div>

            <p style="color: #4b5563; line-height: 1.6; margin-top: 25px;">
                If you did not request a password reset, no further action is required.
            </p>

            <hr style="border: 0; border-top: 1px solid #e5e7eb; margin: 30px 0;">

            <p style="color: #6b7280; font-size: 12px;">
                If you're having trouble clicking the button, copy and paste the URL below into your web browser:
            </p>
            <p class="break-link">{{ $url }}</p>
        </div>

        @if ($user->appointments->count() > 0)
            <p>We see you have an upcoming IELTS Mock Test. Don't worry, resetting your password won't affect your
                booking!</p>
        @endif

        <div class="footer">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>
    </div>
</body>

</html>
