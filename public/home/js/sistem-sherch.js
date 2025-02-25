// ================== Qr Code =======================//

$("#qrcode").empty();
// const formURL = "https://perpus.andri.biz.id/pengujung";
const baseURL = window.location.origin;
const formURL = `${baseURL}/pengujung`;

const qrcode = new QRCode(document.getElementById("qrcode"), {
    text: formURL,
    width: 350,
    height: 350,
    colorDark: "#ffffff",
    colorLight: "transparent",
    correctLevel: QRCode.CorrectLevel.H,
});
// ================== End Qr Code =======================//
