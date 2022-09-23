<nav class="navbar navbar-expand-lg pt-4 pb-4">
    <div class="container-fluid">
        <button type="button" id="sidebarCollapse" class="btn">
            <i class="fa fa-bars"></i>
        </button>
        <h4>{{ $title ?? ''}}</h4>
        <div>
            <a href="" class="mx-2"><i class="fa fa-bell"></i></a>    
            <div class="btn-group">
                <button type="button" class="btn btn-secondary dropdown-toggle btn-profile" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                    {{ auth()->user()->name }}
                </button>
                <ul class="dropdown-menu dropdown-menu-lg-end">
                    <li>
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item"><i class="mx-2 fa fa-sign-out"></i>  Logout</a></button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
</nav>