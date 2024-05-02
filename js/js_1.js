document.addEventListener('DOMContentLoaded', function () {
    generateStars();
});

// Generování hvězd
function generateStars() {
    const stars = document.getElementById('stars');

    for (let i = 0; i < 50; i++) {
        const star = document.createElement('div');
        star.className = 'star';
        stars.appendChild(star);

        // Náhodné pozice pro každou hvězdu
        const randomX = Math.random() * window.innerWidth;
        const randomY = Math.random() * window.innerHeight;
        star.style.left = `${randomX}px`;
        star.style.top = `${randomY}px`;

        // Náhodná rychlost a úhel pro každou hvězdu
        const speed = Math.random() * 15 + 7.5;
        const angle = Math.random() * 45; // Náhodný úhel do 45 stupňů
        star.dataset.speed = speed;
        star.dataset.angle = angle;

        // Nastavení animace a transformace pro každou hvězdu
        star.style.animation = `starFall ${speed}s linear infinite`;
        star.style.transform = `translateY(-50%) rotate(${angle}deg)`;
    }
}