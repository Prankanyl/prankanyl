<section class="section-white" id="what-it-does">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="pt-2">{{ __('static.what_are_we_doing') }}</h2>
            </div>
            @forelse($site_information as $info)
            <div class="col-md-4">
                <div class="main-services">
                    <i class="{{ $info->icon }}"></i>
                    <h4>{{ $info->title }}</h4>
                    <p>
                        {{ $info->description }}
                    </p>
                </div>
            </div>
            @empty
            @endforelse
        </div>
    </div>
</section>
