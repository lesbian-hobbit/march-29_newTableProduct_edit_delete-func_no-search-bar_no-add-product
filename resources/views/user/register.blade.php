@include('partials.header')
<x-nav />
<h3> REGISTER HERE</h3>
<form action="/store" method="Post">
@CSRF
<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="name" class="form-control" name="name">
    
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
    @error('email')
    <p>invalid email</p>
    @enderror
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
    @error('email')
    <p>invalid password</p>
    @enderror
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" name="password_confirmation">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@include('partials.footer')