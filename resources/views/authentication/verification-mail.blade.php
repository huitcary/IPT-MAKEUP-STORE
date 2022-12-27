<div class="container">
  <h1 class="text-center">Hello, {{ $user->name }}!</h1>
  <h3 class="text-center">You've come to the right shop!</h3>
  <h1 class="text-center">GET GLAMMED UP!</h1>

<br>

<h5 class="text-center">Click the link below to get verified and receive notifications from us.</h5>

<p class="text-center">
  <a href="{{ url('/verification/' . $user->id . '/' . $user->remember_token)}} " class="text-center">Get verified</a>
</p>
</div>

