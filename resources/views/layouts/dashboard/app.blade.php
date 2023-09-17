<!DOCTYPE html>
<html lang="en">

@include('layouts.dashboard.components.head')

<body>
    <div class="wrapper">
        @include('layouts.dashboard.components.sidebar')

        <div class="main">
            @include('layouts.dashboard.components.navbar')

            <main class="content">
                <div class="container-fluid p-0">
                    @yield('content')
                </div>
            </main>

            @include('layouts.dashboard.components.footer')
        </div>
    </div>

</body>

</html>
