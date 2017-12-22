<header id="home">
    <section class="top-nav hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="top-left">

                        <ul>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-vk" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="top-right">
                        <p>AdminPage:<span>School website</span></p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <div id="main-nav">

        <nav class="navbar">
            <div class="container">

                <div class="navbar-header">
                    <a href="index.html" class="navbar-brand">MyBiz</a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#ftheme">
                        <span class="sr-only">Toggle</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="navbar-collapse collapse" id="ftheme">

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/teacher/defult">home</a></li>
                        <li><a href="/teacher/mycourse">My Course</a></li>
                        <li><a href="/admin/collage">collage</a></li>
                        <li><a href="#portfolio">portfolio</a></li>
                        <li><a href="#contact">contact</a></li>
                        <li class="hidden-sm hidden-xs">
                            <a href="#" id="ss"><i class="fa fa-search" aria-hidden="true"></i></a>
                        </li>
                    </ul>

                </div>

                <div class="search-form">
                    <form>
                        <input type="text" id="s" size="40" placeholder="Search..." />
                    </form>
                </div>

            </div>
        </nav>
    </div>

</header>
<br>
<br>
<div class="container">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-4 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Registration form <small>Wellcom!</small></h3>
                </div>
                <div class="panel-body">

                    <form role="form" method="post" action="">

                        <?php  if(isset($number_of_qustion)){?>
                            <?php for($i=0 ; $i<$number_of_qustion ;$i++){?>
                        <div class="row">
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <div class="form-group">
                                    <input type="text" name="<?php echo "q".$i ?>" id="first_name" class="form-control input-sm" placeholder="qustion">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="radio" name="<?php echo "a".$i?>" value="1">true
                                <input type="radio" name="<?php echo "a".$i?>" value="0">false
                            </div>

                        </div>
                                <?php }?>
                        <?php }?>
                        <input type="submit" value="Register" class="btn btn-info btn-block" name="save">

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>