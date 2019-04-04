$(function () {
	console.log("Hello");
	var date = new Date();
    var d = date.getDate(),
    m = date.getMonth(),
    y = date.getFullYear();
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
        events: function(start, end, timezone, callback) {
			$.ajax({
				url: 'api/process.php?cmd=calview',
				dataType: 'json',
				type: 'POST',
				data: {
					start: start.format(),
					end: end.format()
				},

				success: function(doc) {
					var events = [];
					callback(doc);
				}
			});
		},
        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar !!!
        drop: function (date, allDay) { },
		eventClick: function(calEvent, jsEvent, view) {
			alert('Event: ' + calEvent.title);
			//alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
			//alert('View: ' + view.name);
			// change the border color just for fun
			$(this).css('border-color', 'red');
		}
	});
});//off