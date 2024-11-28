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
                    <button class="nav-link btn btn-submit">Logut</button>
                </form>
            @else
                <a href="/register" class="nav-link">Register</a>
            @endauth

            <a href="#blogs" class="nav-link">Blogs</a>
            <a href="#subscribe" class="nav-link">Subscribe</a>
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

</body>
</html>
