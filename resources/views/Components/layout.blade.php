<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Creative Coder</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="/ckeditor5/ckeditor5.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>

<body id="home">

    <!-- navbar -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Creative Coder</a>
            <div class="d-flex">

            @auth()
                <a href="/" class="nav-link">{{auth()->user()->name}}</a>
                <form action="/logout" method="post">
                    @csrf
                    <button class="logout_confirm nav-link btn btn-submit">Logout</button>
                </form>
            @else
                <a href="/register" class="nav-link">Register</a>
                <a href="/login" class="nav-link">Login</a>
            @endauth

            <a href="#blogs" class="nav-link">Blogs</a>

            @if (Auth::user() && Auth::user()->is_admin)
                <a href="/admin/blogs" class="nav-link">Dashboard</a>
            @endif

        </div>
        </div>
    </nav>

    {{$slot}}

    <!-- footer -->
    <div class="bg-dark text-white p-5">
        <footer class="py-3">
            <ul class="nav justify-content-center">
            <li class="nav-item">
                <a href="#home" class="nav-link px-2">Home</a>
            </li>
            <li class="nav-item">
                <a href="#blogs" class="nav-link px-2">Blogs</a>
            </li>
            <li class="nav-item">
                <a href="#subscribe" class="nav-link px-2">Subscribe us</a>
            </li>
            </ul>
            <p class="text-center">&copy; 2021 Blogs By creativecoder, Inc</p>
        </footer>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
      crossorigin="anonymous"
    ></script>

    {{-- CK editor --}}
    <script type="importmap">
        {
            "imports": {
                "ckeditor5": "/ckeditor5/ckeditor5.js",
                "ckeditor5/": "/ckeditor5"
            }
        }
    </script>

    <script type="module">
        import {
            ClassicEditor,
            Essentials,
            Paragraph,
            Bold,
            Italic,
            Font
        } from 'ckeditor5';

        ClassicEditor
            .create( document.querySelector( '.editor' ), {
                licenseKey: 'GPL', // Or <YOUR_LICENSE_KEY>
                plugins: [ Essentials, Paragraph, Bold, Italic, Font ],
                toolbar: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                ],
                licenseKey: 'GPL'
            } )
            .then( editor => {
                window.editor = editor;
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>

    {{-- Sweet Alert Delete Confirm  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

    <script type="text/javascript">

        $('.show_confirm').click(function(event) {

            var form =  $(this).closest("form");

            var name = $(this).data("name");

            event.preventDefault();

            swal({

                title: `Are you sure you want to delete this blog?`,

                text: "If you delete this, it will be gone forever.",

                // icon: "warning",

                buttons: true,

                dangerMode: true,

            })

            .then((willDelete) => {

                if (willDelete) {

                form.submit();

                }

            });

        });

        $('.logout_confirm').click(function(event) {

            var form =  $(this).closest("form");

            var name = $(this).data("name");

            event.preventDefault();

            swal({

                title: `Are you sure you want to logout?`,

                icon: "warning",

                buttons: true,

                dangerMode: true,

            })

            .then((willLogout) => {

                if (willLogout) {

                form.submit();

                }

            });

        });

    </script>

</body>
</html>
