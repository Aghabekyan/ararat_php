$(function() {

	var time = new Date(),
	time = time.format("yyyy-mm-dd");

	function getParameterByName(name) {
	    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
	    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
	        results = regex.exec(location.search);
	    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
	}

	var catid = getParameterByName('catid');

	if (catid != '') {
		catid = '&catid=' + catid;	
	}

	
	$('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		defaultDate: time,
		lang: 'am',
		buttonIcons: false, // show the prev/next text
		weekNumbers: true,
		editable: true,
		eventLimit: true, // allow "more" link when too many events
		events: {
			url: htmDIR + '?ajax_snippets&action=calendar' + catid,
			error: function() {
				$('#script-warning').show();
			}
		},
		loading: function(bool) {
			$('#loading').toggle(bool);
		}
	});
});