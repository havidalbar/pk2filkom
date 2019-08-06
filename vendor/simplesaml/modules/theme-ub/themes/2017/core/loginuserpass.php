<!--

<?php
if ($this->data['errorcode'] !== null) {
    ?>
    <div style="border-left: 1px solid #e8e8e8; border-bottom: 1px solid #e8e8e8; background: #f5f5f5">
        <p><strong><?php
                echo htmlspecialchars($this->t(
                    '{errors:title_'.$this->data['errorcode'].'}',
                    $this->data['errorparams']
                )); ?></strong></p>

        <p><?php
            echo htmlspecialchars($this->t(
                '{errors:descr_'.$this->data['errorcode'].'}',
                $this->data['errorparams']
            )); ?></p>
    </div>
<?php
}

?>
    <form action="?" method="post" name="f">
        <table>
            <tr>
                <td><label>Username</label></td>
                <td><input id="username" type="text" name="username"/></td>
            </tr>
            <tr>
                <td><label>Password</label></td>
                <td><input id="password" type="password" name="password"/></td>
            <tr>
            <?php
            if (array_key_exists('organizations', $this->data)) {
                ?>
                <tr>
                    <td><label>Login As</label></td>
                    <td><select name="organization" tabindex="3">
                            <?php
                            if (array_key_exists('selectedOrg', $this->data)) {
                                $selectedOrg = $this->data['selectedOrg'];
                            } else {
                                $selectedOrg = null;
                            }

                            foreach ($this->data['organizations'] as $orgId => $orgDesc) {
                                if (is_array($orgDesc)) {
                                    $orgDesc = $this->t($orgDesc);
                                }

                                if ($orgId === $selectedOrg) {
                                    $selected = 'selected="selected" ';
                                } else {
                                    $selected = '';
                                }

                                echo '<option '.$selected.'value="'.htmlspecialchars($orgId).'">'.htmlspecialchars($orgDesc).'</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <?php
            }
            ?>
            <tr id="regularsubmit">
                <td></td>
                <td>
                    <button class="btn"
                            onclick="this.value='<?php echo $this->t('{login:processing}'); ?>';
                                this.disabled=true; this.form.submit(); return true;" tabindex="6">
                        <?php echo $this->t('{login:login_button}'); ?>
                    </button>
                </td>
            </tr>
        </table>
        <?php
        foreach ($this->data['stateparams'] as $name => $value) {
            echo('<input type="hidden" name="'.htmlspecialchars($name).'" value="'.htmlspecialchars($value).'" />');
        }
        ?>
    </form>
<?php
if (!empty($this->data['links'])) {
    echo '<ul class="links" style="margin-top: 2em">';
    foreach ($this->data['links'] as $l) {
        echo '<li><a href="'.htmlspecialchars($l['href']).'">'.htmlspecialchars($this->t($l['text'])).'</a></li>';
    }
    echo '</ul>';
}
?>

-->
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
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href=""><b>UB</b>Auth</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <?php
		if ($this->data['errorcode'] !== null) {
		    ?>
		    <div style="border-left: 1px solid #e8e8e8; border-bottom: 1px solid #e8e8e8; background: #f5f5f5">
		        <p><strong><?php
		                echo htmlspecialchars($this->t(
		                    '{errors:title_'.$this->data['errorcode'].'}',
		                    $this->data['errorparams']
		                )); ?></strong></p>
		
		        <p><?php
		            echo htmlspecialchars($this->t(
		                '{errors:descr_'.$this->data['errorcode'].'}',
		                $this->data['errorparams']
		            )); ?></p>
		    </div>
		<?php
		}
		?>
        <form action="?" method="post" name="f">
          <div class="form-group has-feedback">
            <input id="username" name="username" type="text" class="form-control" placeholder="Username">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input id="password" name="password" type="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <select name="organization" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                            <?php
                            if (array_key_exists('selectedOrg', $this->data)) {
                                $selectedOrg = $this->data['selectedOrg'];
                            } else {
                                $selectedOrg = null;
                            }

                            foreach ($this->data['organizations'] as $orgId => $orgDesc) {
                                if (is_array($orgDesc)) {
                                    $orgDesc = $this->t($orgDesc);
                                }

                                if ($orgId === $selectedOrg) {
                                    $selected = 'selected="selected" ';
                                } else {
                                    $selected = '';
                                }

                                echo '<option '.$selected.'value="'.htmlspecialchars($orgId).'">'.htmlspecialchars($orgDesc).'</option>';
                            }
                            ?>
          	</select>
          </div>
          <div class="row">
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat" 
                            onclick="this.value='<?php echo $this->t('{login:processing}'); ?>';
                                this.disabled=true; this.form.submit(); return true;" tabindex="6">Sign In</button>
            </div><!-- /.col -->
          </div>
          <?php
	      foreach ($this->data['stateparams'] as $name => $value) {
	      	echo('<input type="hidden" name="'.htmlspecialchars($name).'" value="'.htmlspecialchars($value).'" />');
	      }
	      ?>
        </form>
		<?php
		if (!empty($this->data['links'])) {
		    echo '<ul class="links" style="margin-top: 2em">';
		    foreach ($this->data['links'] as $l) {
		        echo '<li><a href="'.htmlspecialchars($l['href']).'">'.htmlspecialchars($this->t($l['text'])).'</a></li>';
		    }
		    echo '</ul>';
		}
		?>
        <a href="#">I forgot my password</a><br>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="../../resources/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../resources/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../../resources/plugins/iCheck/icheck.min.js"></script>
  </body>
</html>

