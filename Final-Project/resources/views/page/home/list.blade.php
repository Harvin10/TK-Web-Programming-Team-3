<div id="portfolio" class="portfolio row grid-container gutter-20" data-layout="fitRows">
    @foreach ($collection as $item)
    <article class="portfolio-item col-lg-3 col-md-4 col-sm-6 col-12 pf-media pf-icons">
        <div class="grid-inner">
            <div class="portfolio-image">
                <a href="javascript:;" onclick="add_cart('{{route('products.edit',$item->id)}}');">
                    <img src="{{URL::asset('uploads/'.$item->cover)}}"  width="100px">
                </a>
                <div class="bg-overlay">
                    <div class="bg-overlay-content dark" data-hover-animate="fadeIn">
                        <a href="images/portfolio/full/1.jpg" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350" data-lightbox="image" title="Image">
                            <i class="icon-line-plus"></i>
                        </a>
                        <a href="javascript:;" onclick="add_cart('{{route('products.edit',$item->id)}}');" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350">
                            <i class="icon-line-ellipsis"></i>
                        </a>
                    </div>
                    <div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
                </div>
            </div>
            <div class="portfolio-desc">
                <h3><a href="javascript:;" onclick="add_cart('{{route('products.edit',$item->id)}}');">{{$item->title}}</a></h3>
                <span><a href="#">{{$item->category->title}}</a></span>
                <span>
                    <a href="javascript:;" onclick="add_cart('{{route('cart.add')}}','{{$item->id}}');">Add to cart</a>
                </span>
            </div>
        </div>
    </article>
    @endforeach
    {{$collection->links('theme.app.pagination')}}
</div>