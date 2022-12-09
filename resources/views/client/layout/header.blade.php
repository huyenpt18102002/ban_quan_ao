    <!-- HEADER -->
    <div class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class="fa fa-envelope"></i>
                        huyenha200204@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class="fa fa-phone"></i>
                        +84 54.65.32.431
                    </div>
                </div>
                <div class="ht-right">
                        @if (Auth::user())
                        <a id="navbarDropdown" class="nav-link dropdown-toggle login-panel" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                          {{ Auth::user()->name }}
                          
                        </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        @else
                        <a href="{{ route('login') }}" class="login-panel"><i class="fa fa-user"></i> Login</a>
                        @endif
                    <div class="lan-selector">
                        <select class="language_drop" name="countries" id="countries" style="width:300px;">
                        <option value="yt" data-image="front/img/flag-1.jpg" data-imagecss="flag yt"
                        data-title="English">English</option>
                        <option value="yu" data-image="front/img/flag-2.jpg" data-imagecss="flag yu"
                        data-title="Bangladesh">German</option>
                    </select>
                    </div>
                    <div class="top-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="{{route('homepage')}}">
                                <img src="front/img/logo.png" height="25" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                            <button type="button" class="category-btn">All Categories</button>
                            <div class="input-group">
                                <input type="text" placeholder="What do you need?">
                                <button type="button"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 text-right">
                        <ul class="nav-right">
                            <li class="heart-icon">
                                <a href="#"><i class="icon_heart_alt"></i>
                                <span>1</span>
                            </a>
                            </li>
                            <li class="cart-icon">
                                <a href="">
                                    <i class="icon_bag_alt"></i>
                                    <span>3</span>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="si-pic"><img src="front/img/select-product-1.jpg" alt=""></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>$60.00 x 1</p>
                                                            <h6>Kabino Bedside Table</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <i class="ti-close"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="si-pic"><img src="front/img/select-product-2.jpg" alt=""></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>$60.00 x 1</p>
                                                            <h6>Kabino Bedside Table</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <i class="ti-close"></i>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>Total:</span>
                                        <h5>$120.00</h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="shopping-cart.html" class="primary-btn view-card">VIEW CARD</a>
                                        <a href="check-out.html" class="primary-btn checkout-btn">CHECK OUT</a>
                                    </div>
                                </div>
                            </li>
                            <li class="cart-price">$150.00</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>Tất cả danh mục</span>
                        <ul class="depart-hover">
                        {{-- <li><a href="#">Nữ</a>
                            <ul>
                                <li style="margin-left:20px;"><i><a href="#">Men Clothing</a></i></li>
                                <li style="margin-left:20px;"><i><a href="#">Underwear</a></i></li>
                            </ul>
                         </li> --}}
                         @foreach ($category as $key=>$cate)
                         <li><a href="{{route('danh-muc', $cate->slug)}}">{{$cate->name}}</a></li>
                         @endforeach
                    </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{route('homepage')}}">Home</a></li>
                        <li class="{{ request()->is('shop') ? 'active' : '' }}"><a href="{{route('shop')}}">Shop</a></li>
                        <li>
                            <a href="">Conlection</a>
                            <ul class="dropdown">  
                                <li><a href="">Men's</a></li>    
                                <li><a href="">Women's</a></li>  
                                <li><a href="">Kid's</a></li>                   
                            </ul>
                    </li>
                        <li class="{{ request()->is('blog') ? 'active' : '' }}"><a href="">Blog</a></li>
                        <li><a href="">Contact</a></li>
                        <li><a href="">Pages</a>
                            <ul class="dropdown">  
                                <li><a href="">Blog Details</a></li>    
                                <li><a href="">Shopping Cart</a></li>  
                                <li><a href="">Checkout</a></li>   
                                <li><a href="">Faq</a></li>    
                                <li><a href="">Register</a></li>  
                                <li><a href="">Login</a></li>                  
                    </ul>
                        </li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </div>
    <!-- HEADER END-->