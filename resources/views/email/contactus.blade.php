<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submission</title>
</head>
<body style="margin: 0; padding: 40px 0; background-color: #f4f4f4; font-family: Arial, sans-serif;">
    <div style="width: 100%; max-width: 600px; margin: 0 auto; background-color: #000000; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <div style="padding: 20px; text-align: center;">
            <img src="http://dev.outcomemet.com/public/assetsindex/assets/img/logo.png" alt="Logo" style="max-width: 200px; margin-bottom: 20px;">
            <h1 style="margin: 0; color: #ffffff;">Contact Form Submission</h1>
        </div>
        <div style="padding: 20px;">
            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <th style="padding: 15px; text-align: left; border-bottom: 1px solid #dddddd; background-color: #333333; color: #ffffff;">Name</th>
                    <td style="padding: 15px; text-align: left; border-bottom: 1px solid #dddddd; color: #ffffff;">{{ $request->name }}</td>
                </tr>
                <tr>
                    <th style="padding: 15px; text-align: left; border-bottom: 1px solid #dddddd; background-color: #333333; color: #ffffff;">Email</th>
                    <td style="padding: 15px; text-align: left; border-bottom: 1px solid #dddddd; color: #ffffff;">{{ $request->email }}</td>
                </tr>
                <tr>
                    <th style="padding: 15px; text-align: left; border-bottom: 1px solid #dddddd; background-color: #333333; color: #ffffff;">Phone number</th>
                    <td style="padding: 15px; text-align: left; border-bottom: 1px solid #dddddd; color: #ffffff;">{{ $request->phonenumber }}</td>
                </tr>
                <tr>
                    <th style="padding: 15px; text-align: left; border-bottom: 1px solid #dddddd; background-color: #333333; color: #ffffff;">Message</th>
                    <td style="padding: 15px; text-align: left; border-bottom: 1px solid #dddddd; color: #ffffff;">{!! $request->message !!}</td>
                </tr>
            </table>
        </div>
        <div style="background-color: #06b0ef; color: #ffffff; padding: 10px; text-align: center;">
            <p style="margin: 0;">Thank you for contacting us!</p>
        </div>
    </div>
</body>
</html>
