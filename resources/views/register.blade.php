<x-header>
    <x-slot name="title">Register</x-slot>
    <x-slot name="description">Create a new account</x-slot>
    <x-slot name="keywords">register, account, user</x-slot>
</x-header>
<div class="register-container">
    <div class="register-form">
        <p class="header-register">Create a new account</p>
        <form action="{{ route('register.submit') }}" method="POST" id="register_form">
            @csrf
        <label class="param-register" for="name">Name:</label>
        <input class="input-register" type="text" id="name" name="name" required="required">
        <label class="param-register" for="email">Email:</label>
        <input class="input-register" type="email" id="email" name="email" required="required">
        <label class="param-register" for="company">Company:</label>
        <input class="input-register" type="text" id="company" name="company" required="required">
        <label class="param-register" for="password">Password:</label>
        <input class="input-register" type="password" id="password" name="password" required="required">
            <label class="param-register" for="password_confirmation">Confirm password:</label>
            <input class="input-register" type="password" id="password_confirmation" name="password_confirmation" required="required">
        <button class="register-button" type="submit">Register</button>
        </form>
        <div id="register-error" style="color: red; display: none;"></div>
        <p id="login">
            Already have an account? <a class="text-blue-500 hover:underline" href="{{ route('login') }}">Login here</a>.
        </p>
    </div>
</div>
<x-footer>
    <x-slot name="footerText">© 2024 My Application. All rights reserved.</x-slot>
</x-footer>
@vite(['resources/css/app.css', 'resources/js/app.js'])
