<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('dashboard') }}">TestAllsaved</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}" href="{{ route('profile') }}">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('settings') ? 'active' : '' }}" href="{{ route('settings') }}">Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('tasks.*') ? 'active' : '' }}" href="{{ route('tasks.index') }}">Tasks</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <span class="nav-link text-light">Oleksandr Salanhin</span>
                </li>
                <li class="nav-item">
                    <a href="https://www.linkedin.com/in/oleksandr-s-59b495363/"
                       target="_blank"
                       class="nav-link py-0 px-2"
                       title="LinkedIn">
                        in
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://dou.ua/users/a-san/"
                       target="_blank"
                       class="nav-link py-0 px-2"
                       title="DOU">
                        D
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
