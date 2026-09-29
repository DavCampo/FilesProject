<x-header>
    <x-slot name="title">Login</x-slot>
    <x-slot name="description">Login to your account</x-slot>
    <x-slot name="keywords">login, account, user</x-slot>
</x-header>
<div class="login-container">
    <div class="login-visual" aria-hidden="true">
        <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?auto=format&fit=crop&w=900&q=85" alt="">
        <div class="login-visual-content">
            <span>Gestión organizada</span>
            <h1>Todos tus archivos, en un solo lugar.</h1>
        </div>
    </div>
    <div class="login-container-form">
        <form action="{{ route('login') }}" id="login-form">
            <p class="header-login">Login to your account</p>
            <label class="param-login" for="email">Email:</label>
            <input class="input-login" type="email" id="email" name="email" placeholder="Enter your email" required="required">
            <label class="param-login" for="password">Password:</label>
            <input class="input-login" type="password" id="password" name="password" placeholder="Enter your password" required="required">
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Login</button>
        </form>
        <div id="login-error"></div>
        <p id="register" class="text-center mt-4 bg-gray-100 p-4 rounded">
            Don't have an account? <a href="{{ route('register.form') }}" class="text-blue-500 hover:underline">Register here</a>.
        </p>
    </div>
</div>
<x-footer>
    <x-slot name="footerText">© 2024 My Application. All rights reserved.</x-slot>
</x-footer>
@vite(['resources/css/app.css', 'resources/js/app.js'])