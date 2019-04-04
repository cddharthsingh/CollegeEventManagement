
<div class="box box-primary">
  <div class="box-body no-padding">
    <!-- THE CALENDAR -->
    <div id="calendar"></div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /. box -->
<style>
.fc-disabled {
    background-color: #F0F0F0 !important;
    color: #000;
    cursor: default;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:10px;
}
</style>
<script language="javascript">
$(function () {
	$('#calendar').fullCalendar({
		//timeFormat: 'H(:mm)t',
		header: {
        	left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
		},
        buttonText: {
            today: 'today',
            month: 'month',
            week: 'week',
            day: 'day'
        },
		//hiddenDays: [ 2, 4 ],
        events: function(start, end, timezone, callback) {
			$.ajax({
				url	: '<?php echo WEB_ROOT; ?>api/process.php?cmd=calview',
				dataType: 'json',
				type	: 'POST',
				data	: {
					start	: start.format(),
					end		: end.format()
				},
				success: function(doc) {
					var events = [];
					//console.log('events #########');
					callback(doc);
				}
			});
		},
        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar !!!
        drop: function (date, allDay) { },
		eventClick: function(calEvent, jsEvent, view) {
			//alert('Event: ' + calEvent.title);
			//alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
			//alert('View: ' + view.name);
			// change the border color just for fun
			//$(this).css('border-color', 'red');
		},
		dayRender: function(date, cell){
			//console.log('dayRender');
    		//console.log(date.format());
			//$(cell).addClass('fc-disabled').html('Disabled');
			 $(cell).css('opacity', 1);
			//$(cell).css("display", "none");//    display:none;
		},
		viewRender: function(view, element) {},
		eventRender: function(ev, element, view) {
			//element.qtip({content: ev.title});
		},
		eventAfterRender : function(ev, element, view) {
			if(ev.block == true) {
				//console.log('After Render = ' + ev.title + ' BLOCK ? ' + ev.block);
				//fc-day fc-widget-content
				var start = ev.start.format();
				$("td.fc-day[data-date='"+ start +"']").addClass('fc-disabled');
			}
		}
		/*,
		
		eventMouseover: function(calEvent, jsEvent) {
			var tooltip = '<div class="tooltipevent" style="width:100px;height:100px;background:#ccc;position:absolute;z-index:10001;">' + calEvent.title + '</div>';
			var $tootlip = $(tooltip).appendTo('body');
		
			$(this).mouseover(function(e) {
				$(this).css('z-index', 10000);
				$tooltip.fadeIn('500');
				$tooltip.fadeTo('10', 1.9);
			}).mousemove(function(e) {
				$tooltip.css('top', e.pageY + 10);
				$tooltip.css('left', e.pageX + 20);
			});
		},
		eventMouseout: function(calEvent, jsEvent) {
			$(this).css('z-index', 8);
			$('.tooltipevent').remove();
		}*/
	});
});//off
</script>