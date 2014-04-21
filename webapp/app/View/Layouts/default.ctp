<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<title>
		<?php echo 'TravelNotes'?> - <?php echo Inflector::humanize(Inflector::tableize($title_for_layout)); ?>
	</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="<?php echo Router::url('/'); ?>" />

	<?php
		//echo $this->Html->meta('icon', '');

		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('bootstrap-responsive.min');
    	echo $this->Html->css('jquery.dataTables');
    	echo $this->Html->css('jquery-ui-1.10.3.custom.min');
    	echo $this->Html->css('custom_sand');
    	
    	echo $this->Html->script('jquery-1.8.3.min');
    	echo $this->Html->script('jquery-ui-1.10.3.custom.min');
    	echo $this->Html->script('bootstrap.min');
    	
	?>
	<script>

	$.url = function(url) {
		  return $('base').attr('href')+url.substr(1);
		};

	$(function() {
        $(".datepicker").datepicker({ 
         dateFormat: "yy-mm-dd",
         changeMonth: true,
         changeYear: true 
  		});
  	});

	$(function() {
		$(".datetimepicker").datetimepicker({ 
        format: "yyyy-mm-dd hh:ii",
        autoclose: true,
        todayBtn: true,
        startDate: "2013-01-01 08:00",
        minuteStep: 10
        });
	});
	
	</script>
    <style>
      html,
      body {
        height: 100%;
        /* The html and body elements cannot have any padding or margin. */
      }

      /* Wrapper for page content to push down footer */
      #wrap {
        min-height: 100%;
        height: auto !important;
        height: 100%;
        /* Negative indent footer by it's height */
        margin: 0 auto -60px;
      }

      /* Set the fixed height of the footer here */
      #push,
      #footer {
        height: 60px;
      }
      #footer {
        background-color: #f5f5f5;
      }

      /* Lastly, apply responsive CSS fixes as necessary */
      @media (max-width: 767px) {
        #footer {
          margin-left: -20px;
          margin-right: -20px;
          padding-left: 20px;
          padding-right: 20px;
        }
      }

       .container {
        width: auto;
        max-width: 767px;
      }
      .container .credit {
        margin: 20px 0;
      }

      .body-padding {
     	margin-bottom: 40px;
  	  }
    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>

  <body>

  	<div id="wrap">
  	<p class="body-padding">
   	&nbsp;
	</p>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <?php echo $this->Html->link(__('TravelNotes'), '/', array("class" => 'brand')); ?>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><?php echo $this->Html->link(__('Home'), '/'); ?></li>
              <li><a href="#about"><?php echo __('About'); ?></a></li>
              <li><a href="#contact"><?php echo __('Contact'); ?></a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    
	    <div class="container">

				<?php echo $this->Session->flash(); ?>

				<?php echo $this->fetch('content'); ?>
	    </div>
	    <div id="push"></div>

<?php
    echo $this->Html->script('jquery-1.8.3.min');
    echo $this->Html->script('bootstrap.min');
    echo $this->Html->script('jquery.dataTables.min.js');
    echo $this->Html->script('dataTables.bootstrap.js');
?>

   <script type="text/javascript">
      $(document).ready( function () {
        $('#list').dataTable( {
          "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>"
        } );
      } );
      $('[rel=tooltip]').tooltip();
  </script>

	</div>
    <div id="footer">
      <div class="container" align="right">      
        	<table cellspacing=0 cellpadding=0><tr><td><?php //echo $this->Html->image('logo.png'); ?></td><td> <?php echo __('Built by  ') . $this->Html->link('BWare', 'http://www.bwaremoz.com/'); ?></td></table>
      </div>
    </div>
    <?php
    	echo $this->Js->writeBuffer();
    	//echo $this->element('sql_dump');
     ?>
  </body>
</html>
