@component('mail::message')
# Recibimos una solicitud para recuperar tu contraseña

Continua al siguiente Link para cambiar tu contraseña

@component('mail::button', ['url' => 'http://127.0.0.1:8000/restaurar-password/ussJ687v6n'])
    Cambiar Contraseña
@endcomponent

Gracias<br>
Hermanos Diaz S.A. de C.V.
@endcomponent
