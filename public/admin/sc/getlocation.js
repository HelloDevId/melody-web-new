function getlocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        swal("Wrong!", "Browser Anda Tidak Support", "error");
    }
}

function showPosition(position) {
    $("#lat").val(position.coords.latitude);
    $("#long").val(position.coords.longitude);

    swal("Done", "Lokasi Berhasil Didapatkan", "success");
}

// function getlocationedit() {
//     if (navigator.geolocation) {
//         navigator.geolocation.getCurrentPosition(showPositionedit);
//     } else {
//         swal("Wrong!", "Browser Anda Tidak Support", "error");
//     }
// }

// function showPositionedit(position) {
//     $("#latedit").val(position.coords.latitude);
//     $("#longedit").val(position.coords.longitude);

//     swal("Done", "Lokasi Berhasil Didapatkan", "success");
// }
