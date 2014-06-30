/* Custom functions */
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
	
	$(document).ready( function () {
		$('#list').dataTable( {
	        	"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>"
	    	} );
	    } );
	$('[rel=tooltip]').tooltip();

	
