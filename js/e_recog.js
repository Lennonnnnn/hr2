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