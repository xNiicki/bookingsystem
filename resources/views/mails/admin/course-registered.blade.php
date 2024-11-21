<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Course Registration</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
<header style="background-color: #f4f4f4; padding: 20px; text-align: center;">
    <h1 style="color: #3498db; margin: 0;">New Course Registered</h1>
</header>

<main style="padding: 20px;">
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
            <th style="text-align: left; padding: 10px; border-bottom: 1px solid #ddd; background-color: #f9f9f9;">Capacity:</th>
            <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $course->capacity }}</td>
        </tr>
        <tr>
            <th style="text-align: left; padding: 10px; border-bottom: 1px solid #ddd; background-color: #f9f9f9;">Price:</th>
            <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $course->price }}</td>
        </tr>
    </table>

    <h3 style="color: #2c3e50;">Description:</h3>
    <p style="margin-bottom: 20px;">{{ $course->description }}</p>

    <h3 style="color: #2c3e50;">Trainer(s):</h3>
    <ul style="list-style-type: none; padding: 0;">
        @foreach($course->trainers as $trainer)
            <li style="margin-bottom: 10px;">{{ $trainer->name }}</li>
        @endforeach
    </ul>

    <a href="{{ url('/courses/' . $course->id) }}" style="display: inline-block; background-color: #3498db; color: #ffffff; text-decoration: none; padding: 10px 20px; border-radius: 5px;">View Course Details</a>
</main>

<footer style="background-color: #f4f4f4; padding: 20px; text-align: center; margin-top: 20px;">
    <p style="margin: 0;">&copy; {{ date('Y') }} Your Company Name. All rights reserved.</p>
</footer>
</body>
</html>
