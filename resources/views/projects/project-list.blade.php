@extends('layout.app')

@section('scripts')
{{--    <script>--}}
{{--        $('#ProjectCategory').select2({--}}
{{--            placeholder: 'Select an option'--}}
{{--        });--}}
{{--        $('#ProjectType').select2({--}}
{{--            placeholder: 'Select an option'--}}
{{--        });--}}
{{--        $('#DevelopmentTool').select2({--}}
{{--            placeholder: 'Select an option'--}}
{{--        });--}}
{{--    </script>--}}
@endsection
@section('content')
    <div class="container-fluid mt-3 mb-3">
        <div class="row">
            <div class="col-lg-2">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('static.categories') }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('project-sort-list') }}" method="get" id="SortProjectForm">
                            <div class="row mb-2">
                                <select name="project_category" id="ProjectCategory" class="form-select">
                                    <option value="{{ null }}" selected disabled>{{ __('project.sort.project_category') }}</option>
                                    @forelse($categories as $item)
                                        <option value="{{ $item->slug }}">{{ $item->title }}</option>
                                    @empty
                                        <p>
                                            {{ __('static.not_found') }}
                                        </p>
                                    @endforelse
                                </select>
                            </div>
                            <div class="row mb-2">
                                <select name="project_type" id="ProjectType" class="form-select">
                                    <option value="{{ null }}" selected disabled>{{ __('project.sort.project_type') }}</option>
                                    @forelse($types as $item)
                                        <option value="{{ $item->slug }}">{{ $item->title }}</option>
                                    @empty
                                        <p>
                                            {{ __('static.not_found') }}
                                        </p>
                                    @endforelse
                                </select>
                            </div>
                            <div class="row mb-2">
                                <select name="development_tool" id="DevelopmentTool" class="form-select">
                                    <option value="{{ null }}" selected disabled>{{ __('project.sort.development_tool') }}</option>
                                    @forelse($tools as $item)
                                        <option value="{{ $item->slug }}">{{ $item->title }}</option>
                                    @empty
                                        <p>
                                            {{ __('static.not_found') }}
                                        </p>
                                    @endforelse
                                </select>
                            </div>
                            <div class="row d-grid gap-3">
                                <button type="submit" class="btn btn-primary">{{ __('static.sort') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('static.projects') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row row-cols-1 row-cols-md-3 g-3">
                            @forelse($projects as $item)
                                <a href="{{ route('project-detail', ['category_slug' => $item->category->slug, 'project_slug' => $item->slug]) }}">
                                    <div class="col">
                                        <div class="card">
                                            <img src="{{ $item->mutate_image }}" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="float-start">
                                                            <h5 class="card-title">{{ $item->title }}</h5>
                                                        </div>
                                                        <div class="float-end">
                                                            <h5 class="card-title">{{ $item->version }}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <p class="card-text">{!! $item->mutate_short_description !!}</p>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h5 class="card-title">{{ __('project.category') }}</h5>
                                                    </div>
                                                    <div class="col-sm-9 ps-0">
                                                        <p class="card-text">{!! $item->category->title !!}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h5 class="card-title">{{ __('project.types') }}</h5>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        @foreach($item->development_tools as $single)
                                                        <button class="btn btn-secondary mb-1" onclick="event.preventDefault()">{!! $single->title !!}</button>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <p class="card-text"><small class="text-muted">{{ $item->created_at->diffForHumans() }}</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <p>
                                    {{ __('static.not_found') }}
                                </p>
                            @endforelse
                        </div>
                        @if($projects->links())
                            {{ $projects->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
