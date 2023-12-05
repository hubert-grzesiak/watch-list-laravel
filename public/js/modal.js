// const dialog = document.querySelector("dialog");
// const showButton = document.querySelector("dialog + button");
// const closeButton = document.querySelector("dialog button");
// const body = document.body;
// const overlay = document.querySelector('.myOverlay'); // Assuming this is your overlay class
//
// // "Show the dialog" button opens the dialog modally
// showButton.addEventListener("click", () => {
//     dialog.showModal();
//     body.style.overflow = 'hidden'; // Disable scrolling
// });
//
// // Clicking on the overlay closes the dialog
// overlay.addEventListener('click', (event) => {
//     // Check if the click was on the overlay and not on the dialog itself
//     if (event.target === overlay) {
//         dialog.close();
//         body.style.overflow = ''; // Re-enable scrolling
//     }
// });
//
// // "Close" button closes the dialog
// closeButton.addEventListener("click", () => {
//     dialog.close();
//     body.style.overflow = ''; // Re-enable scrolling
// });
