function updateStatus(taskNr, status){
    window.location.href = "index.php?taskNr=" + taskNr + "&status=" + status
}
function getTaskNr(){
    var TaskNr = document.getElementById("RowTaskNr").Value
}
function Gruss(){
    var today = new Date();
    var hourNow = today.getHours();
    var greeting;

    if (hourNow > 18) {
        greeting = 'Guten Abend! Schauen Sie sich um!';
    } else if (hourNow > 12) {
        greeting = 'Guten Tag! Schauen Sie sich um!';
    } else if (hourNow > 0) {
        greeting = 'Guten Morgen! Schauen Sie sich um!';
    } else {
        greeting = 'Willkommen! Schauen Sie sich um!';
    }
}