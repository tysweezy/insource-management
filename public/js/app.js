(function() {
  $('#calendar').fullCalendar({
  	googleCalendarApiKey: 'AIzaSyDneK7IFZiEwOt7uwDTwrLc4ya5MfrDx_8',
  	events: {
  		googleCalendarId: 'decipherinc.com_aslkt25aau43jprcv094ui4ivo@group.calendar.google.com'
  	}
  });


  // datepicker
  /*$(".datepicker").datepicker()
  .on('show', function(ev){                 
      var today = new Date();
      var t = today.getDate() + "-" + today.getMonth() + "-" + today.getFullYear();
      $('.datepicker').data({date: t}).datepicker('update');
  });*/

$(".datepicker").datepicker("update", new Date());

// delete project


})();