import Calendar from '@toast-ui/calendar';
import '@toast-ui/calendar/dist/toastui-calendar.min.css';
import 'tui-date-picker/dist/tui-date-picker.css';
import 'tui-time-picker/dist/tui-time-picker.css';

const container = document.getElementById('calendar');
const options = {
    defaultView: 'month',
    timezone: {
        zones: [
            {
                timezoneName: 'America/Costa_Rica',
                displayLabel: 'CR',
            },
        ],
    },
    calendars: [
        {
            id: 'cal1',
            name: 'activities',
            backgroundColor: '#git ',
            color: '#1D4ED8',
            borderColor: '#1D4ED8'
        },
    ],
    month: {
        taskView: false,
        startDayOfWeek: 1,
        dayNames: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb' ],
    },
    week: {
        taskView: false,
        startDayOfWeek: 1,
        dayNames: ['', '', '', '', '', '', '' ],
    },
    isReadOnly: true,
    useDetailPopup: true,
    useFormPopup: false,
};

const calendar = new Calendar(container, options);

calendar.createEvents([
    {
        id: 'event1',
        calendarId: 'cal1',
        title: 'Ayuno',
        start: '2023-01-14T09:00:00',
        end: '2023-01-14T14:00:00',
    },
    {
        id: 'event2',
        calendarId: 'cal1',
        title: 'MVD',
        start: '2023-01-14T17:00:00',
        end: '2023-01-14T18:30:00',
    },
    {
        id: 'event3',
        calendarId: 'cal1',
        title: 'Culto',
        start: '2023-01-15T08:30:00',
        end: '2023-01-15T10:00:00',
    },
    {
        id: 'event4',
        calendarId: 'cal1',
        title: 'Culto',
        start: '2023-01-15T10:30:00',
        end: '2023-01-15T12:00:00',
    },
    {
        id: 'event5',
        calendarId: 'cal1',
        title: 'Culto de oración (Virtual)',
        start: '2023-01-17T19:10:00',
        end: '2023-01-17T20:30:00',
    },
    {
        id: 'event6',
        calendarId: 'cal1',
        title: 'Ayuno',
        start: '2023-01-18T09:00:00',
        end: '2023-01-18T12:00:00',
    },
    {
        id: 'event7',
        calendarId: 'cal1',
        title: 'Estudio bíblico (Virtual)',
        start: '2023-01-19T19:10:00',
        end: '2023-01-19T20:30:00',
    },
    {
        id: 'event8',
        calendarId: 'cal1',
        title: 'Reunión de damas',
        start: '2023-01-20T18:30:00',
        end: '2023-01-20T20:00:00',
    },
    {
        id: 'event9',
        calendarId: 'cal1',
        title: 'MVD+',
        start: '2023-01-20T19:00:00',
        end: '2023-01-20T20:30:00',
    },
    {
        id: 'event10',
        calendarId: 'cal1',
        title: 'MVD',
        start: '2023-01-21T17:00:00',
        end: '2023-01-21T18:30:00',
    },
    {
        id: 'event11',
        calendarId: 'cal1',
        title: 'Culto',
        start: '2023-01-22T08:30:00',
        end: '2023-01-22T10:00:00',
    },
    {
        id: 'event12',
        calendarId: 'cal1',
        title: 'Culto',
        start: '2023-01-22T10:30:00',
        end: '2023-01-22T12:00:00',
    },
    {
        id: 'event13',
        calendarId: 'cal1',
        title: 'Culto de oración (Virtual)',
        start: '2023-01-17T19:10:00',
        end: '2023-01-17T20:30:00',
    },
    {
        id: 'event14',
        calendarId: 'cal1',
        title: 'Ayuno',
        start: '2023-01-18T09:00:00',
        end: '2023-01-18T12:00:00',
    },
    {
        id: 'event15',
        calendarId: 'cal1',
        title: 'Estudio bíblico (Presencial)',
        start: '2023-01-19T19:10:00',
        end: '2023-01-19T20:30:00',
    },
    {
        id: 'event16',
        calendarId: 'cal1',
        title: 'MVD',
        start: '2023-01-21T17:00:00',
        end: '2023-01-21T18:30:00',
    },
    {
        id: 'event17',
        calendarId: 'cal1',
        title: 'Culto',
        start: '2023-01-22T08:30:00',
        end: '2023-01-22T10:00:00',
    },
    {
        id: 'event18',
        calendarId: 'cal1',
        title: 'Culto',
        start: '2023-01-22T10:30:00',
        end: '2023-01-22T12:00:00',
    },
]);

window.selectNew = function() {
    var newL = document.getElementById("list");
    newL.classList.toggle("hidden");

    document.getElementById("ArrowSVG").classList.toggle("rotate-180");
};

document.getElementById('btnChangeView').addEventListener('click', function() {
    switch (calendar.getViewName())
    {
        case "day":
            calendar.changeView("month");
            break;
        case "month":
            calendar.changeView("week");
            break;
        case "week":
            calendar.changeView("day");
            break;
    }
});

document.getElementById('btnNext').addEventListener('click', function() {
    calendar.next();
});

document.getElementById('btnPrev').addEventListener('click', function() {
    calendar.prev();
});
