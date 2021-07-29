<footer class="text-center text-lg-start bg-light text-muted">
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
        <div class="me-5 d-none d-lg-block">
            <span>{{ __('static.connected_social') }}</span>
        </div>
        <div class="social-networks">
        @forelse($socials as $item)
            <a href="{{ $item->link }}" class="me-4 text-reset">
                <i class="la la-{{ $item->icon }} fs-4"></i>
            </a>
        @empty
        @endforelse
        </div>
    </section>
    <section class="">
        <div class="container text-center text-md-start mt-5">
            <div class="row mt-3">
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">
                        Company name
                    </h6>
                    <p>
                         {!! $setting->mutate_description !!}
                    </p>
                </div>
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">
                        {{ __('static.articles') }}
                    </h6>
                    @forelse($article_categories as $item)
                        <p>
                            <a href="{{ route('list-project-categories', ['slug' => $item->slug]) }}" class="text-reset">{{ $item->title }}</a>
                        </p>
                        @empty
                    @endforelse
                </div>
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">
                        {{ __('static.projects') }}
                    </h6>
                    @forelse($project_categories as $item)
                        <p>
                            <a href="{{ route('list-project-categories', ['slug' => $item->slug]) }}" class="text-reset">{{ $item->title }}</a>
                        </p>
                    @empty
                    @endforelse
                </div>
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <h6 class="text-uppercase fw-bold mb-4 ms-3">
                        {{ __('static.contacts') }}
                    </h6>
                    <p><i class="fas fa-home me-3"></i>{{ $setting->address }}</p>
                    <p>
                        <i class="fas fa-envelope me-3"></i>
                        {{ $setting->email }}
                    </p>
                    <p><i class="fas fa-phone me-3"></i>{{ $setting->phone }}</p>
                </div>
            </div>
        </div>
    </section>
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2021 Copyright:
        <a class="text-reset fw-bold" href="{{ route('home') }}">{{ $setting->title }}</a>
    </div>
</footer>
