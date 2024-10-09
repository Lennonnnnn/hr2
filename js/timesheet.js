const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
const context = canvas.getContext('2d');
const outputMessage = document.getElementById('outputMessage');
const outputData = document.getElementById('outputData');
const recordsTable = document.getElementById('recordsTable').getElementsByTagName('tbody')[0];

let employeeId = null; // store the employee ID
let timeIn = null; // store the time in timestamp

// Use the getUserMedia API to stream the video feed from the camera
navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' } })
    .then(stream => {
        video.srcObject = stream;
        video.setAttribute('playsinline', true); // required to tell iOS safari we don't want fullscreen
        requestAnimationFrame(tick);
    })
    .catch(err => {
        console.error('Error accessing camera: ', err);
    });

function tick() {
    if (video.readyState === video.HAVE_ENOUGH_DATA) {
        canvas.height = video.videoHeight;
        canvas.width = video.videoWidth;
        context.drawImage(video, 0, 0, canvas.width, canvas.height);
        const imageData = context.getImageData(0, 0, canvas.width, canvas.height);
        const code = jsQR(imageData.data, imageData.width, imageData.height, {
            inversionAttempts: 'dontInvert',
        });
        if (code) {
            outputMessage.hidden = true;
            outputData.innerText = `Employee ID: ${code.data}`;
            if (!employeeId) {
                // first scan, record time in
                employeeId = code.data;
                timeIn = new Date();
                recordTime(employeeId, 'Time In');
            } else if (employeeId === code.data) {
                // same employee ID, record time out
                const timeOut = new Date();
                const timeSpent = timeOut - timeIn;
                recordTime(employeeId, 'Time Out', timeSpent);
                employeeId = null; // reset employee ID
                timeIn = null; // reset time in timestamp
            }
        } else {
            outputMessage.hidden = false;
            outputData.innerText = '';
        }
    }
    requestAnimationFrame(tick);
}

function recordTime(employeeId, action, timeSpent) {
    const now = new Date();
    const row = recordsTable.insertRow();
    const employeeIdCell = row.insertCell(0);
    const actionCell = row.insertCell(1);
    const timestampCell = row.insertCell(2);

    employeeIdCell.textContent = employeeId;
    actionCell.textContent = action;
    timestampCell.textContent = now.toLocaleString();
    if (timeSpent) {
        const timeSpentCell = row.insertCell(3);
        timeSpentCell.textContent = `Time spent: ${formatTimeSpent(timeSpent)}`;
    }
}

function formatTimeSpent(timeSpent) {
    const hours = Math.floor(timeSpent / 3600000);
    const minutes = Math.floor((timeSpent % 3600000) / 60000);
    const seconds = Math.floor((timeSpent % 60000) / 1000);
    return `${hours} hours, ${minutes} minutes, ${seconds} seconds`;
}