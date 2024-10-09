// Get the current date
const currentDate = new Date().toLocaleDateString();

// Set the date for each certificate
document.getElementById('date-1').innerHTML = currentDate;
document.getElementById('date-2').innerHTML = currentDate;
document.getElementById('date-3').innerHTML = currentDate;

// Include jsPDF
const { jsPDF } = window.jspdf;

// Function to load image as Base64
function loadImageAsBase64() {
    return new Promise((resolve, reject) => {
        const img = new Image();
        img.crossOrigin = "Anonymous"; // Necessary for CORS
        img.src = '../third.png'; // Set the source to third.png

        img.onload = function() {
            const canvas = document.createElement('canvas');
            canvas.width = img.width;
            canvas.height = img.height;
            const ctx = canvas.getContext('2d');
            ctx.drawImage(img, 0, 0);
            resolve(canvas.toDataURL('third.png')); // Resolve with the Base64 data
        };
        img.onerror = reject;
    });
}

// Function to create a PDF
async function generatePDF(employeeName, employeeRole, employeeDepartment, date) {
    const pdf = new jsPDF();

    try {
        // Load the background image as Base64
        const backgroundImage = await loadImageAsBase64(); // Use third.png
        pdf.addImage(backgroundImage, 'PNG', 10, 10, 190, 50); // Add background image to the PDF

        // Add the certificate title and details
        pdf.setFontSize(20);
        pdf.text("Certificate of Recognition", 105, 70, { align: "center" });
        pdf.setFontSize(12);
        pdf.text(`Employee Name: ${employeeName}`, 20, 90);
        pdf.text(`Role: ${employeeRole}`, 20, 100);
        pdf.text(`Department: ${employeeDepartment}`, 20, 110);
        pdf.text(`Date: ${date}`, 20, 120);
        pdf.text("In recognition of outstanding contributions to the company.", 20, 140);
        pdf.text("Your dedication, hard work, and commitment to excellence have not gone unnoticed.", 20, 150);
        pdf.text("We are grateful for your service and look forward to your continued success.", 20, 160);

        // Load the employee image as Base64 (optional, if using same image)
        const employeeImage = await loadImageAsBase64(); // Use third.png again
        pdf.addImage(employeeImage, 'PNG', 75, 170, 60, 60); // Add employee image to the PDF

        // Save the PDF
        pdf.save(`${employeeName}_Certificate.pdf`);
    } catch (error) {
        console.error('Image failed to load:', error);
        // Optionally, save the PDF without images or notify the user
        pdf.save(`${employeeName}_Certificate.pdf`);
    }
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
