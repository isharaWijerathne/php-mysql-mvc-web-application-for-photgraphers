<?php
require("../../include/cdn.php");
require("../../components/mainHeader/mainHeader.php");
require("../../components/mainFotter/mainFotter.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Your Day</title>

    <!-- Bootstrap and FullCalendar CSS -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/index.global.min.css' rel='stylesheet'>

    <style>
        #calendar {
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1>Book Your Day</h1>
    <h4 id="tt">Selected Date</h4>
    <div id="calendar"></div>
</div>

<!-- FullCalendar and Bootstrap JS -->
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/index.global.min.js'></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            themeSystem: 'bootstrap5',
            initialView: 'dayGridMonth',
            selectable: true,
            eventColor: '#198754',
            eventTextColor: '#fff',

            select: function (info) {
                document.getElementById('tt').innerText =
                    "Selected from " + info.startStr + " to " + info.endStr;
            }
        });

        calendar.render();
    });
</script>

</body>
</html>
