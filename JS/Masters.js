//modal close function
$(".addUpdateModal").on("hidden.bs.modal", function() {
    $(".UpdateForm").hide();
    $(".AddForm").show();
    $(".UpdateForm")[0].reset();
    $(".AddForm")[0].reset();
});



// //function to check if json
// function TestJson(json) {
//     var Untrimmed = json;
//     var trimmed = Untrimmed.replace(/\s+/g, '');

//     if (typeof trimmed !== "string") {
//         return false;
//     }
//     try {
//         var NewJson = JSON.parse(trimmed);
//         return typeof NewJson === "object";
//     } catch (error) {
//         return false;
//     }
// }

//function to check if json
function TestJson(json) {
    var Untrimmed = json;
    //var trimmed = Untrimmed.replace(/\s+/g, '');

    if (typeof Untrimmed !== "string") {
        return false;
    } else {
        return true;
    }
}

// Get Current Time In yyyy-mm-dd h:i:s Format
function getCurrentTime(){

    const currentDate = new Date();
    const year = currentDate.getFullYear();
    const month = String(currentDate.getMonth() + 1).padStart(2, '0');
    const day = String(currentDate.getDate()).padStart(2, '0');
    const hours = String(currentDate.getHours()).padStart(2, '0');
    const minutes = String(currentDate.getMinutes()).padStart(2, '0');
    const seconds = String(currentDate.getSeconds()).padStart(2, '0');

    const formattedDate = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
    return formattedDate;
}