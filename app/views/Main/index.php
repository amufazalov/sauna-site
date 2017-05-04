<div class="container">
    <hr/>

    <div class="row">
        <div class="col-sm-8">
            <h2>Забронировать место</h2>
            <p>Introduce the visitor to the business using clear, informative text. Use well-targeted keywords within
                your sentences to make sure search engines can find the business.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et molestiae similique eligendi reiciendis sunt
                distinctio odit? Quia, neque, ipsa, adipisci quisquam ullam deserunt accusantium illo iste
                exercitationem nemo voluptates asperiores.</p>
            <p>
                <a class="btn btn-warning btn-lg" href="book-it">Забронировать место &raquo;</a>
            </p>
        </div>
        <div class="col-sm-4">
            <h2>Контакты</h2>
            <address>
                <strong>Адреса</strong>
                <br>3481 Melrose Place
                <br>Beverly Hills, CA 90210
                <br>
            </address>
            <address>
                <abbr title="Phone">P:</abbr>(123) 456-7890
                <br>
                <abbr title="Email">E:</abbr> <a href="mailto:#">name@example.com</a>
            </address>
        </div>
    </div>
</div>
<!-- /.container -->
<div class="container">
    <hr/>

    <div class="row">
        <div class="col-sm-4">
            <img class="img-circle img-responsive img-center" src="images/1.jpg" alt="">
            <h2 class="text-center">Marketing Box #1</h2>
            <p>These marketing boxes are a great place to put some information. These can contain summaries of what the
                company does, promotional information, or anything else that is relevant to the company. These will
                usually
                be below-the-fold.</p>
        </div>
        <div class="col-sm-4">
            <img class="img-circle img-responsive img-center" src="images/2.jpg" alt="">
            <h2 class="text-center">Marketing Box #2</h2>
            <p>The images are set to be circular and responsive. Fusce dapibus, tellus ac cursus commodo, tortor mauris
                condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis
                euismod.
                Donec sed odio dui.</p>
        </div>
        <div class="col-sm-4">
            <img class="img-circle img-responsive img-center" src="images/3.jpg" alt="">
            <h2 class="text-center">Marketing Box #3</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris
                condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis
                euismod.
                Donec sed odio dui.</p>
        </div>
    </div>
    <hr/>
</div>

<?php if (!empty($article)): ?>
    <!-- /.container -->
    <header class="business-header">
        <div style="background: rgba(0,0,0, 0.5); height: 100%">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="tagline text-uppercase" style="font-weight: 700;">
                            Акция - <?= $article['title'] ?>
                        </h2>
                        <div class="">
                            <p class="lead" style="color:#fff; text-shadow: 1px 0 0 #000">
                                <?= $article['full_text'] ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
<?php endif; ?>

<div class="container">
    <hr>
    <style>
        .thumb img {
            filter: none; /* IE6-9 */
            -webkit-filter: grayscale(0);
            background-color: #fff;
            padding: 5px;
        }

        .thumb img:hover {
            filter: orange; /* IE6-9 */
            -webkit-filter: grayscale(1);
        }

        .thumb {
            padding: 5px;
        }
    </style>
    <div class="container">

        <div class="row">
            <h2 class="text-center text-uppercase">Наша сауна</h2>
            <div class="col-md-4 col-sm-4 col-xs-6 thumb">
                <a class="fancyimage" data-fancybox-group="group" href="images/sauna/1/1.jpg">
                    <img class="img-responsive" src="images/sauna/1/1.jpg"/>
                </a>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6 thumb">
                <a class="fancyimage" data-fancybox-group="group" href="images/sauna/1/2.jpg">
                    <img class="img-responsive" src="images/sauna/1/2.jpg"/>
                </a>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6 thumb">
                <a class="fancyimage" data-fancybox-group="group" href="images/sauna/1/3.jpg">
                    <img class="img-responsive" src="images/sauna/1/3.jpg"/>
                </a>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6 thumb">
                <a class="fancyimage" data-fancybox-group="group" href="images/sauna/1/7.jpg">
                    <img class="img-responsive" src="images/sauna/1/3.jpg"/>
                </a>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6 thumb">
                <a class="fancyimage" data-fancybox-group="group" href="images/sauna/1/9.jpg">
                    <img class="img-responsive" src="images/sauna/1/2.jpg"/>
                </a>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6 thumb">
                <a class="fancyimage" data-fancybox-group="group" href="images/sauna/1/9.jpg">
                    <img class="img-responsive" src="images/sauna/1/1.jpg"/>
                </a>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="/fancybox/jquery.fancybox.pack.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("a.fancyimage").fancybox();
        });
    </script>

    <hr/>
</div>
