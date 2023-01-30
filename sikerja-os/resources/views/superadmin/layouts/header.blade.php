<nav class="main-header navbar navbar-expand navbar-dark">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <form action="/logout" method="post" class="nav-link">
                @csrf
                <button role="button" class="btn btn-default" type="submit">
                    <i class="fas fa-door-open"></i>Logout
                </button>
            </form>
        </li>
    </ul>

</nav>
