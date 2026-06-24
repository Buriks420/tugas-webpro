</div> </div> </div> </div> </main>
</div> <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0-beta2/dist/js/adminlte.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const visitorCtx = document.getElementById('visitorChart').getContext('2d');
    new Chart(visitorCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Pengunjung',
                data: [150, 200, 180, 250, 300, 280],
                borderColor: '#007bff',
                tension: 0.1,
                fill: false
            }]
        },
        options: { responsive: true, maintainAspectRatio: false }
    });

    const salesCtx = document.getElementById('salesChart').getContext('2d');
    new Chart(salesCtx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Penyewa',
                data: [45, 60, 50, 80, 120, 95],
                backgroundColor: '#28a745'
            }]
        },
        options: { responsive: true, maintainAspectRatio: false }
    });
});
</script>
</body>
</html>