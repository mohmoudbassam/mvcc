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
<div class="container center-block" >
    <div class="row">
        <?php foreach ($courses as $course){ ?>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="/teacher/coursedet/<?php echo $course['id'] ?>"><?php echo $course['course_name']?></a></div>
                <div class="panel-body"></div>
                <div class="panel-footer clearfix">
                    <div class="pull-right">
                        <a href="/teacher/addstudent/<?php echo $course['id']?>" class="btn btn-primary" >add student</a>
                        <a href="/teacher/addquiz/<?php echo $course['id'] ?>" class="btn btn-default">add quiz </a>
                        <a href="/teacher/addassigment/<?php  echo $course['id']?>" class="btn btn-success">add Assigment</a>
                        <a href="/teacher/adddocument/<?php  echo $course['id']?>" class="btn btn-default">add doucment</a>
                        <a href="/admin/course/" class="btn btn-default">edit </a>
                    </div>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
</div>