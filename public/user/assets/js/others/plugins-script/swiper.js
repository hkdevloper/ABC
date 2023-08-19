"use strict";
const swiper = new Swiper(".swiper-1", {
	// Optional parameters
	direction: "horizontal",
	loop: false,
	slidesPerView: 1,
	spaceBetween: 30,
	// If we need pagination

	// Navigation arrows
	navigation: {
		nextEl: ".swiper-button-next",
		prevEl: ".swiper-button-prev",
	},

	// And if we need scrollbar
});
