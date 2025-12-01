$(document).ready(function () {
// ========== MINI CONFETTI ENGINE (versi ringan canvas-confetti) ==========
    (function() {
        var confetti = window.confetti = function(opts) {
            var defaults = {
                particleCount: 150,
                spread: 70,
                origin: { y: 0.6 }
            };
            opts = Object.assign({}, defaults, opts || {});
            window._confettiLib(opts);
        };

        // Very small implementation using <canvas>
        window._confettiLib = function(opts) {
            var canvas = document.getElementById('confetti-canvas');
            var ctx = canvas.getContext('2d');
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;

            var particles = [];
            for (let i = 0; i < opts.particleCount; i++) {
                particles.push({
                    x: Math.random() * canvas.width,
                    y: Math.random() * canvas.height - canvas.height,
                    c: `hsl(${Math.random() * 360}, 100%, 50%)`,
                    s: Math.random() * 6 + 4,
                    v: Math.random() * 3 + 2
                });
            }

            function render() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);

                particles.forEach(p => {
                    ctx.fillStyle = p.c;
                    ctx.fillRect(p.x, p.y, p.s, p.s);
                    p.y += p.v;
                    if (p.y > canvas.height) p.y = -10;
                });

                requestAnimationFrame(render);
            }

            render();
        };
    })();

    // ========================================================================


    // ========== ANIMASI OTOMATIS KETIKA KOMPONEN DIMUAT ==========

    document.addEventListener("DOMContentLoaded", () => {

        // Jalankan confetti ringan


        // Jalankan balloon (CSS sudah handle, jadi tidak perlu JS)
        // Kita hanya menunggu animasi beberapa detik lalu ke step berikutnya.
        alert('apa');
        setTimeout(() => {
            // Livewire.dispatch('set_step', { step: 'story' });
        }, 6500); // 6.5 detik durasi total

    });


});
