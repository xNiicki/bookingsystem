<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Booking Confirmation</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
<header style="background-color: #f4f4f4; padding: 20px; text-align: center;">
    <h1 style="color: #3498db; margin: 0;">Course Booking Confirmation</h1>
</header>

<main style="padding: 20px;">
    <p>Dear {{ $customer->name }},</p>

    <p>Thank you for booking a course with us. Your reservation has been confirmed. Here are the details of your booking:</p>

    <h2 style="color: #2c3e50;">{{ $course->name }}</h2>

    <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
        <tr>
            <th style="text-align: left; padding: 10px; border-bottom: 1px solid #ddd; background-color: #f9f9f9;">Start Date:</th>
            <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $course->startDate->format('F j, Y') }}</td>
        </tr>
        <tr>
            <th style="text-align: left; padding: 10px; border-bottom: 1px solid #ddd; background-color: #f9f9f9;">Start Time:</th>
            <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $course->startTime->format('g:i A') }}</td>
        </tr>
        <tr>
            <th style="text-align: left; padding: 10px; border-bottom: 1px solid #ddd; background-color: #f9f9f9;">Day:</th>
            <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $course->dayName }}</td>
        </tr>
        <tr>
            <th style="text-align: left; padding: 10px; border-bottom: 1px solid #ddd; background-color: #f9f9f9;">Sessions:</th>
            <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $course->sessions }}</td>
        </tr>
        <tr>
            <th style="text-align: left; padding: 10px; border-bottom: 1px solid #ddd; background-color: #f9f9f9;">Price:</th>
            <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ number_format($course->price, 2, '.', ',') }} €</td>
        </tr>
    </table>

    <h3 style="color: #2c3e50;">Course Description:</h3>
    <p style="margin-bottom: 20px;">{{ $course->description }}</p>

    <h3 style="color: #2c3e50;">Your Information:</h3>
    <ul style="list-style-type: none; padding: 0;">
        <li><strong>Name:</strong> {{ $customer->name }}</li>
        <li><strong>Email:</strong> {{ $customer->email }}</li>
        <li><strong>Phone:</strong> {{ $customer->phone }}</li>
    </ul>

    <p>If you need to make any changes to your booking or have any questions, please don't hesitate to contact us.</p>

    <a href="mailto:info@janine-lorenz.de" style="display: inline-block; background-color: #3498db; color: #ffffff; text-decoration: none; padding: 10px 20px; border-radius: 5px;">Send Email</a>
</main>

<footer style="background-color: #f4f4f4; padding: 20px; text-align: center; margin-top: 20px;">
    <p style="margin: 0;">&copy; {{ date('Y') }} Your Company Name. All rights reserved.</p>
</footer>
</body>
</html>
