// document.addEventListener("DOMContentLoaded", function () {
//     const tabButtons = document.querySelectorAll(".tablinks");
//     const tabContents = document.querySelectorAll(".tabcontent");
//     const btnSemua = document.querySelector(".btnsemua");
//     tabButtons.forEach((button) => {
//         button.addEventListener("click", function () {
//             const tabNama = this.getAttribute("data-tab");
//             tabContents.forEach((tab) => {
//                 if (tabNama === "semua") {
//                     tab.style.display = "block";
//                 } else if (tab.classList.contains("tab" + tabNama)) {
//                     tab.style.display = "block";
//                 } else {
//                     tab.style.display = "none";
//                 }
//             });

//             tabButtons.forEach((btn) => {
//                 btn.classList.remove("active");
//             });
//             this.classList.add("active");
//         });
//     });
// });
