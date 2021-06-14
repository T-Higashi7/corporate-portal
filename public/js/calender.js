
document.addEventListener('DOMContentLoaded', function() {

    var calendar = new FullCalendar.Calendar(calendarEl, {
      locale: 'ja',
    });
    calendar.render();　// カレンダーの初期化（再レンダリング）
});