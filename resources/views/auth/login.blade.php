<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" style="width: 23rem;">
      @csrf
    
      <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>
    
      {{-- <x-md-input name="email" label="Login" type="text" messages="$errors->get('email')">
        <x-input-error :messages="$errors->get('{{ $email }}')" class="mt-2" />
      </x-md-input> --}}
      <x-md-input name="email" label="Login" type="text" :messages="$errors->get('email')">
        {{-- Autres éléments à inclure --}}
      </x-md-input>
    

      <x-md-input name="password" label="Mot de passe" type="password" :messages="$errors->get('password')">
        {{-- <x-input-error :messages="$errors->get('{{ $password }}')" class="mt-2" /> --}}
      </x-md-input>


      {{-- <div class="form-outline mb-4">
        <input type="password" id="password" class="form-control form-control-lg" name="password" required autocomplete="current-password">
        <label class="form-label" for="password">Password</label>
        <x-input-error :messages="$errors->get('password')" class="mt-2" />

      </div> --}}
    
      <div class="pt-1 mb-4">
        <button class="btn btn-info btn-lg btn-block" type="submit">Login</button>
      </div>
    
      <p class="small mb-5 pb-lg-2">
        <a class="text-muted" href="{{ route('password.request') }}">Forgot password?</a>
      </p>
      <p>Don't have an account? <a href="{{route('register')}}" class="link-info">Register here</a></p>
    
    </form>
</x-guest-layout>

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/base.js','resources/css/accueil_alternative.css'])

    <title>Document</title>
</head>
<body>

   <section class="vh-100">
    <div class="container-fluid">
      <div class="row">

        <div class="col-sm-6 text-black">
  
          <div class="px-5 ms-xl-4">
            <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
            <span class="h1 fw-bold mb-0">Logo</span>
          </div>
  
          <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
  
            <form method="POST" action="{{ route('login') }}" style="width: 23rem;">
                @csrf
              
                <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>
              
                <div class="form-outline mb-4">
                  <input type="email" id="email" class="form-control form-control-lg" name="email" :value="old('email')" required autofocus autocomplete="username">
                  <label class="form-label" for="email">Email address</label>
                </div>
              
                <div class="form-outline mb-4">
                  <input type="password" id="password" class="form-control form-control-lg" name="password" required autocomplete="current-password">
                  <label class="form-label" for="password">Password</label>
                </div>
              
                <div class="pt-1 mb-4">
                  <button class="btn btn-info btn-lg btn-block" type="submit">Login</button>
                </div>
              
                <p class="small mb-5 pb-lg-2">
                  <a class="text-muted" href="{{ route('password.request') }}">Forgot password?</a>
                </p>
                <p>Don't have an account? <a href="#!" class="link-info">Register here</a></p>
              
            </form>
              
  
          </div>
  
        </div>

        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img3.webp"
            alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
        </div>
      </div>
    </div>
</section>
  
<style>
    .bg-image-vertical {
        position: relative;
        overflow: hidden;
        background-repeat: no-repeat;
        background-position: right center;
        background-size: auto 100%;
      }
      
      @media (min-width: 1025px) {
        .h-custom-2 {
          height: 100%;
        }
      }

</style>
      

</body>
</html> --}}


{{-- 
<section class="vh-100">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="{{asset('assets/images/14107.jpg')}}"
            class="img-fluid" alt="Sample image">
        </div>

        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <form>
            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
              <p class="lead fw-normal mb-0 me-3">Sign in with</p>
              <button type="button" class="btn btn-primary btn-floating mx-1">
                <i class="fab fa-facebook-f"></i>
              </button>
  
              <button type="button" class="btn btn-primary btn-floating mx-1">
                <i class="fab fa-twitter"></i>
              </button>
  
              <button type="button" class="btn btn-primary btn-floating mx-1">
                <i class="fab fa-linkedin-in"></i>
              </button>
            </div>
  
            <div class="divider d-flex align-items-center my-4">
              <p class="text-center fw-bold mx-3 mb-0">Or</p>
            </div>
  
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" id="form3Example3" class="form-control form-control-lg"
                placeholder="Enter a valid email address" />
              <label class="form-label" for="form3Example3">Email address</label>
            </div>
  
            <!-- Password input -->
            <div class="form-outline mb-3">
              <input type="password" id="form3Example4" class="form-control form-control-lg"
                placeholder="Enter password" />
              <label class="form-label" for="form3Example4">Password</label>
            </div>
  
            <div class="d-flex justify-content-between align-items-center">
              <!-- Checkbox -->
              <div class="form-check mb-0">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                <label class="form-check-label" for="form2Example3">
                  Remember me
                </label>
              </div>
              <a href="#!" class="text-body">Forgot password?</a>
            </div>
  
            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="button" class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
              <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#!"
                  class="link-danger">Register</a></p>
            </div>
  
          </form>
        </div>
      </div>
    </div>
    <div
      class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
      <div class="text-white mb-3 mb-md-0">
        &copy; 2020. All rights reserved.
      </div>
      <div>
        <a href="#!" class="text-white me-4">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="#!" class="text-white me-4">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="#!" class="text-white me-4">
          <i class="fab fa-google"></i>
        </a>
        <a href="#!" class="text-white">
          <i class="fab fa-linkedin-in"></i>
        </a>
      </div>
    </div>
</section>

<style>
    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }
    .h-custom {
        height: calc(100% - 73px);
    }
    @media (max-width: 450px) {
        .h-custom {
            height: 100%;
        }
    }
</style> --}}
