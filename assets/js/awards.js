loadConfettiPreset(tsParticles);

let confettiContainer;

const partyBtn = document.getElementById("party");

tsParticles
	.load("tsparticles", {
		particles: {
			shape: {
				type: "character",
				character: {
					value: ["🟥", "🟨", "🟩", "🟦"],
				},
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
		startCount: 200,
		position: {
			x: px,
			y: py,
		},
		rate: {
			delay: dx,
			quantity: qx,
		},
		life: {
			duration: 0,
			count: 3,
		},
	});
}

function party(target) {
	setTimeout(() => {
		emitter(confettiContainer, 10, 95);
	}, 100);
	setTimeout(() => {
		emitter(confettiContainer, 50, 95);
	}, 200);
	setTimeout(() => {
		emitter(confettiContainer, 90, 95);
	}, 200);
}

partyBtn.addEventListener("click", party);	
