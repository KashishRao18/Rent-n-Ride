<!DOCTYPE html>
<html>
    <head>
        <!-- Include your CSS and JavaScript libraries -->
    </head>
    <body>
        <div class="driver-dashboard">
            <div class="driver-info">
                <!-- Display driver information here -->
            </div>
            <div class="booking-info">
                <div class="total-booking">
                    <!-- Display total booking information -->
                </div>
                <div class="today-booking">
                    <!-- Display today's booking information -->
                </div>
                <div class="current-booking">
                    <!-- Display current booking information -->
                </div>
                <div class="completed-booking">
                    <!-- Display completed booking information -->
                </div>
            </div>
        </div>

        <script>
            // Use AJAX to fetch data from the back-end and update the dashboard
            // Update driver information and booking information
        </script>
        <?php
// Include your database connection script
// Fetch total bookings
        $totalBookings = "SELECT COUNT(*) AS total_bookings FROM bookings WHERE driver_id = ?; ";
// Fetch today's bookings
                $todayBookings = "SELECT COUNT(*) AS today_bookings FROM bookings WHERE driver_id = ? AND DATE(booking_date) = CURDATE();";
// Fetch current bookings
                $currentBookings = "SELECT COUNT(*) AS current_bookings FROM bookings WHERE driver_id = ? AND DATE(booking_date) >= CURDATE();";

// Fetch completed bookings
                $completedBookings = "SELECT COUNT(*) AS completed_bookings FROM bookings WHERE driver_id = ? AND booking_status = 'Completed';";
// Organize the data into an array
                $data = array(
            'totalBookings' => $totalBookings,
            'todayBookings' => $todayBookings,
            'currentBookings' => $currentBookings,
            'completedBookings' => $completedBookings,
        );

// Return the data as JSON
        header('Content-Type: application/json');
        echo json_encode($data);
        ?>

    </body>
</html>
