<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?=Uri::base('assets/css/font-awesome.min.css'); ?>">
	<?php echo Asset::css(array('jquery-ui.min.css','jquery-ui.structure.min.css','jquery-ui.theme.min.css','admin/style.css')); ?>
	<style>
		body { margin: 50px; }
		#notificationDiv{
            background-color: #cc0000;
            border-radius: 8px;
            bottom: 40px;
            color: white;
            display: none;
            font-size: 15px;
            font-weight: bold;
            left: 20px;
            min-height: 50px;
            padding: 15px 5px 5px 25px;
            position: fixed;
            text-transform: capitalize;
            width: 270px;
            z-index: 999999;
        }
        #overlay {
		    position: fixed;
		    top: 0;
		    left: 0;
		    width: 100%;
		    height: 100%;
		    background-color: rgba(0,0,0,.5);		    
		    z-index: 10000;
		    display: flex;
		    color: #fff;
		    justify-content: center; /* align horizontal */
		    align-items: center; /* align vertical */

		}

		.glyphicon.spinning {
            animation: spin 1s infinite linear;
            -webkit-animation: spin2 1s infinite linear;
        }

      @keyframes spin {
          from { transform: scale(1) rotate(0deg); }
          to { transform: scale(1) rotate(360deg); }
      }

      @-webkit-keyframes spin2 {
          from { -webkit-transform: rotate(0deg); }
          to { -webkit-transform: rotate(360deg); }
      }
	</style>

	<script>
		base_url = "<?=Uri::create('/')?>";
	</script>

	<?php echo Asset::js(array('jquery.js','jquery-ui.min.js',
		'bootstrap.js','h5f.min.js','validator.min.js','jquery.validate.min.js','admin/script.js',
	)); ?>
	<script>
		$(function(){
			$('.date').datepicker();
			$('.topbar').dropdown(); 
		});

		function overlay(){
		    if (!$('#overlay').length) {
	            $('body').append('<div id="overlay"><span class="glyphicon glyphicon-refresh spinning"></span> &nbsp; Loading...</div>')
	        }		    
		};
		function overlay_hide(){
		    $('#overlay').remove();
		};
	</script>

</head>
<body>

	<?php if ($current_user): ?>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="<?php echo Uri::segment(2) == '' ? 'active' : '' ?>">
						<?php echo Html::anchor('admin', 'Dashboard') ?>
					</li>

					<li class="<?php echo Uri::segment(2) == 'questions' ? 'active' : '' ?>">
						<a href="<?=Uri::create('admin/questions');?>">Questions</a>
					</li>

					<li class="<?php echo Uri::segment(2) == 'results' ? 'active' : '' ?>">
						<a href="<?=Uri::create('admin/results')?>">Results</a>
					</li>
					<li class="<?php echo Uri::segment(2) == 'mailarchive' ? 'active' : '' ?>">
						<a href="<?=Uri::create('admin/mailarchive')?>">Mailarchive</a>
					</li>

					<li class="<?php echo Uri::segment(2) == 'users' ? 'active' : '' ?>">
						<a href="<?=Uri::create('admin/users')?>">Users</a>
					</li>
					<li class="<?php echo Uri::segment(2) == 'invoice' ? 'active' : '' ?>">
						<a href="<?=Uri::create('admin/invoice');?>">Invoice</a>
					</li>
					<li class="<?php echo Uri::segment(2) == 'department' ? 'active' : '' ?>">
						<a href="<?=Uri::create('admin/department');?>">Departments</a>
					</li>
					<li class="dropdown <?php echo in_array(Uri::segment(2), array(
							'label', 'mailout'
						)) ? 'active' : '' ?>">
						<a data-toggle="dropdown" class="dropdown-toggle " href="#">Setting <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li class="<?php echo Uri::segment(2) == 'sites' ? 'active' : '' ?>"><?php echo Html::anchor('admin/sites', 'Site') ?></li>
							<li class="<?php echo Uri::segment(2) == 'page' ? 'active' : '' ?>"><?php echo Html::anchor('admin/page', 'Page') ?></li>
							<li class="<?php echo Uri::segment(2) == 'label' ? 'active' : '' ?>"><?php echo Html::anchor('admin/label', 'Label') ?></li>
							<li class="<?php echo Uri::segment(2) == 'mailout' ? 'active' : '' ?>"><?php echo Html::anchor('admin/mailout', 'Mailout') ?></li>
						</ul>
					</li>

					<li class="dropdown <?php echo in_array(Uri::segment(2), array(
							'fixeditem'
						)) ? 'active' : '' ?>">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#">Lookup <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li class="<?php echo Uri::segment(2) == 'fixeditem' ? 'active' : '' ?>"><?php echo Html::anchor('admin/fixeditem', 'Fixeditem') ?></li>
							<li class="<?php echo Uri::segment(2) == 'tax' ? 'active' : '' ?>"><?php echo Html::anchor('admin/tax', 'Rates') ?></li>
						</ul>
					</li>
					<li class="dropdown <?php echo in_array(Uri::segment(2), array(
							'employee'
						)) ? 'active' : '' ?>">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#">Employee <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li class="<?php echo Uri::segment(2) == 'employee' ? 'active' : '' ?>"><?php echo Html::anchor('admin/employee', 'Employee List') ?></li>
							<li class="<?php echo Uri::segment(2) == 'attendance' ? 'active' : '' ?>"><?php echo Html::anchor('admin/attendance', 'Attendance') ?></li>
							<li class="<?php echo Uri::segment(2) == 'salary' ? 'active' : '' ?>"><?php echo Html::anchor('admin/salary', 'Salary') ?></li>
							<li class="<?php echo Uri::segment(2) == 'salarylogs' ? 'active' : '' ?>"><?php echo Html::anchor('admin/salarylogs', 'Salary Logs') ?></li>
							<li class="<?php echo Uri::segment(2) == 'annualreport' ? 'active' : '' ?>"><?php echo Html::anchor('admin/annualreport', 'Annual Report') ?></li>
						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav pull-right">
					<li class="dropdown">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo $current_user->username ?> <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><?php echo Html::anchor('admin/logout', 'Logout') ?></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Login</h1>
				<!-- <h1><?php $title; ?></h1> -->
				<hr>
<?php if (Session::get_flash('success')): ?>
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<p>
					<?php echo implode('</p><p>', (array) Session::get_flash('success')); ?>
					</p>
				</div>
<?php endif; ?>
<?php if (Session::get_flash('error')): ?>
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<p>
					<?php echo implode('</p><p>', (array) Session::get_flash('error')); ?>
					</p>
				</div>
<?php endif; ?>
			</div>
			<div class="col-md-12">
<?php echo $content; ?>
			</div>
		</div>
		<hr/>
		<footer>

		</footer>
	</div>

	<!-- Modal -->
<div class="modal fade" id="js-modal">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    	<div class="modal-body js-modal-content">
    		
    	</div>
    </div>
  </div>
</div>

	<!-- large Modal -->
<div class="modal fade" id="js-modal-lg">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content"><div class="modal-body js-modal-content"></div></div>
  </div>
</div>

<div id="notificationDiv"></div>
</body>
</html>
