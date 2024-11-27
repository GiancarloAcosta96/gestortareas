<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <h2 class="text-center">Iniciar sesión</h2>
                <form id="login-form" method="POST" action="{{ url('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>
                </form>
                <div id="error-message" class="mt-3 text-danger" style="display:none;">
                    Las credenciales son incorrectas.
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('login-form').addEventListener('submit', function(event) {
            console.log("Formulario enviado");
            event.preventDefault();

            let email = document.getElementById('email').value;
            let password = document.getElementById('password').value;


            let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


            fetch('http://127.0.0.1:8001/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        email: email,
                        password: password,
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.token) {
                        console.log("Login exitoso");
                        localStorage.setItem('token', data.token);
                        window.location.href = '/gettareas';
                    } else {
                        console.error("Error: No se recibió token");
                        document.getElementById('error-message').style.display = 'block';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('error-message').style.display = 'block';
                });
        });
    </script>
</body>

</html>