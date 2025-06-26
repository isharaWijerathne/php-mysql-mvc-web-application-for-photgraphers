<?php
require("../../include/cdn.php");
require("../../components/mainHeader/mainHeader.php");
require("../../components/mainFotter/mainFotter.php");
?>

<!DOCTYPE html>
<html lang="en">

<style>
    body {
        background-image: linear-gradient(to top, #ff0844 0%, #ffb199 100%);
    }
</style>

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

        #calendar,
        #calendar .fc,
        #calendar .fc-toolbar-title,
        #calendar .fc-button,
        #calendar .fc-col-header-cell-cushion,
        #calendar .fc-daygrid-day-number,
        #calendar .fc-event-title {
            color: #000 !important;
        }


        .fc .fc-daygrid-day-frame,
        .fc .fc-scrollgrid,
        .fc .fc-col-header-cell,
        .fc .fc-daygrid-day,
        .fc .fc-daygrid-body,
        .fc .fc-scrollgrid-section,
        .fc .fc-scrollgrid-sync-table {
            border-color: #000 !important;
        }

        /* Optional: black border around event elements */
        .fc-event {
            border: 1px solid #000 !important;
        }

        /* Optional: selection highlight */
        .fc .fc-highlight {
            background: rgba(0, 0, 0, 0.2) !important;
        }
    </style>
</head>

<body>

    <div class="container mt-5">

        <h3 class="text-center  mb-4 ">Book your days</h3>

        <?php if (isset($_COOKIE['create__enquiry_success']) && $_COOKIE['create__enquiry_success'] == true): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="server_msg">
                <i class="bi bi-check-circle-fill me-2"></i>
                Booking created successfully!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-6">
                <h5 class=" text-center  mb-4  ">Select your dates</h5>
                <div id="calendar"></div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 mb-6">

                <div class="card shadow-sm border-0 rounded-4 p-4 mt-4 mx-auto" style="max-width: 700px;">


                    <form method="post" action="../../controllers/enquiry_control/create_enquiry.php"
                        class="row g-3 needs-validation" novalidate>

                        <div class="col-12">
                            <label for="customerName" class="form-label fw-semibold">Customer Name <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg" id="customerName"
                                name="customer_name" required placeholder="Enter your header">
                            <div class="invalid-feedback">Please enter a your name.</div>
                        </div>

                        <div class="col-12">
                            <label for="customerEmail" class="form-label fw-semibold">Customer Email <span
                                    class="text-danger">*</span></label>
                            <input type="email" class="form-control form-control-lg" id="customerEmail"
                                name="customer_email" required placeholder="Enter your email">
                            <div class="invalid-feedback">Please enter a your email.</div>
                        </div>

                        <div class="col-12">
                            <label for="contactNumber" class="form-label fw-semibold">Customer Name <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg" id="contactNumber"
                                name="customer_contact_number" required placeholder="Enter your contact number">
                            <div class="invalid-feedback">Please enter a contact number.</div>
                        </div>

                        <div class="col-12">
                            <label for="selectedCat" class="form-label fw-semibold">Package </label>
                            <select id="selectedCat" class="form-select form-select-lg" name="selected_package_">
                                <option value="" selected>Choose category...</option>
                                <?php // controllers\package_control\get_package_for_booking.php
                                require("../../controllers/package_control/get_package_for_booking.php");
                                while ($result = mysqli_fetch_assoc($get_package_query_for_booking)) {
                                    echo "<option value='{$result['packageID']}'> {$result['categoryName']} {$result['pcakageHeader']} {$result['price']}  </option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-12 d-flex justify-content-center">
                            <p id="tt">Selected Date</p>
                            <input type="hidden" id="str__date" name="str_date" />
                            <input type="hidden" id="end__date" name="end_date" />
                        </div>

                        <div class="col-md-12 d-flex align-items-end justify-content-center">
                            <button type="submit" class="btn btn-danger btn-lg px-4 fw-semibold">
                                <i class="bi bi-plus-circle me-2"></i> Create Package
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- FullCalendar and Bootstrap JS -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/index.global.min.js'></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var strDate = document.getElementById('str__date');
            var endDate = document.getElementById('end__date');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                themeSystem: 'bootstrap5',
                initialView: 'dayGridMonth',
                selectable: true,
                eventColor: '#198754',
                eventTextColor: '#fff',

                select: function (info) {
                    document.getElementById('tt').innerText = "Selected from " + info.startStr + " to " + info.endStr;

                    //update hidden fileds
                    strDate.value = info.startStr;
                    endDate.value = info.endStr;
                }
            });

            calendar.render();
        });


        (() => {
            'use strict';
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();

        // Hide alert message after 5 seconds
        const serverMessage = document.getElementById("server_msg");
        if (serverMessage) {
            setTimeout(() => {
                const bsAlert = new bootstrap.Alert(serverMessage);
                bsAlert.close();
            }, 5000);
        }

    </script>

</body>

</html>