<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Form Generator</title>
        <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Admin Login</a>

                        {{-- @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif --}}
                    @endauth
                </div>
            @endif

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">FILL UP TIS FORM (This is just for show purpose)</div>

                            <div class="card-body">
                                <form method="POST" action="">
                                    @csrf

                                    @if(!empty($fields))
                                    @foreach($fields as $field)
                                    <div class="form-group row">
                                        <label for="{{ $field->field_name }}" class="col-md-4 col-form-label text-md-right">{{ $field->label }}</label>

                                        <div class="col-md-6">
                                            @if($field->field_type == "select")
                                            <select class="form-control">
                                                <option>Please Select</option>
                                                @php
                                                $options = json_decode($field->attr_values);
                                                @endphp
                                                @if(!empty($options))
                                                @foreach($options as $option)
                                                <option>{{ $option }}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                            @else
                                            <input id="{{ $field->field_name }}" type="{{ $field->field_type }}" class="form-control" name="{{ $field->field_name }}" required autocomplete="{{ $field->field_name }}" autofocus>
                                            @endif

                                        </div>
                                    </div>
                                    @endforeach
                                    @endif

                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                Submit
                                            </button>

                                            
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
