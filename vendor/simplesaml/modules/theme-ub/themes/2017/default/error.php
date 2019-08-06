<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../../resources/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../resources/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../../resources/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body  class="skin-blue sidebar-mini" style="height: auto;">
    <section class="content">

      <div class="error-page">
        <h2 class="headline text-red"><i class="fa fa-warning text-red"></i></h2>

        <div class="error-content">
          <h3>Oops! Something went wrong.</h3>

          <p>
            We will work on fixing that right away.
            Meanwhile, you may <a href="https://gapura.ub.ac.id">return to dashboard</a>.
          </p>
        </div>
      </div>
      <!-- /.error-page -->

    </section>

    <!-- jQuery 2.1.4 -->
    <script src="../../resources/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../resources/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../../resources/plugins/iCheck/icheck.min.js"></script>
  </body>
</html>

<?php exit; ?>

<pre id="trackid" class="input-left"><?php echo $this->data['error']['trackId']; ?></pre>

<?php
exit;
// print out exception only if the exception is available
if ($this->data['showerrors']) {
?>
    <h2><?php echo $this->t('debuginfo_header'); ?></h2>
    <p><?php echo $this->t('debuginfo_text'); ?></p>

    <div style="border: 1px solid #eee; padding: 1em; font-size: x-small">
        <p style="margin: 1px"><?php echo htmlspecialchars($this->data['error']['exceptionMsg']); ?></p>
        <pre style="padding: 1em; font-family: monospace;"><?php
            echo htmlspecialchars($this->data['error']['exceptionTrace']); ?></pre>
    </div>
<?php
}

