<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Your Page Title</title>
    <link rel="stylesheet" href="/css/tips-create.css">
</head>
<body class="myImage">
<header>
    <h1 class="myHeader">Please fill in the form</h1>
</header>
<form class="form" method="POST" action="{{ route('tips.index') }}">
    @csrf

    <div class="field">
        <label class="label" for="first_name">First Name</label>
        <div class="control">
            <input class="input @error('first_name') is-invalid @enderror @if(!empty(old('first_name'))) is-filled @endif" type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" placeholder="Please write a name like: John">
            @if ($errors->has('first_name'))
                <p class="error-message">Please provide a valid first name like in the input field.</p>
            @endif
        </div>
    </div>

    <div class="field">
        <label class="label" for="last_name">Last Name</label>
        <div class="control">
            <input class="input @error('last_name') is-invalid @enderror @if(!empty(old('last_name'))) is-filled @endif"type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" placeholder="Please write a last name like: Doe">
            @if ($errors->has('last_name'))
                <p class="error-message">Please provide a valid last name like in the input field.</p>
            @endif
        </div>
    </div>

    <div class="field">
        <label class="label" for="email">Email</label>
        <div class="control">
            <input class="input @error('email') is-invalid @enderror @if(!empty(old('email'))) is-filled @endif" type="email" name="email" id="email" value="{{ old('email') }}"placeholder="Please write a e-mail like: JohnDoe@gmail.com">
            @if ($errors->has('email'))
                <p class="error-message">Please check if you have filled in the correct form of an e-mail.</p>
            @endif
        </div>
    </div>

    <div class="field">
        <label class="label" for="telephone">Telephone</label>
        <div class="control">
            <input class="input @error('telephone') is-invalid @enderror @if(!empty(old('telephone'))) is-filled @endif" type="tel" name="telephone" id="telephone" value="{{ old('telephone') }}" placeholder="Please write a phone number like: 0617265859">
            @if ($errors->has('telephone'))
                <p class="error-message">Please check if the format of your number is correct</p>
            @endif
        </div>
    </div>

    <div class="field">
        <label class="label" for="idea">Idea</label>
        <div class="control">
            <input class="input @error('idea') is-invalid @enderror @if(!empty(old('idea'))) is-filled @endif" name="idea" id="idea" value="{{ old('idea') }}" placeholder="Please write out your idea"></textarea>
            @if ($errors->has('idea'))
                <p class="error-message">Please fill out your idea, this field is required.</p>
            @endif
        </div>
    </div>

    <div>
    <div>
    <div class="button-container">
        <button type="submit">Submit</button>
        <a href="/" class="home-button">Go Home</a>
    </div>
</div>
    </div>
</form>
</body>
</html>
