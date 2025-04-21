<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reports</title>
    <?php
    include './headerLinks.php';
    include './sessionWithoutLogin.php';
    include './databaseConnection.php';
    ?>
</head>
<body id="page-top">
<div id="wrapper">
    <?php
    include './sidebar.php';
    ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <?php
        include './header.php';
        ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <main>
                <div class="row">
                    <div class="col">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Cancellation Report</h1>
                            <a href="#" id="generateBtn" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                <i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div id="cancellationReport">
                                    <!-- Display report here -->
                                </div>


                            </div>
                        </div>
                    </div>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <!-- jsPDF library -->
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>

                    <!-- html2pdf library -->
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

                    <script>
                        // Function to get the current date and time
                        function getCurrentDateTime() {
                            const currentDateTime = new Date();
                            return currentDateTime.toLocaleString(); // You can customize the date and time format as needed.
                        }

                        // Add event listener to the "Generate Report" button
                        document.getElementById("generateBtn").addEventListener("click", function() {
                            // Generate the PDF from the main content (Carresult)
                            const element = document.getElementById("Carresult").innerHTML;
                            const generateBtn = document.getElementById("generateBtn");

                            if (element.includes("No records found!")) {
                                generateBtn.style.display = "none";
                            } else {
                                generateBtn.style.display = "inline-block";
                            }

                            const timestamp = getCurrentDateTime();
                            const name = "<?php echo $_SESSION['Admin_name'] ?>";
                            const date = timestamp.split(',')[0];
                            const time = timestamp.split(',')[1];
                            const generatedContent = `
         <pre><h2 style="margin-top:3%;margin-left: 2%;text-align: center">Total car</h2></pre>
        <pre style="margin-right:5%;margin-left: 5%;">${element}</pre>
        <pre style="margin-right:5%;margin-left: 5%;"><b>Date:</b> ${date} | <b>Time:</b> ${time} | <b>Name:</b> ${name}</pre>
      `;
                            html2pdf()
                                .from(generatedContent)
                                .save("output.pdf");
                        });


                        $(document).ready(function () {
                            $("#myCar").submit(function (event) {
                                // Stop form from submitting normally
                                event.preventDefault();

                                // Get form data
                                var formData = $(this).serialize();

                                // Submit form data using AJAX
                                $.ajax({
                                    type: "POST",
                                    url: "./ajax/carReport.php",
                                    data: formData,
                                    success: function (response) {
                                        // Display results
                                        $("#Carresult").html(response);

                                    },
                                    error: function () {
                                        // Display error message
                                        alert("Error selecting records");
                                    }
                                });
                            });
                        });
                    </script>
                </div>
            </main>
        </div>
        <!-- End admin -->
    </div>
</div>
<!-- End of Main Content -->
<?PHP include './footerLinks.php'; ?>
</body>
</html>