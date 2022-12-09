
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
                    <input type="checkbox" id="bc-calvin">
                    <span class="checkmark"></span>
                </label>
            </div>
            @endforeach
            {{-- <div class="bc-item">
                <label for="bc-calvin">
                    Calvin Klein 
                    <input type="checkbox" id="bc-calvin">
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="bc-item">
                <label for="bc-diesel">
                    Diesel 
                    <input type="checkbox" id="bc-diesel">
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="bc-item">
                <label for="bc-polo">
                    Polo
                    <input type="checkbox" id="bc-polo">
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="bc-item">
                <label for="bc-tommy">
                    Tommy Hifiger
                    <input type="checkbox" id="bc-tommy">
                    <span class="checkmark"></span>
                </label>
            </div> --}}
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
        <a href="#" class="filter-btn">Filter</a>
    </div>
    <div class="filter-widget">
        <h4 class="fw-title">Color</h4>
        <div class="fw-color-choose">
            <div class="cs-item">
                <input type="radio" name="" id="sc-black">
                <label for="cs-black" class="cs-black">black</label>
            </div>
            <div class="cs-item">
                <input type="radio" name="" id="sc-violet">
                <label for="cs-violet" class="cs-violet">violet</label>
            </div>
            <div class="cs-item">
                <input type="radio" name="" id="sc-blue">
                <label for="cs-blue" class="cs-blue">blue</label>
            </div>
            <div class="cs-item">
                <input type="radio" name="" id="sc-yellow">
                <label for="cs-yellow" class="cs-yellow">yellow</label>
            </div>
            <div class="cs-item">
                <input type="radio" name="" id="sc-red">
                <label for="cs-red" class="cs-red">red</label>
            </div>
            <div class="cs-item">
                <input type="radio" name="" id="sc-green">
                <label for="cs-green" class="cs-green">green</label>
            </div>
        </div>
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
