// resources/js/fullcalendar.js
import { Calendar } from '@fullcalendar/core'
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';
import momentTimezonePlugin from '@fullcalendar/moment-timezone';
import jaLocale from '@fullcalendar/core/locales/ja';


document.addEventListener('DOMContentLoaded', function () {
  const calendarEl = document.getElementById('calendar');

  const calendar = new Calendar(calendarEl, {
    allDaySlot: false,
    plugins: [timeGridPlugin, momentTimezonePlugin, interactionPlugin],
    timeZone: 'Asia/Tokyo', // momentTimezonePlugin
    initialView: 'timeGridWeek',
    locales: [ jaLocale],
    locale: 'ja',
    slotMinTime: '08:00:00',
    slotMaxTime: '18:00:00',
    contentHeigh: 'auto',
    height: 'auto',
    googleCalendarApiKey: 'AIzaSyDq0vOKEt3DRYR1Fz9-_hEDKENAwuh7cdI',
     eventSources: [
        {
          googleCalendarId: 'ja.japanese#holiday@group.v.calendar.google.com',
          className: 'event_holiday'
        },
        {
          googleCalendarId: 'hoge-na-calendar@group.calendar.google.com',
        }
      ]
  });
  
  calendar.render();
});

