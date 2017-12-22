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
<?php if (isset($uploade)){
    echo $uploade;
}?>
    <?php
    if(isset($error)) {
        foreach ($error as $er)
            echo $er;
    }
        ?>
    <div class="panel panel-default">
        <div class="panel-heading"><strong>Upload Files</strong> <small>add assigment</small></div>
        <div class="form-group">
            <form action="" method="post" enctype="multipart/form-data" id="js-upload-form" >
            <label for="exampleFormControlTextarea1">add descriptrion</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="desc"></textarea>
        </div>
        <div class="panel-body">

            <!-- Standar Form -->
            <h4>Select files from your computer</h4>


                <div class="form-inline">
                    <div class="form-group">
                        <input type="file" name="file" id="js-upload-files" multiple>
                    </div>
                    <div class="form-group">
                  </div>
                    <button type="submit" class="btn btn-sm btn-primary" id="js-upload-submit" name="save">save</button>
                </div>

            </form>



        </div>
    </div>
</div> <!-- /container -->