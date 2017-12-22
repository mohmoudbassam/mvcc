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
<br>
<br>
<div class="container">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Registration form <small>Wellcom!</small></h3>
                </div>
                <div class="panel-body">
                    <?php if(isset($response)){
                        echo $response;
                    }?>
                    <?php
                    if(isset($error)){
                        foreach ($error as $er){
                            echo $er;
                            echo "<br>";
                        }
                    }
                    ?>
                    <form role="form" method="post" action="">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <input type="text" name="name" id="first_name" class="form-control input-sm" placeholder="course Name">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <input type="text" name="hours" id="first_name" class="form-control input-sm" placeholder="course hours">
                                </div>
                            </div>

                        </div>


                        <div class="row">

                            <div class="col-md-10">

                                <div class="form-group" >
                                   <label for="role">teacher name</label>
                                    <select class="selectpicker" data-live-search="true" name="teacher_id">
                                        <?php foreach ($teacher as $tea){?>
                                        <option data-tokens="ketchup mustard" value="<?php echo $tea['id']?>"><?php echo $tea['name'] ?></option>
                                        <?php } ?>
                                    </select>

                                </div>
                            </div>

                        </div>
                        <input type="submit" value="Register" class="btn btn-info btn-block" name="reg">

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>