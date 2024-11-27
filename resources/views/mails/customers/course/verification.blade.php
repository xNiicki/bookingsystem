<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buchungsbestätigung</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
<header style="background-color: #f4f4f4; padding: 20px; text-align: center;">
    <h1 style="color: #3498db; margin: 0;">Buchungsbestätigung</h1>
</header>

<main style="padding: 20px;">
    @php
        \Carbon\Carbon::setLocale('de');
        $day = \Carbon\Carbon::parse($course->startDate)->isoFormat('dddd');
    @endphp
    <p>Liebe/Lieber {{ $customer->name }},</p>

    <p>Vielen Dank, dass du einen Kurs bei uns gebucht hast. Deine Buchung wurde bestätigt. Hier sind die Details zu deiner Buchung:</p>

    <h2 style="color: #2c3e50;">{{ $course->name }}</h2>

    <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
        <tr>
            <th style="text-align: left; padding: 10px; border-bottom: 1px solid #ddd; background-color: #f9f9f9;">KursID:</th>
            <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $course->courseID }}</td>
        </tr>
        <tr>
            <th style="text-align: left; padding: 10px; border-bottom: 1px solid #ddd; background-color: #f9f9f9;">Startdatum:</th>
            <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $course->startDate->format('F j, Y') }}</td>
        </tr>
        <tr>
            <th style="text-align: left; padding: 10px; border-bottom: 1px solid #ddd; background-color: #f9f9f9;">Startzeit:</th>
            <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $course->startTime->format('g:i A') }}</td>
        </tr>
        <tr>
            <th style="text-align: left; padding: 10px; border-bottom: 1px solid #ddd; background-color: #f9f9f9;">Tag:</th>
            <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $day }}</td>
        </tr>
        <tr>
            <th style="text-align: left; padding: 10px; border-bottom: 1px solid #ddd; background-color: #f9f9f9;">Termine:</th>
            <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $course->sessions }}</td>
        </tr>
        <tr>
            <th style="text-align: left; padding: 10px; border-bottom: 1px solid #ddd; background-color: #f9f9f9;">Preis:</th>
            <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ number_format($course->price, 2, '.', ',') }} €</td>
        </tr>
        <tr>
            <th style="text-align: left; padding: 10px; border-bottom: 1px solid #ddd; background-color: #f9f9f9;">Ort:</th>
            <td style="padding: 10px; border-bottom: 1px solid #ddd;">{{ $course->location }}</td>
        </tr>
    </table>

    <h3 style="color: #2c3e50;">Kursbeschreibung:</h3>
    <p style="margin-bottom: 20px;">{{ $course->description }}</p>

    <h3 style="color: #2c3e50;">Zahlungsinformation</h3>
    <p style="margin-bottom: 20px;">Die Zahlung erfolgt via Überweisung. Bitte überweise den Betrag auf unser Konto mit der IBAN DE33 1001 1001 2621 3408 00 und BIC NTSBDEB1XXX. Nutze die Kurs ID: "{{$course->courseID}}" als Betreff der Überweisung.</p>

    <h3 style="color: #2c3e50;">Deine Informationen:</h3>
    <ul style="list-style-type: none; padding: 0;">
        <li><strong>Name:</strong> {{ $customer->name }}</li>
        <li><strong>Email:</strong> {{ $customer->email }}</li>
        <li><strong>Handynummer:</strong> {{ $customer->phone }}</li>
    </ul>

    <p>Wenn du deine Buchung ändern möchtest oder Fragen hast, zögere dich nicht, uns zu kontaktieren.</p>

    <a href="mailto:info@janine-lorenz.de" style="display: inline-block; background-color: #3498db; color: #ffffff; text-decoration: none; padding: 10px 20px; border-radius: 5px;">Send Email</a>

    <p style="margin-bottom: 20px; margin-top: 50px">Viele Grüße,
        <br>
        Janine Lorenz
<br> <br>
        Diese Email kommt von:
<br> <br>
        Janine Lorenz
        <br>
        Saturnstraße 2
        <br>
        53842 Troisdorf
        <br>
        0177-3188069
        <br>
        info@janine-lorenz.de
        <br>
        www.janine-lorenz.de</p>


</main>

<footer style="background-color: #f4f4f4; padding: 20px; text-align: center; margin-top: 20px;">
    <p style="margin: 0;">&copy; {{ date('Y') }} Janine Lorenz Frauenfitness. All rights reserved.</p>
</footer>
</body>
</html>
