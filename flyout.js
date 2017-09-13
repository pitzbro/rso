jQuery(function($) {
    
	$( document ).ready(function() {

        console.log('hello, flyout is in the house');

        var closestDate = null;
        var closestEvent = null;
		
		function flyout(first) {		
			$(".flyout-item").each(function(){
				var flyout = $(this);
				var mydate  = flyout.attr('data-date');
				var myCell = $('.fc-day[data-date="'+mydate+'"]');

				myCell.addClass('fc-cell-event');

                console.log('is this the first time?', first);

                if (first) {
                    console.log('is this cell in the future?', myCell.hasClass('fc-future'));
                    console.log('is ', mydate, 'smaller then ', closestEvent, '?', (!closestEvent || mydate < closestEvent))
                    if (myCell.hasClass('fc-future') && (!closestDate || mydate < closestDate)) {
                        closestDate = mydate;
                        closestEvent = flyout;
                        console.log('closest event', closestEvent );
                    }
                }

				myCell.click(function(){
					revertFlyouts();
					flyout.addClass('opened');
				});

				// Showing only the first event in each day
				// Get the date of the event through the text
				// found = false;
				
				// Search the previous events to see if it is a new date
				// $.each(flyout.prevAll(), function () {
				// 	if ($(this).find('.fc-event-title').text() == mydate) {
				// 		found = true;
				// 	}
				// });

				
				// // Add class according to multiple or single dates
				// if (found){
				// 	flyout.addClass('multiple-event');
				// }
				// else {
				// 	flyout.addClass('first-child-event');
				// }	
							
			});
		}

		function revertFlyouts() {
			$(".flyout-item").each(function(){
				$(this).removeClass('opened');
			});
		}

		// Run script on month change
		$(".fc-button").click(function(){
			flyout();
		});

		// Run script on page load
		flyout(true);
        closestEvent.addClass('opened');
	});
	
});