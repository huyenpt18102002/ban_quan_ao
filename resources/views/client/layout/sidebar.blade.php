
    <div class="filter-widget">
        <h4 class="fw-title">Categories</h4>
        <ul class="filter-catagories">
            @foreach ($category as $key=>$cate)
            <li><a href="{{route('danh-muc', $cate->slug)}}">{{$cate->name}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Brand</h4>
        <div class="fw-brand-check">
            @foreach ($brand as $key=>$bra)
            <div class="bc-item">
                <label for="bc-calvin">
                   {{$bra->name}} 
                   <input type="checkbox" id="bc-calvin" name="fi-brand">
                    <span class="checkmark"></span>
                </label>
            </div>
            @endforeach

        </div>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Price</h4>
        <div class="filter-range-wrap">
            <div class="range-slider">
                <div class="price-input">
                    <input type="text" name="" id="minamount">
                    <input type="text" name="" id="maxamount">
                </div>
            </div>
            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget-content"
            data-min="33" data-max="98">
                <div class="ui-slider-range ui-corner-all ui-widget-header">
                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                </div>
            </div>
        </div>
        {{-- <a href="#" class="filter-btn">Filter</a> --}}
    </div>
  
    <div class="filter-widget">
        <h4 class="fw-title">Size</h4>
        <div class="fw-size-choose">
            <div class="sc-item">
                <input type="radio" name="" id="s-size">
                <label for="s-size">s</label>
            </div>
            <div class="sc-item">
                <input type="radio" name="" id="m-size">
                <label for="m-size">m</label>
            </div>
            <div class="sc-item">
                <input type="radio" name="" id="l-size">
                <label for="l-size">l</label>
            </div>
            <div class="sc-item">
                <input type="radio" name="" id="xs-size">
                <label for="xs-size">xs</label>
            </div>
        </div>
    <a href="#" class="filter-btn">Filter</a>
    </div>

    <div class="filter-widget">
        <h4 class="fw-title">Tags</h4>
        <div class="fw-tags">
            <a href="#">Towel</a>
            <a href="#">Shoes</a>
            <a href="#">Coat</a>
            <a href="#">Dresses</a>
            <a href="#">Trousers</a>
            <a href="#">Men's hats</a>
            <a href="#">Backpack</a>
        </div>
    </div>
