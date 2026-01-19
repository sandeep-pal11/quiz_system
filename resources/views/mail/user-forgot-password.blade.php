<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reset Password</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f3f4f6; margin: 0; padding: 0;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); margin-top: 40px;">
        <div style="text-align: center; margin-bottom: 20px;">
            <h2 style="color: #2563eb; font-size: 24px; font-weight: bold; margin: 0;">Quiz Master</h2>
        </div>
        
        <div style="padding: 20px; color: #374151; font-size: 16px; line-height: 1.5;">
            <p>Hi User,</p>
            <p>We received a request to reset your password for your Quiz Master account.</p>
            <p>If you didn't ask to reset your password, you can ignore this email.</p>
            
            <div style="text-align: center; margin: 30px 0;">
                <a href="{{$link}}" style="background-color: #2563eb; color: #ffffff; text-decoration: none; padding: 12px 24px; border-radius: 6px; font-weight: bold; display: inline-block;">Reset Password</a>
            </div>
            
            <p style="font-size: 14px; color: #6b7280;">Or copy and paste this link into your browser:<br> <a href="{{$link}}" style="color: #2563eb;">{{$link}}</a></p>
        </div>
        
        <div style="text-align: center; margin-top: 20px; padding-top: 20px; border-top: 1px solid #e5e7eb; color: #9ca3af; font-size: 12px;">
            <p>&copy; {{ date('Y') }} Quiz Master. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
