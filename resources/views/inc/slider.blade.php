<div class="owl-carousel owl-theme">
    @foreach (\App\Models\Brand::get() as $brand)
        <div class="item">
            <img src="{{ asset('/frontend/images/brand/'.$brand->image) }}" alt="Brand Slider">
        </div>
    @endforeach
</div>