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
                        <p>Location:<span>Main Street 2020, City 3000</span></p>
                    </div>
                </div>

            </div>
        </div>
    </section>



</header>
<br>
<br>
<div class="wrapper">
<div class="container">

    <!--
        you can substitue the span of reauth email for a input with the email and
        include the remember me checkbox
        -->
    <div class="form-horizontal ">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">

                <img id="profile-img" class="profile-img-card " src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
                <p id="profile-name" class="profile-name-card"></p>
                <form class="center-block" method="post" action="/auth/login">
                    <span id="reauth-email" class="reauth-email" ></span>
                    <input name="email" type="text" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                    <br>
                    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                    <div id="remember" class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>

                    </div>
                    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="login">Sign in</button>
                </form><!-- /form -->


            </div>
        </div>
    </div><!-- /container -->

</div>
</div>
<?php
if(isset($_SESSION["msg"])){
    echo $_SESSION["msg"];
    $_SESSION["msg"]=null;
}

?>
<!--slider-->
<!--about-->








