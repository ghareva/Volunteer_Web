<?php
include_once 'header.php';
?>

<!-- FullCalendar -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>

<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- jQuery (for AJAX) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth'
        });
        calendar.render();
    });

</script>

<div class="container">
    <?php include_once 'sidebar.php'; ?>

    <!-- Main Content -->
    <main class="content">
        <section class="tab-content active">
            <div class="card">
                <h3>Calendar</h3>
                <div id='calendar'></div>

                <!-- Modal -->
                <div class="modal fade" id="eventModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <form id="eventForm" class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Event</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="start" name="start">
                                <input type="hidden" id="end" name="end">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Event Title</label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save Event</button>
                            </div>
                        </form>
                    </div>
                </div>

                <script>
                    let calendar;
                    document.addEventListener('DOMContentLoaded', function () {
                        const calendarEl = document.getElementById('calendar');

                        calendar = new FullCalendar.Calendar(calendarEl, {
                            initialView: 'timeGridWeek',
                            selectable: true,
                            editable: true,
                            headerToolbar: {
                                left: 'prev,next today',
                                center: 'title',
                                right: 'dayGridMonth,timeGridWeek,timeGridDay'
                            },
                            select: function(info) {
                                $('#start').val(info.startStr);
                                $('#end').val(info.endStr);
                                $('#eventModal').modal('show');
                            },
                            events: 'load-events.php' // Loads events from DB
                        });

                        calendar.render();
                    });

                    // Handle form submit
                    $('#eventForm').on('submit', function(e) {
                        e.preventDefault();
                        $.ajax({
                            url: 'save-event.php',
                            type: 'POST',
                            data: $(this).serialize(),
                            success: function(response) {
                                $('#eventModal').modal('hide');
                                calendar.refetchEvents(); // reload from DB
                            },
                            error: function() {
                                alert('Error saving event.');
                            }
                        });
                    });
                </script>
            </div>
        </section>
    </main>
</div>

<?php
include_once 'footer.php';
?>

