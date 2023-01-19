    <!-- FOOTER -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="index.html">
                                <img src="{{asset('uploads/logo/'.$info->logo)}}" alt="">
                            </a>
                        </div>
                        <ul>
                            <li>Địa chỉ: {{$info->address}}</li>
                            <li>Điện thoại: +84 {{substr($info->phone, 1, 13)}}</li>
                            <li>Email: {{$info->email}}</li>
                        </ul>
                        <div class="footer-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Thông tin</h5>
                        <ul>
                            <li><a href="#">Về chúng tôi</a></li>
                            <li><a href="#">Thanh toán</a></li>
                            <li><a href="#">Liên hệ</a></li>
                            <li><a href="#">Dịch vụ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>Tài khoản của bạn</h5>
                        <ul>
                            <li><a href="#">Tài khoản của bạn</a></li>
                            <li><a href="#">Liên hệ</a></li>
                            <li><a href="#">Giỏ hàng</a></li>
                            <li><a href="#">Shop</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                   <div class="newslatter-item">
                    <h5>Theo dõi shop</h5>
                    <p>Theo dỗi bằng email của bạn để nhận ưu đãi hấp dẫn từ chúng tôi!</p>
                    <form action="#" class="subscribe-form">
                        <input type="text" placeholder="Enter Your Email:">
                        <button type="button">Đăng lý</button>
                    </form>
                   </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            Copyright <script>document.write(new Date().getFullYear());</script>All rights reserved | This template is made with 
                            <i class="fa fa-eart-o" aria-hidden="true"></i>by <a href="https://www.google.com/" target="_blank">Coalean</a>
                        </div>
                        <div class="payment-pic">
                            <img src="front/img/payment-method.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER END -->