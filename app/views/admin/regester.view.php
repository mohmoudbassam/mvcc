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

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#ftheme">
                        <span class="sr-only">Toggle</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="navbar-collapse collapse" id="ftheme">

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/admin/defult">home</a></li>
                        <li><a href="/admin/regester">regester</a></li>
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
<div class="container">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Registration form <small>Wellcom!</small></h3>
                </div>
                <div class="panel-body">
                    <?php if(isset($create_msg)){
                        echo $create_msg;
                    }?>
                    <?php
                    if(isset($error)){
                        foreach ($error as $er){
                            echo $er;
                            echo "<br>";
                        }
                    }
                    ?>
                    <form role="form" method="post" action="/admin/regester">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" id="first_name" class="form-control input-sm" placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Last Name">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="text" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group" >

                                    <select class="selectpicker" data-live-search="true" name="role">
                                        <option data-tokens="ketchup mustard" value="1">Admin</option>
                                        <option data-tokens="mustard" value="2">Teacher</option>
                                        <option data-tokens="frosting" value="3">student</option>
                                    </select>


                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group" >

                                    <select class="selectpicker" data-live-search="true" name="collage_id">
                                        <option data-tokens="ketchup mustard" value="0"></option>
                                        <?php foreach($collages as $collage){?>
                                        <option data-tokens="ketchup mustard" value="<?php echo $collage->id ?>"><?php echo $collage->name ?></option>
                                        <?php }?>
                                    </select>


                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="address" id="first_name" class="form-control input-sm" placeholder="address">
                                </div>
                            </div>

                        </div>
                        <input type="submit" value="Register" class="btn btn-info btn-block" name="Regester">

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<br>
<br>