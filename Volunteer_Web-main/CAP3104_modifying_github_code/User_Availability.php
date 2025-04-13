<?php
include_once 'header.php';
?>

<style>
    .grid { display: grid; grid-template-columns: repeat(8, 100px); gap: 2px; }
    .grid div { padding: 10px; text-align: center; border: 1px solid #ccc; cursor: pointer; }
    .header { background: #eee; font-weight: bold; }
    .time-slot.selected { background: #4CAF50; color: white; }
</style>

<div class="container">
    <?php include_once 'sidebar.php'; ?>

    <!-- Main Content -->
    <main class="content">
        <section class="tab-content active">
            <div class="card">
                <h3>Availability</h3>
                <div class="grid" id="availability-grid"></div>
                <br>
                <button onclick="submitAvailability()">Submit Availability</button>

                <script>
                    const days = ["", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"];
                    const times = Array.from({length: 24}, (_, i) => `${String(i).padStart(2, '0')}:00`);
                    const grid = document.getElementById("availability-grid");

                    // Generate header row
                    days.forEach(day => {
                        const div = document.createElement("div");
                        div.textContent = day;
                        div.classList.add("header");
                        grid.appendChild(div);
                    });

                    // Generate time slots
                    times.forEach(time => {
                        const row = document.createElement("div");
                        row.textContent = time;
                        row.classList.add("header");
                        grid.appendChild(row);

                        for (let i = 1; i < days.length; i++) {
                            const slot = document.createElement("div");
                            slot.classList.add("time-slot");
                            slot.dataset.day = days[i];
                            slot.dataset.time = time;
                            slot.addEventListener("click", () => slot.classList.toggle("selected"));
                            grid.appendChild(slot);
                        }
                    });

                    fetch('get_availability.php')
                        .then(res => res.json())
                        .then(data => {
                            data.forEach(slot => {
                                const cell = document.querySelector(
                                    `.time-slot[data-day='${slot.day_of_week}'][data-time='${slot.time_block}']`
                                );
                                if (cell) {
                                    cell.classList.add('selected');
                                    cell.dataset.available = 1;
                                }
                            });
                        });

                    function submitAvailability() {
                        const selected = [];
                        document.querySelectorAll(".time-slot.selected").forEach(cell => {
                            selected.push({ day: cell.dataset.day, time: cell.dataset.time });
                        });

                        fetch("save_availability.php", {
                            method: "POST",
                            headers: { "Content-Type": "application/json" },
                            body: JSON.stringify({ availability: selected })
                        })
                            .then(res => res.text())
                            .then(data => alert("Availability saved!"))
                            .catch(err => alert("Error saving availability."));
                    }
                </script>
            </div>
        </section>
    </main>
</div>

<?php
include_once 'footer.php';
?>

