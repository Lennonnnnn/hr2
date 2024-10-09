// Get the current date
const currentDate = new Date().toLocaleDateString();

// Set the date for each certificate
document.getElementById('date-1').innerHTML = currentDate;
document.getElementById('date-2').innerHTML = currentDate;
document.getElementById('date-3').innerHTML = currentDate;

// Include jsPDF
const { jsPDF } = window.jspdf;

// Function to create a PDF
function generatePDF(employeeName, employeeRole, employeeDepartment, date) {
    const pdf = new jsPDF();
    pdf.setFontSize(20);
    pdf.text("Certificate of Recognition", 105, 30, { align: "center" });
    pdf.setFontSize(12);
    pdf.text(`Employee Name: ${employeeName}`, 20, 50);
    pdf.text(`Role: ${employeeRole}`, 20, 60);
    pdf.text(`Department: ${employeeDepartment}`, 20, 70);
    pdf.text(`Date: ${date}`, 20, 80);
    pdf.text("In recognition of outstanding contributions to the company.", 20, 100);
    pdf.text("Your dedication, hard work, and commitment to excellence have not gone unnoticed.", 20, 110);
    pdf.text("We are grateful for your service and look forward to your continued success.", 20, 120);
    pdf.save(`${employeeName}_Certificate.pdf`);
}

// Add event listeners for the download buttons
document.querySelectorAll('[id^="download-certificate-"]').forEach(button => {
    button.addEventListener('click', function() {
        const employeeIndex = this.id.split('-').pop();
        const employeeName = document.getElementById(`employee-name-${employeeIndex}`).textContent;
        const employeeRole = document.getElementById(`employee-role-${employeeIndex}`).textContent;
        const employeeDepartment = document.getElementById(`employee-department-${employeeIndex}`).textContent;
        const date = document.getElementById(`date-${employeeIndex}`).textContent;
        generatePDF(employeeName, employeeRole, employeeDepartment, date);
    });
});