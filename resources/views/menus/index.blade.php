@extends('layouts.app')

@section('content')
<div class=" container-fluid">
    <div class="p-3 ">
        <h4 class="d-inline float-start">Menu Item</h4>
        <a href="{{route('create_menu')}}" class="btn btn-primary float-right">Add New Item</a>
    </div>
    <div class="responsive p-2" style="max-width:95%; margin:0 auto;">
        <div class="card mx-2">
            <img class="card-img-top"
                src="https://images.unsplash.com/photo-1604382354936-07c5d9983bd3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title mx-auto" style="align-item: center">Pizza</h5>
            </div>
        </div>
        <div class="card mx-2">
            <img class="card-img-top"
                src="https://images.unsplash.com/photo-1546793665-c74683f339c1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                alt="Card image cap" style="height:59px; object-fit:cover">
            <div class="card-body">
                <h5 class="card-title">Salad</h5>
            </div>
        </div>
        <div class="card mx-2" style="width: 50px">
            <img class="card-img-top"
                src="https://images.unsplash.com/photo-1600147184950-b0a367a98bc3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=436&q=80"
                alt="Card image cap" style="height:59px; object-fit:cover">
            <div class="card-body">
                <h5 class="card-title mx-auto">Chicken</h5>
            </div>
        </div>
        <div class="card mx-2">
            <img class="card-img-top"
                src="https://images.unsplash.com/photo-1604382354936-07c5d9983bd3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title mx-auto" style="align-item: center">Pizza</h5>
            </div>
        </div>
        <div class="card mx-2">
            <img class="card-img-top"
                src="https://images.unsplash.com/photo-1546793665-c74683f339c1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                alt="Card image cap" style="height:59px; object-fit:cover">
            <div class="card-body">
                <h5 class="card-title">Salad</h5>
            </div>
        </div>
        <div class="card mx-2" style="width: 50px">
            <img class="card-img-top"
                src="https://images.unsplash.com/photo-1600147184950-b0a367a98bc3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=436&q=80"
                alt="Card image cap" style="height:59px; object-fit:cover">
            <div class="card-body">
                <h5 class="card-title mx-auto">Chicken</h5>
            </div>
        </div>
        <div class="card mx-2">
            <img class="card-img-top"
                src="https://images.unsplash.com/photo-1604382354936-07c5d9983bd3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title mx-auto" style="align-item: center">Pizza</h5>
            </div>
        </div>
        <div class="card mx-2">
            <img class="card-img-top"
                src="https://images.unsplash.com/photo-1546793665-c74683f339c1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                alt="Card image cap" style="height:59px; object-fit:cover">
            <div class="card-body">
                <h5 class="card-title">Salad</h5>
            </div>
        </div>
        <div class="card mx-2" style="width: 50px">
            <img class="card-img-top"
                src="https://images.unsplash.com/photo-1600147184950-b0a367a98bc3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=436&q=80"
                alt="Card image cap" style="height:59px; object-fit:cover">
            <div class="card-body">
                <h5 class="card-title mx-auto">Chicken</h5>
            </div>
        </div>
        <div class="card mx-2">
            <img class="card-img-top"
                src="https://images.unsplash.com/photo-1604382354936-07c5d9983bd3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title mx-auto" style="align-item: center">Pizza</h5>
            </div>
        </div>
        <div class="card mx-2">
            <img class="card-img-top"
                src="https://images.unsplash.com/photo-1546793665-c74683f339c1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                alt="Card image cap" style="height:59px; object-fit:cover">
            <div class="card-body">
                <h5 class="card-title">Salad</h5>
            </div>
        </div>
        <div class="card mx-2" style="width: 50px">
            <img class="card-img-top"
                src="https://images.unsplash.com/photo-1600147184950-b0a367a98bc3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=436&q=80"
                alt="Card image cap" style="height:59px; object-fit:cover">
            <div class="card-body">
                <h5 class="card-title mx-auto">Chicken</h5>
            </div>
        </div>
    </div>
    <div class="p-3 ">
        @livewire('menu-component')
    </div>
    {{-- <div class="row mt-2 p-3">
        @foreach ($menus as $menu)
        <div class="col-md-3">
            <div class="card d-flex flex-column">
                <img class="card-img-top" style="height:250px; object-fit:cover"
                    src="{{asset('storage')}}/{{$menu->photos[1]}}" alt="Card image cap">
                <div class="card-body d-flex flex-column">
                    <h3 class="card-title mx-auto">{{ $menu->english_name }}</h3>
                    <p class="card-text text-muted mx-auto">{{ $menu->myanmar_name }}</p>
                    <div class="row">
                        <div class="col-md-6">
                            <b>
                                <label for="">Price</label>
                                <h3>{{ $menu->basic_price }}$</h3>
                            </b>
                        </div>
                        <div class="col-md-6">
                            <label for="">Description</label>
                            <p class="card-text">{{ $menu->description }}</p>
                        </div>
                    </div>




                </div>
                <div class=" card-footer">
                    @if ($menu->status == 0)
                    <div class="badge badge-danger">Inactive</div>
                    @else
                    <div class="badge badge-success">Active</div>
                    @endif
                    <div class="float-right">
                        <a class="btn btn-sm btn-primary" href="{{url("menu/edit/$menu->id")}}">
                            <i class="fas fa-pen"></i>
                        </a>
                        <a class="btn btn-sm btn-danger" href=""><i class="fas fa-trash"></i></a>
                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div> --}}
</div>
@push('scripts')
<script>
    $(document).ready(function () {
        $('.responsive').slick({
            autoplay: false,
            autoplayspeed: 2000,
            dots: true,
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