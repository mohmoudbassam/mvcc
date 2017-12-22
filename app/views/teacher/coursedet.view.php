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
    <div class="row">

        <section class="content">
            <h1>Table Filter</h1>
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="pull-right nav">

                            <div class="btn-group">
                                <form action="" method="post">
                                    <input type="submit" class="btn btn-success btn-filter" value="assigment" name="assigment">
                                    <input type="submit" class="btn btn-warning btn-filter" value="document" name="document">
                                    <input type="submit" class="btn btn-danger btn-filter" value="quiz" name="quiz">
                                </form>
                            </div>
                        </div>
                        <div class="table-container">
                            <table class="table table-filter">
                                <tbody>
                                <?php if(isset($assigment)){
                                    foreach ($assigment as $ass){
                                        ?>
                                <tr data-status="pagado">

                                    <td>
                                        <div class="media">

                                            <div class="media-body">

                                                <h4 class="title">
                                              <?php echo $ass['description']; ?>
                                                    <form action="" method="post">
                                                        <input type="hidden" value="<?php echo  $ass['id'] ;?>" name="ass_id">
                                                        <input type="hidden" value="<?php  echo $ass['avilabilty'];?>" name="Avilabilty">
                                                    <span class="pull-right pagado"> <input type="submit" class="btn btn-info" value="dilvery"></span>
  <span class="pull-right pagado"> <input type="submit" class="btn btn-primary" value="<?php  echo $ass['avilabilty']==0? "avillable":  "not avilabe";?>" name="avl"> </span>
                                                    </form>
                                                </h4>

                                            </div>
                                        </div>

                                    </td>

                                </tr>
                                <?php } }?>
                                <?php if(isset($quiz))
                                    foreach ($quiz as $qu){
                                        ?>
                                        <tr data-status="pagado">

                                            <td>
                                                <div class="media">

                                                    <div class="media-body">
                                                   <h4><?php echo  $qu['name']?></h4>
                                                        <form action="" method="post">
                                                            <input type="hidden" value="<?php echo  $qu['id'] ;?>" name="ass_id">
                                                            <input type="hidden" value="<?php  echo $qu['avilablity'];?>" name="Avilabilty">
                                                            <span class="pull-right pagado"> <input type="submit" class="btn btn-info" value="dilvery"></span>
                                                            <span class="pull-right pagado"> <input type="submit" class="btn btn-primary" value="<?php  echo $qu['avilablity']==0? "avillable":  "not avilabe";?>" name="avlqu"> </span>
                                                        </form>
                                                    </div>
                                                </div>

                                            </td>

                                        </tr>
                                    <?php } ?>
                                <?php if(isset($document)){
                                    foreach ($document as $doc){
                                        ?>
                                        <tr data-status="pagado">

                                            <td>
                                                <div class="media">

                                                    <div class="media-body">

                                                        <h4 class="title">
                                                            <?php echo $doc['file_name']; ?>
                                                            <span class="pull-right pagado"> <a class="btn btn-info">edit</a></span>
                                                        </h4>

                                                    </div>
                                                </div>

                                            </td>

                                        </tr>
                                    <?php } }?>
                                </tbody>
                            </table>
            </div>
        </section>

    </div>
</div>