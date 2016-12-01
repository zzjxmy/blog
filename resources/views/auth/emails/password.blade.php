<p><h1>Click here to reset your password:</h1></p>
<a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
<p><h3>This url valid time 20 minutes</h3></p>
