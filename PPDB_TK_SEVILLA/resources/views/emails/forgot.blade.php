@component('mail::message')
Hello {{ $user->name }},

<p>Kami paham terkadang itu terjadi.</p>

@component('mail::button', ['url' => url('reset/' .$user->remember_token)])
Reset Password Anda
@endcomponent

<p>Jika terdapat Kendala hubungi Kami. TK Sevilla Admin</p>
Thanks, <br>
{{ config('app.name') }}
@endcomponent
