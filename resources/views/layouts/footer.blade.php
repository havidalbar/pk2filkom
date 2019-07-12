<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12 align-self-center py-3">
                <div class="footerContent">
                    <div class="footerLogo">
                        <img src="{{asset('img/logo3@4x@2x.png')}}" alt="Logo">
                    </div>
                    <div class="linkSosmed">
                        <p>Contact Us</p>
                        <!--Instagram-->
                        <a class="ins-ic" href="https://www.instagram.com/pk2maba_filkom/">
                            <i data-icon="b" class="fab fa-lg mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                        <!-- Line -->
                        <a class="line-ic" href="http://bit.ly/OAPK2FILKOM">
                            <i data-icon="e" class="fab fa-lg mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                        <!-- Twitter -->
                        <a class="tw-ic" href="http://twitter.com/PK2FILKOM2019">
                            <i data-icon="f" class="fab fa-lg mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                        <!--Youtube -->
                        <a class="yt-ic" href="http://bit.ly/PK2MABAFILKOM">
                            <i data-icon="a" class="fab fa-lg mr-md-5 mr-3 fa-2x"> </i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright -->
    <div class="footer-copyright text-center">
        @php
        $year = date('Y');
        @endphp
        <p>© {{ $year == 2019 ? $year : '2019 - ' . $year }}. All rights reserved.<span>Design and Development by PIT &
                DDM PK2MABA FILKOM 2019</span></p>
    </div>
    <!-- Copyright -->
</footer>