<style>
    .header{
        background-color: {{ $setting->background_color }};
        color: {{ $setting->text_color }};
        /*height: 400px;*/
        padding-top: 7em;
        padding-bottom: 9em;
    }

    .header img{
        height: 300px;
        width: 300px;
    }

    .header p{
        margin-left: 4em;
    }

    @media (max-width: 800px) {
        .header{
            background-color: {{ $setting->background_color }};
            color: {{ $setting->text_color }};
            /*height: 400px;*/
            padding-top: 1em;
            padding-bottom: 1em;
        }

        .header img{
            margin-top: 2em;
            margin-bottom: 1em;
            height: 200px;
            width: 200px;
        }

        .header p{
            margin-left: 3.8em;
        }
    }
</style>
<div class="container-fluid header">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="p-5 pb-3 d-flex justify-content-center site-title">{{ $setting->title }}</h1>
            <p class="d-flex justify-content-center">{!! $setting->mutate_description !!}</p>
            <div class="d-flex justify-content-center">
                <a href="#" class="btn btn-primary">{{ __('static.show_project') }}</a>
                <a href="#" class="btn btn-primary ms-3">{{ __('static.show_project') }}</a>
            </div>
        </div>
        <div class="col-lg-6 d-flex justify-content-center">
            <img src="{{ $setting->mutate_logo }}" alt="...">
        </div>
    </div>
</div>
