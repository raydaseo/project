@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    <script>
        setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
    });
}, 2000); // Menghilangkan setelah 5 detik (5000 milidetik)
    </script>
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('error') }}
    </div>
    <script>
        setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
    });
}, 2000); // Menghilangkan setelah 5 detik (5000 milidetik)
    </script>
    </div>
@endif

@if ($errors->any())
    <div class="pt-3">
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
        <script>
            setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
    });
}, 1000); // Menghilangkan setelah 5 detik (5000 milidetik)
        </script>
    </div>
@endif

@if (session()->has('loginError'))
    <div class="pt-3">
        <div class="alert alert-danger">
            {{ session('loginError') }}
        </div>
        <script>
            setTimeout(function() {
                document.querySelector('.alert').style.display = 'none';
            }, 2000); // Menghilangkan setelah 5 detik (5000 milidetik)
        </script>
    </div>
@endif
