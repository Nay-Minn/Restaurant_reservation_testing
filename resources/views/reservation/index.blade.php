@extends('layouts.app')

@section('content')
@livewire('reservation-component')

@push('scripts')
<script>
    $(document).ready(function () {
        $('.responsive').slick({
            autoplay: false,
            autoplayspeed: 2000,
            dots: false,
            infinite: false,
            speed: 300,
            slidesToShow: 9,
            slidesToScroll: 4,
            dotsClass:'slick-dots',
            arrows:true,
            responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
            }
        },
        {
        breakpoint: 600,
        settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
        breakpoint: 480,
        settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
    ]
    });
    })
    
</script>
@endpush
@endsection