<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-center fs-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ $setting->mutate_favicon }}" alt="" width="30" height="24">
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">{{ __('static.home') }}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('static.articles') }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach($article_categories as $category)
                        <li><a class="dropdown-item" href="{{ route('list-article-categories', ['slug' => $category->slug]) }}">{{ $category->title }}</a></li>
                        <li><hr class="dropdown-divider"></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('static.projects') }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @forelse($project_categories as $category)
                            <li><a class="dropdown-item" href="{{ route('list-project-categories', ['slug' => $category->slug]) }}">{{ $category->title }}</a></li>
                        <li><hr class="dropdown-divider"></li>
                        @empty
                        @endforelse
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ __('static.contacts') }}</a>
                </li>
            </ul>
            <div class="pe-3">
                <a href="{{ route('backpack.auth.login') }}" class="btn btn-primary">{{ __('static.login') }}</a>
            </div>
            {{--            <div class="pl-3">--}}
            {{--                <form class="d-flex">--}}
            {{--                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">--}}
            {{--                    <button class="btn btn-outline-success" type="submit">Search</button>--}}
            {{--                </form>--}}
            {{--            </div>--}}
        </div>
    </div>
</nav>
