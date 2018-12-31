<div class="banner-container">
    <div id="banner-carousel" class="carousel slide banners" data-ride="carousel">
        <div class="carousel-inner owl-carousel owl-theme" role="listbox">
            @foreach($banners as $k => $banner)

                <div class="{{ $k == 0? 'active':'' }}">
                    <img src="{{ uploaded_images_url($banner->image) }}" class="banner-image"/>
                    <div class="carousel-caption">
                        @if(!$banner->hide_name)
                            <h2>{!! $banner->name !!}</h2>
                        @endif
                        @if($banner->summary)
                            <p>{!! $banner->summary !!}</p>
                        @endif
                        @if($banner->action_url)
                            <a class="btn btn-primary" target="_blank"
                               href="{{ $banner->action_url }}">{{ $banner->action_name ?: 'read more' }}</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#banner-carousel" role="button" data-slide="next">
            <span class="fa fa-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#banner-carousel" role="button" data-slide="prev">
            <span class="fa fa-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>