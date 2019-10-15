@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
    <div class="container">
        <div class="row">
            {{ $title }}
        </div>
        <div class="row">
            @foreach($segments as $segment)
                <div class="col-md-3 col-sm-6 col-12 my-3">
                    <div class="card text-center">
                        <img src="{{ $segment->segment_image }}" class="card-img-top" alt="{{ $segment->segment_name }}">
                        <div class="card-body">
                            <p class="card-text">{{ $segment->segment_name }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('segments.show', $segment->segment_slug) }}" class="btn btn-block btn-sm btn-danger">View Product</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <?php print_r( $items); ?>
            @foreach($items as $item)
                {{ $item->item_name }}
            @endforeach
        </div>
    </div>
@endsection