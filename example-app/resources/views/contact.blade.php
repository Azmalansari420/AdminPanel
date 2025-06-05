<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact</title>
</head>
<body>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('contact.store') }}">
    @csrf
    <input type="text" name="name" placeholder="Name">
    <input type="email" name="email" placeholder="Email">
    <input type="text" name="mobile" placeholder="Mobile">
    <input type="text" name="subject" placeholder="Subject">
    <textarea name="message" placeholder="Message"></textarea>
    <button type="submit">Submit</button>
</form>


</body>
</html>
