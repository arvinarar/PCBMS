const weekday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
const monthNames = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
];

function setDateTime() {
    var d = new Date();
    var day = weekday[d.getDay()] + " ";
    var date = d.getDate() + dayLabeler(d.getDate()) + " ";
    var month = monthNames[d.getMonth()] + " ";
    var year = d.getFullYear() + " ";

    var hour = (d.getHours() == 0) ? 12 : (d.getHours() > 12) ? d.getHours() - 12 : d.getHours();
    var minute = (d.getMinutes() < 10) ? "0" + d.getMinutes() : d.getMinutes();
    var second = (d.getSeconds() < 10) ? "0" + d.getSeconds() : d.getSeconds();
    var timeOfDay = (d.getHours() < 12) ? " AM" : " PM";
    
    var time = hour + ":" + minute + ":" + second + timeOfDay;
    return day + date + "of " + month + year + time;
}

function dayLabeler(day) {
    if (day == 1) return "st";
    else if (day == 2) return "nd";
    else if (day == 3) return "rd";
    else return "th";
}

setInterval(function () {
    var currentTime = setDateTime();
    document.getElementById("timer").innerHTML = currentTime;
}, 1000);