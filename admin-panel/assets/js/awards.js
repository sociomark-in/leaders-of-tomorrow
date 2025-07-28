loadConfettiPreset(tsParticles);

let confettiContainer;

const partyBtn = document.getElementById("party");

tsParticles
	.load("tsparticles", {
		particles: {
			color: {
				value: ["#b72026", "#efefef", "#f05c27", "#ffde3f", "#cf8b2c"], // Array of colors
			},
			shape: {
				// type: "character",
				// character: {
				// 	value: ["🟥", "🟨", "🟩", "🟦"],
				// },
				type: ["star"], // Array of shapes
				options: {
					polygon: {
						nb_sides: 5, // For polygon shape
					},
					star: {
						nb_sides: 5, //for star shape
					},
				},
			},
			size: {
				value: {
					min: 1,
					max: 3,
				}, // Size range
			},
		},
		preset: "confetti",
		emitters: [],
	})
	.then((container) => (confettiContainer = container));

function emitter(container, px, py, dx = 0, qx = 0) {
	container.addEmitter({
		size: {
			width: 0,
			height: 0,
		},
		startCount: 300,
		position: {
			x: px,
			y: py,
		},
		rate: {
			delay: dx,
			quantity: qx,
		},
		life: {
			duration: 1000,
			count: 5,
		},
	});
}

function party(target) {
	setTimeout(() => {
		emitter(confettiContainer, 10, 95);
	}, 500);
	setTimeout(() => {
		emitter(confettiContainer, 50, 95);
	}, 1500);
	setTimeout(() => {
		emitter(confettiContainer, 90, 95);
	}, 2000);
	setTimeout(() => {
		emitter(confettiContainer, 35, 95);
	}, 2500);
	setTimeout(() => {
		emitter(confettiContainer, 65, 95);
	}, 2800);
}

$(document).ready(party);

partyBtn.addEventListener("click", party);
