<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Your Page Title</title>
    <link rel="stylesheet" href="/css/tips.css">
</head>
<body>
<header>
    <h1 class="myHeader">Have an Idea?</h1>
</header>
<p class="myText">
    Why don't you share it with us<br>
    We love to know what you think<br>
    And what we can do to improve!
    <br>

    <a href="/"> <button class="myButton">Go Home</button></a>
    <a href="{{ route('tips.create') }}"> <button class="myButton">Continue</button></a>

</p>
</body>
</html>
