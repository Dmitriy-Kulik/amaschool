@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <section class="login-form__social-enter">
                            <span class="login-form__invite">Login with</span>
                            <a href="{!! route('socialite.auth', 'facebook') !!}" class="social-links__facebook">
                                <img width="38" height="38" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAATcSURBVGhD7VrNjxRFFN9V48EbqFf+AC4aQCWyM70rotPdk8hsVR9YBTGePHgxfhyMrjfhDwDCBYFAjKjxoLtGAwRMPBg+DvgBaDyhHoRwFZYD/l71r3q6Z+mZ6q+FkPklL9t59T6rX72qrtmJMcYYY+UQRdGDrW5vXSvQr3uB2u35+mA7UJ8LybPwZExkJubnH6DaPQIENB3Ovoggj3i+uu4F+rYTGVl1pO3rLXc1KZl9zPJrCObyYJDtQN8A/0LbV99C5piQeRaeGRuUV5daoXp1xRNqhfppBHcuE4yvLyLI96cD9YwkSdFl8DzvIZGB7Ieik7WhzuJNbaBoo5jE7L2HIG4lzgN9vOXr5zheGKKLSTmZsndLfGBoMpaoGWuj6GHM2Kcph1cwsy9xuDLaoe6JTWsfZXhUfHK4HjAJ1HiSxNebt259lMO1QWzCzzeJH/isM5lJ6S7WOGp4z7A1UBViGxO1L/EH32BXLzOpV2sUz3vJbhziq5+Mfofscmh3ek/J4qOxhSbfxCBMew/0YuxbLc2E0XoOFQMNnRdDsgg3vqBXc2jF4HW3PYZ18hdjOFNqn/GCaGc8G/p2qe4Ep9gn5qQxoL3+aXbyAaLkUEz7s8rGAXs7yHYEgsDrNDs2AjlOrjPWd7uPQP+EDSCPKD4SWC+nRF420EJvJT47xc7awewM2c7AG/jM6g8jio/EdEdttjpIZgvZo4HZPEqli2Q5YybsPWGdjiKqOAGT83uspw6RNRxmkUsNi5KvPiDbGel2PYqo4gSU+LzoYHKvOZWXtDnrSA53ZDsDye+3+mmSOt/UjdZMhXOrLFHFCa1APdu3Fz1Jdj7ijyLj+L8y+4bpUonDDL1JkVKQUzMm6WZsK9pJdj5Qg7tFGK/wZ7IKIX1WylBHv0GR0sAk/WJs+XoXWfmQxUTnC2QVQqOJ8OCKv5+QlQ9k+6VxjBZK1lBMdfRaWeAJDXwsWcJsfpWRA9GEMxDTMdr6gqx8FE0Egc+lA3Yn9S9NOKNYIv3SWiRrKCokcoEmnFG0tHbFwm6LvUIi39OEM+xiRyIfk5WPou23bCJOs5pC4fYrl2eJw05vI9m58DrRlKldS4H+J9FPk9y6ZOW204QTCm+I5uRb5YjSUPtFLB+JHdi/6nwCRv3yG11dJssZTSWCUv/D2PH1QbJGI32ML3pn1UQiXjj7fGIHz2Q7AK8OM3ApVlYnyHVCI4n4+rTYQGMp9mElkLtYG4RcnpE9EnUn4oU6sjZaHf0y2e6Q1ougzooB9O8rrhdydSaC48/j0I27oK9+Kvw2LKC8AaW1xGAW3faVehLhRMa3m9g/Sl8HWaAu37XBYN2MvKCrKxHx1ddXb5NdCYNXpvuHvZmqiYht8dHXrenKVDB4iQ1akPrlcAZVEuGa+M7qiM9GbuQxO+Z2xZCv/kZwmsMJyiZiupPYTHQa+Fkhhcl4zSQNQHba0+lNqmgiZrPz9Q99WbUEH29hqJkfetKQDoKWfCYTqNw74TyEIH7M8C0xETnFmgOgyNpjhyW0WPOL74pCdn9f7wDd8dN2Gfn6N8z2rwiWR/H0mJKxV0rvE7UAzqU8UFKHkdS1ZUHmEOSvIvhDpizvagJ3AgIyV6byszW+NFE6B0DmHwbMM77sZExk7r3gxxjjfsbExP/IrltdVfFnCwAAAABJRU5ErkJggg==">
                            </a>
                        </section>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
