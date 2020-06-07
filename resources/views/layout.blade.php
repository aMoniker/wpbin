<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('block_title') - {{ env( 'APP_NAME' ) }}</title>
        <link rel="stylesheet" href="{{ asset('/css/wpbin.css') }}">
        <script async type="text/javascript" src="{{ asset('/js/wpbin.js') }}"></script>
        @stack('scripts')
    </head>
    <body>
        <header id="header">
            <nav class="top-bar" data-topbar>
                <ul class="title-area">
                    <li class="logo">
                        <a href="{{ url('/') }}" title="WPBin" id="logo">
                            <img src="{{ asset('/images/wpbin-logo.png') }}">
                        </a>
                        <span class="tagline">{{ env('APP_TAGLINE') }}</span>
                    </li>
                </ul>

                <section class="top-bar-section">
                    <ul class="right">
                        <li class="active">
                            <a href="/"><i class="fa fa-plus-square-o"></i>&nbsp;Bin it!</a>
                        </li>
                    </ul>
                </section>
            </nav>
        </header>

        <div id="content">
            @yield('content')

            @if( isset( $errors ) && is_array( $errors ) && ! empty( $errors ) )
                <div class="row main-errors">
                    <ul class="errors small-12 columns">
                        @foreach( $errors as $error )
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <footer id="footer">
            @yield('footer')
        </footer>
    </body>
</html>
