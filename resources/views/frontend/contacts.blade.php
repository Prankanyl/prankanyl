@extends('layout.app')

@section('content')
<div class="container-fluid mt-3 mb-3">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        This is my Contacts :)
                    </h3>
                </div>
                <div class="card-body">
                    <p>
                        <i class="la la-home me-3" style="font-size: 24px;"></i>
                        My location - {{ $setting->address }}</p>
                    <p>
                        <i class="la la-envelope me-3" style="font-size: 24px;"></i>
                        Email - {{ $setting->email }}
                    </p>
                    <p>
                        <i class="la la-phone me-3" style="font-size: 24px;"></i>
                        Phone - {{ $setting->phone }}
                    </p>
                    <p>
                        <i class="la la-telegram me-3" style="font-size: 24px;"></i>
                        Telegram - {{ $setting->phone }}
                    </p>
                    <p>
                        <i class="las la-link me-3" style="font-size: 24px;"></i>
                        Link to - <a href="https://rabota.by/resume/dccdcdbfff092aee880039ed1f69626b4d7546">rabota.by</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
