@extends ('layouts.template')
@section('title', 'SiMaba! 2019 | FILKOM UB')

@section('content')
@include('layouts.header')
<div class="jumbotron jumbotron-fluid bg-faq">
    <div class="container">
        <h1 class="faq title">F A Q</h1>
        <div class="faq garis"></div>
        <p class="faq subtitle">Frequently Asked Question adalah daftar pertanyaan umum yang paling ditanyakan</p>
        <div class="accordion" id="accordionFAQ">
            @foreach ($faqs as $faq)
            <div class="card">
                <div class="card-header" id="heading{{$faq->id}}">
                    <!-- <h2 class="mb-0"> -->
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                        data-target="#collapse{{$faq->id}}" aria-expanded="true" aria-controls="collapse{{$faq->id}}">
                        {!! $faq->tanya !!}
                    </button>
                    <!-- </h2> -->
                </div>
                <div id="collapse{{$faq->id}}" class="collapse" aria-labelledby="heading{{$faq->id}}"
                    data-parent="#accordionFAQ">
                    <div class="card-body">
                        {!! $faq->jawab !!}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@include('layouts.footer')
@endsection