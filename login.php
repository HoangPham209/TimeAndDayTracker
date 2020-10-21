<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <?php include("include/head.php"); ?>
  </head>

  <body>
    <div class="container justify-content-md-center">
    <form class="form-signin">
        <h1 class="h3 mb-3 font-weight-normal"> Sign in</h1>
        <label for="inputEmail" class="sr-only"> Email address </label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address">
        <label for="inputPassword" class="sr-only"> Password </label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password">
        <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        </div>
        <a class="btn btn-lg btn-primary btn-block" href="dashboard.php" role="button">Sign in</a>
        <p class="mt-5 mb-3 text-muted">© Hoang Pham - Bootstrap Form 2020-2020</p>
    </form>

  </div>
    <?php include("include/scripts.php"); ?>

  </body>
</html>
