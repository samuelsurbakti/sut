<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<div class="cb_root">
    <canvas id="confetti-canvas"></canvas>

    <div id="balloon-container" class="cb_balloons">
    </div>
</div>

@script
    <script>
        $(document).ready(function () {
            const balloonContainer = document.getElementById("balloon-container");

            function random(num) {
                return Math.floor(Math.random() * num);
            }

            function getRandomStyles() {
                var r = random(255);
                var g = random(255);
                var b = random(255);
                var mt = random(200);
                var ml = random(50);
                var dur = random(5) + 5;
                return `
            background-color: rgba(${r},${g},${b},0.7);
            color: rgba(${r},${g},${b},0.7);
            box-shadow: inset -7px -3px 10px rgba(${r - 10},${g - 10},${b - 10},0.7);
            margin: ${mt}px 0 0 ${ml}px;
            animation: float ${dur}s ease-in infinite
            `;
            }

            function createBalloons(num) {
                for (var i = num; i > 0; i--) {
                    var balloon = document.createElement("div");
                    balloon.className = "balloon";
                    balloon.style.cssText = getRandomStyles();
                    balloonContainer.append(balloon);
                }
            }

            function removeBalloons() {
                balloonContainer.style.opacity = 0;
                setTimeout(() => {
                    balloonContainer.remove()
                }, 500)
            }

            window.addEventListener("click", () => {
                removeBalloons();
            });

            // Confetti
            // Rainbow palette
            const RAINBOW = [
                "#ef4444",
                "#f97316",
                "#facc15",
                "#22c55e",
                "#3b82f6",
                "#8b5cf6",
                "#ec4899"
            ];

            // State
            let rafId = null;
            let endAt = 0;

            // Reduced motion fallback
            const prefersReducedMotion = window.matchMedia(
                "(prefers-reduced-motion: reduce)"
            ).matches;

            // Create one frame of rainbow rain from both sides
            function rainFrame(intensity) {
                // Each side emits a small packet per frame
                confetti({
                    particleCount: intensity * 5,
                    angle: 60,
                    spread: 55,
                    origin: {
                        x: 0,
                        y: 0
                    },
                    colors: RAINBOW,
                    startVelocity: 35
                });
                confetti({
                    particleCount: intensity * 5,
                    angle: 120,
                    spread: 55,
                    origin: {
                        x: 1,
                        y: 0
                    },
                    colors: RAINBOW,
                    startVelocity: 35
                });
            }

            // Loop with cancel
            function loop() {
                const now = Date.now();
                if (now >= endAt) {
                    stopRain(true);
                    return;
                }
                const intensity = parseInt(5, 10);
                rainFrame(intensity);
                rafId = requestAnimationFrame(loop);
            }

            function startRain() {
                if (rafId !== null) return; // already running

                const seconds = Math.max(1, parseInt(4, 10) || 1);

                // Reduced motion: do a single gentle burst instead of a continuous stream
                if (prefersReducedMotion) {
                    confetti({
                        particleCount: 100,
                        spread: 70,
                        origin: {
                            y: 0.1
                        },
                        colors: RAINBOW
                    });
                    return;
                }

                // Lock UI
                endAt = Date.now() + seconds * 1000;
                rafId = requestAnimationFrame(loop);
            }

            function stopRain(fromLoop = false) {
                if (rafId !== null) {
                    cancelAnimationFrame(rafId);
                    rafId = null;
                }
            }

            // Button bindings
            // startBtn.addEventListener("click", startRain);
            // stopBtn.addEventListener("click", () => stopRain(false));

            // Safety: stop when tab is hidden
            document.addEventListener("visibilitychange", () => {
                if (document.hidden) stopRain(false);
            });

            // Optional: adjust origin if panel moves (not required for top streams)
            // Kept for parity with other demos
            window.addEventListener("resize", () => {
                // No-op for rainbow; origins are screen edges
            });

            setTimeout(() => {
                startRain();
                createBalloons(30);

                setTimeout(() => {
                    removeBalloons();
                    setTimeout(() => {
                        Livewire.dispatch('set_step', { step: 'story' });
                    }, 500);
                }, 5000);
            }, 100);
        });
    </script>
@endscript
