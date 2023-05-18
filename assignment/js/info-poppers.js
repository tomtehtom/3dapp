
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl);
});

// const button = document.querySelector('#button');
// const tooltip = document.querySelector('#tooltip');
// // popperInstance = '';

// // Pass the button, the tooltip, and some options, and Popper will do the
// // magic positioning for you:
// const popperInstance = Popper.createPopper(button, tooltip, {
//     placement: 'top',
//     modifiers: [
//       {
//         name: 'offset',
//         options: {
//           offset: [0, 10], // Customize the offset of the tooltip from the trigger
//         },
//       },
//       {
//         name: 'preventOverflow',
//         options: {
//           boundary: 'window', // Set the boundary for preventing tooltip overflow
//         },
//       },
//       // Additional modifiers...
//     ],
//     strategy: 'absolute', // Set the positioning strategy for the tooltip
//   });


// function show() {
// tooltip.setAttribute('data-show', '');

// // We need to tell Popper to update the tooltip position
// // after we show the tooltip, otherwise it will be incorrect
// popperInstance.update();
// }

// function hide() {
// tooltip.removeAttribute('data-show');
// }

// const showEvents = ['mouseenter', 'focus'];
// const hideEvents = ['mouseleave', 'blur'];

// showEvents.forEach((event) => {
// button.addEventListener(event, show);
// });

// hideEvents.forEach((event) => {
// button.addEventListener(event, hide);
// });


