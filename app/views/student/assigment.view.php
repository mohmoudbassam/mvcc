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
                        <p>Student Page:<span>School website</span></p>
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
                        <li><a href="#home">home</a></li>
                        <li><a href="/student/mycourse">mycourse</a></li>
                        <li><a href="#service">services</a></li>
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
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>description</th>
            <th>file name</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i=0;
        if (isset($quiz)){

            foreach ($quiz as $qu){

                if($qu['avilablity']==1){
                    ?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $qu['name'] ?></td>
                        <td><?php echo $qu['number_of_qustion'] ?></td>
                        <td><a class="btn btn-success" href="/student/assigment/<?php echo $qu['id'] ?>">dawnload</a></td>


                    </tr>
                    <?php $i++; }}}?>
        </tbody>
    </table>
</div>