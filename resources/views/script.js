function updateTime() {
    const now = new Date();
    const formattedTime = now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', second: '2-digit' });
    document.getElementById('currentTime').innerText = formattedTime;
}

// Update the time every second
setInterval(updateTime, 1000);

// Set initial time
updateTime();