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
        title: 'Estudio bíblico (Virtual)',
        start: '2023-02-02T19:10:00',
        end: '2023-02-02T20:30:00',
    },
    {
        id: 'event2',
        calendarId: 'cal1',
        title: 'MVD',
        start: '2023-02-04T17:00:00',
        end: '2023-02-04T18:30:00',
    },
    {
        id: 'event3',
        calendarId: 'cal1',
        title: 'Culto de oración (Virtual)',
        start: '2023-02-04T19:00:00',
        end: '2023-02-04T20:30:00',
    },
    {
        id: 'event4',
        calendarId: 'cal1',
        title: 'Culto',
        start: '2023-02-05T08:30:00',
        end: '2023-02-05T10:00:00',
    },
    {
        id: 'event5',
        calendarId: 'cal1',
        title: 'Culto',
        start: '2023-02-05T10:30:00',
        end: '2023-02-05T12:00:00',
    },
    {
        id: 'event6',
        calendarId: 'cal1',
        title: 'Culto de oración (Presencial)',
        start: '2023-02-07T19:10:00',
        end: '2023-02-07T20:30:00',
    },
    {
        id: 'event7',
        calendarId: 'cal1',
        title: 'Ayuno',
        start: '2023-02-08T09:00:00',
        end: '2023-02-08T12:00:00',
    },
    {
        id: 'event8',
        calendarId: 'cal1',
        title: 'Estudio bíblico (Virtual)',
        start: '2023-02-09T19:10:00',
        end: '2023-02-09T20:30:00',
    },
    {
        id: 'event9',
        calendarId: 'cal1',
        title: 'Adulto Mayor',
        start: '2023-02-10T09:30:00',
        end: '2023-02-10T12:00:00',
    },
    {
        id: 'event10',
        calendarId: 'cal1',
        title: 'MVD',
        start: '2023-02-11T17:00:00',
        end: '2023-02-11T18:30:00',
    },
    {
        id: 'event11',
        calendarId: 'cal1',
        title: 'Culto',
        start: '2023-02-12T08:30:00',
        end: '2023-02-12T10:00:00',
    },
    {
        id: 'event12',
        calendarId: 'cal1',
        title: 'Culto',
        start: '2023-02-12T10:30:00',
        end: '2023-02-12T12:00:00',
    },
    {
        id: 'event13',
        calendarId: 'cal1',
        title: 'Culto de oración (Virtual)',
        start: '2023-02-14T19:10:00',
        end: '2023-02-14T20:30:00',
    },
    {
        id: 'event14',
        calendarId: 'cal1',
        title: 'Ayuno',
        start: '2023-02-15T09:00:00',
        end: '2023-02-15T12:00:00',
    },
    {
        id: 'event15',
        calendarId: 'cal1',
        title: 'Estudio bíblico (Virtual)',
        start: '2023-02-16T19:10:00',
        end: '2023-02-16T20:30:00',
    },
    {
        id: 'event16',
        calendarId: 'cal1',
        title: 'Damas',
        start: '2023-02-17T18:30:00',
        end: '2023-02-17T20:00:00',
    },
    {
        id: 'event17',
        calendarId: 'cal1',
        title: 'MVD',
        start: '2023-02-18T17:00:00',
        end: '2023-02-18T18:30:00',
    },
    {
        id: 'event18',
        calendarId: 'cal1',
        title: 'Culto',
        start: '2023-02-19T08:30:00',
        end: '2023-02-19T10:00:00',
    },
    {
        id: 'event19',
        calendarId: 'cal1',
        title: 'Culto',
        start: '2023-02-19T10:30:00',
        end: '2023-02-19T12:00:00',
    },
    {
        id: 'event20',
        calendarId: 'cal1',
        title: 'Culto de oración (Virtual)',
        start: '2023-02-21T19:10:00',
        end: '2023-02-21T20:30:00',
    },
    {
        id: 'event21',
        calendarId: 'cal1',
        title: 'Ayuno',
        start: '2023-02-22T09:00:00',
        end: '2023-02-22T12:00:00',
    },
    {
        id: 'event22',
        calendarId: 'cal1',
        title: 'Estudio bíblico (Presencial)',
        start: '2023-02-23T19:10:00',
        end: '2023-02-23T20:30:00',
    },
    {
        id: 'event23',
        calendarId: 'cal1',
        title: 'MVD',
        start: '2023-02-25T17:00:00',
        end: '2023-02-25T18:30:00',
    },
    {
        id: 'event24',
        calendarId: 'cal1',
        title: 'Culto',
        start: '2023-02-26T08:30:00',
        end: '2023-02-26T10:00:00',
    },
    {
        id: 'event25',
        calendarId: 'cal1',
        title: 'Culto',
        start: '2023-02-26T10:30:00',
        end: '2023-02-26T12:00:00',
    },
    {
        id: 'event26',
        calendarId: 'cal1',
        title: 'Culto de oración (Virtual)',
        start: '2023-02-28T19:10:00',
        end: '2023-02-28T20:30:00',
    }
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
