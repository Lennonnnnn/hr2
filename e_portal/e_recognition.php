<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate of Recognition</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        .divider {
            border-left: 2px solid gray;
            height: 100%;
            margin: 0 15px;
        }
        .certificate {
            border: 2px solid gray;
            border-radius: 10px;
            margin: 10px 0;
            padding-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container-fluid bg-dark text-white py-5">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <h1 class="text-center mb-4 text-yellow">Certificates of Recognition</h1>
                <div class="row justify-content-center">
                    <div class="col-md-8 border border-light rounded p-5 bg-dark text-white">
                        <div class="row">
                            <!-- Certificate 1 -->
                            <div class="col-md-4">
                                <div class="certificate bg-dark text-white">
                                    <div class="certificate-header">
                                        <h2 class="text-center mb-4 text-yellow">Certificate of Recognition</h2>
                                    </div>
                                    <div class="certificate-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <img src="../lennon1.jpg" alt="Placeholder for Employee Picture" class="img-fluid rounded-circle">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 class="text-center mb-4 text-yellow" id="employee-name-1">John Lennon D. Aguilor</h3>
                                                <p class="text-center mb-4 text-yellow" id="employee-role-1">Software Engineer</p>
                                                <p class="text-center mb-4 text-yellow" id="employee-department-1">IT Department</p>
                                                <p class="text-center mb-4 text-yellow">In recognition of outstanding contributions to the company.</p>
                                                <p class="text-center mb-4 text-yellow">Your dedication, hard work, and commitment to excellence have not gone unnoticed.</p>
                                                <p class="text-center mb-4 text-yellow">We are grateful for your service and look forward to your continued success.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="certificate-footer">
                                        <p class="text-center mb-4 text-yellow">Date: <span id="date-1"></span></p>
                                        <p class="text-center mb-4 text-yellow">Signature: ______________________________</p>
                                        <button class="btn btn-primary mb-3 p-2" id="download-certificate-1">Download Certificate</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Certificate 2 -->
                            <div class="col-md-4">
                                <div class="certificate bg-dark text-white">
                                    <div class="certificate-header">
                                        <h2 class="text-center mb-4 text-yellow">Certificate of Recognition</h2>
                                    </div>
                                    <div class="certificate-body">  
                                        <div class="row">
                                            <div class="col-md-12">
                                                <img src="../lennon2.jpg" alt="Placeholder for Employee Picture" class="img-fluid rounded-circle">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 class="text-center mb-4 text-yellow" id="employee-name-2">John Lennon D. Aguilor</h3>
                                                <p class="text-center mb-4 text-yellow" id="employee-role-2">Marketing Manager</p>
                                                <p class="text-center mb-4 text-yellow" id="employee-department-2">Marketing Department</p>
                                                <p class="text-center mb-4 text-yellow">In recognition of outstanding contributions to the company.</p>
                                                <p class="text-center mb-4 text-yellow">Your dedication, hard work, and commitment to excellence have not gone unnoticed.</p>
                                                <p class="text-center mb-4 text-yellow">We are grateful for your service and look forward to your continued success.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="certificate-footer">
                                        <p class="text-center mb-4 text-yellow">Date: <span id="date-2"></span></p>
                                        <p class="text-center mb-4 text-yellow">Signature: ______________________________</p>
                                        <button class="btn btn-primary mb-3 p-2" id="download-certificate-2">Download Certificate</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Certificate 3 -->
                            <div class="col-md-4">
                                <div class="certificate bg-dark text-white">
                                    <div class="certificate-header">
                                        <h2 class="text-center mb-4 text-yellow">Certificate of Recognition</h2>
                                    </div>
                                    <div class="certificate-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <img src="../lennon3.jpg" alt="Placeholder for Employee Picture" class="img-fluid rounded-circle">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 class="text-center mb-4 text-yellow" id="employee-name-3">John Lennon D. Aguilor</h3>
                                                <p class="text-center mb-4 text-yellow" id="employee-role-3">Sales Representative</p>
                                                <p class="text-center mb-4 text-yellow" id="employee-department-3">Sales Department</p>
                                                <p class="text-center mb-4 text-yellow">In recognition of outstanding contributions to the company.</p>
                                                <p class="text-center mb-4 text-yellow">Your dedication, hard work, and commitment to excellence have not gone unnoticed.</p>
                                                <p class="text-center mb-4 text-yellow">We are grateful for your service and look forward to your continued success.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="certificate-footer">
                                        <p class="text-center mb-4 text-yellow">Date: <span id="date-3"></span></p>
                                        <p class="text-center mb-4 text-yellow">Signature: ______________________________</p>
                                        <button class="btn btn-primary mb-3 p-2" id="download-certificate-3">Download Certificate</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </div>

<!-- Bootstrap and jsPDF -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script>
       // Get the current date
   const currentDate = new Date().toLocaleDateString();

// Set the date for each certificate
document.getElementById('date-1').innerHTML = currentDate;
document.getElementById('date-2').innerHTML = currentDate;
document.getElementById('date-3').innerHTML = currentDate;

// Include jsPDF
const { jsPDF } = window.jspdf;

// Function to convert image to base64
function getBase64Image(img) {
    const canvas = document.createElement("canvas");
    canvas.width = img.width;
    canvas.height = img.height;
    const ctx = canvas.getContext("2d");
    ctx.drawImage(img, 0, 0);
    return canvas.toDataURL("image/jpeg");
}

// Function to create a PDF
function generatePDF(employeeName, employeeRole, employeeDepartment, date, imgSrc) {
    const pdf = new jsPDF();
    const img = new Image();
    img.src = imgSrc;

    img.onload = function() {
        const imgData = getBase64Image(img);
        pdf.addImage(imgData, 'JPEG', 75, 10, 60, 60); // Centered and resized image

        pdf.setFontSize(20);
        pdf.text("Certificate of Recognition", 105, 85, { align: "center" });
        pdf.setFontSize(12);
        pdf.text(`Employee Name: ${employeeName}`, 20, 100);
        pdf.text(`Role: ${employeeRole}`, 20, 110);
        pdf.text(`Department: ${employeeDepartment}`, 20, 120);
        pdf.text(`Date: ${date}`, 20, 130);
        pdf.text("In recognition of outstanding contributions to the company.", 20, 150);
        pdf.text("Your dedication, hard work, and commitment to excellence have not gone unnoticed.", 20, 160);
        pdf.text("We are grateful for your service and look forward to your continued success.", 20, 170);
        pdf.save(`${employeeName}_Certificate.pdf`);
    };
}

// Add event listeners for the download buttons
document.querySelectorAll('[id^="download-certificate-"]').forEach(button => {
    button.addEventListener('click', function() {
        const employeeIndex = this.id.split('-').pop();
        const employeeName = document.getElementById(`employee-name-${employeeIndex}`).textContent;
        const employeeRole = document.getElementById(`employee-role-${employeeIndex}`).textContent;
        const employeeDepartment = document.getElementById(`employee-department-${employeeIndex}`).textContent;
        const date = document.getElementById(`date-${employeeIndex}`).textContent;

        // Set image source based on employee index
        let imgSrc;
        if (employeeIndex === '1') {
            imgSrc = '../lennon1.jpg'; // Lennon Aguilor
        } else if (employeeIndex === '2') {
            imgSrc = '../lennon2.jpg'; // Steffano Dizo
        } else if (employeeIndex === '3') {
            imgSrc = '../lennon3.jpg'; // Wendel Ureta
        }

        generatePDF(employeeName, employeeRole, employeeDepartment, date, imgSrc);
    });
});
</script>
</body>
</html>
