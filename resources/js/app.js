const loginform = document.getElementById('login-form');
const registerform = document.getElementById('register_form');

function routeToDashboard() {
    window.location.href = '/dashboard';
}

if (loginform) {
    loginform.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(loginform);
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        formData.append('_token', csrfToken);
        const response = await fetch('/auth/login', {
            method: 'POST',
            body: formData,
        });
        const data = await response.json();
        if (response.ok && data.redirect) {
            window.location.href = data.redirect;
        } else {
            alert(data.message);
        }
    });
}

if (registerform) {
    console.log("Register form found");
    registerform.addEventListener('submit', async (e) => {
        e.preventDefault();
        try{
        const formData = new FormData(registerform);
        console.log(registerform.action);
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        formData.append('_token', csrfToken);
        const response = await fetch(registerform.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });
        const data = await response.json();
        //console.log("Response from server:", data);
        //console.log(data);
         if (response.ok && data.redirect) {
            window.location.href = data.redirect;
        } else {
            console.error('Errores de validación:', data);
        }
    } catch (error) {
        console.error('Error en la solicitud:', error);
    }
        /* if (data.success) {
            window.location.href = data.redirect;
        } else {
            alert(data.message);
        } */
    });
}