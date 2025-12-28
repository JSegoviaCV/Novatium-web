// Variable para obtener el elemento preloader
const preloader = document.getElementById('preloader');

// Variables para rastrear el estado de carga y el tiempo
let pageLoaded = false;
let minimumTimePassed = false;

// 1. EVENTO: Cuando toda la página ha cargado
window.addEventListener('load', function() {
    pageLoaded = true;
    checkAndHidePreloader();
});

// 2. TEMPORIZADOR: El tiempo mínimo que debe durar (7000ms = 7 segundos)
setTimeout(function() {
    minimumTimePassed = true;
    checkAndHidePreloader();
}, 2000); 

// 3. FUNCIÓN: Comprueba las dos condiciones antes de ocultar
function checkAndHidePreloader() {
    // Si la página ha cargado Y han pasado los 7 segundos...
    if (pageLoaded && minimumTimePassed) {
        
        // Oculta el preloader
        if (preloader) {
            preloader.classList.add('hidden');
        }
        
        // Opcional: Eliminar el elemento del DOM después de que termine la transición
        preloader.addEventListener('transitionend', function() {
            if (preloader.classList.contains('hidden')) {
                preloader.style.display = 'none';
            }
        });
    }
}




document.addEventListener('DOMContentLoaded', () => {
    const counters = document.querySelectorAll('.stat-number');
    const factsSection = document.querySelector('.facts-section');
    let animationStarted = false;

    // --- FUNCIÓN DE ANIMACIÓN DEL CONTADOR ---
    const runCounter = (counter) => {
        const target = parseInt(counter.getAttribute('data-target'));
        // Obtiene el sufijo/prefijo final (+ o %) del contenido HTML estático (el <span>)
        const finalContent = counter.querySelector('span').textContent;
        const prefix = finalContent.includes('+') ? '+' : '';
        const suffix = finalContent.includes('%') ? '%' : '';

        const duration = 2000; // 2 segundos
        const stepTime = Math.floor(duration / 60); 
        const increment = Math.ceil(target / (duration / stepTime)); 
        let currentCount = 0; 

        const timer = setInterval(() => {
            currentCount += increment;

            if (currentCount >= target) {
                currentCount = target;
                clearInterval(timer);
                
                // Muestra el número final con el prefijo (+) y/o sufijo (%)
                counter.textContent = prefix + currentCount + suffix;
            } else {
                // Durante el conteo, solo muestra el número
                counter.textContent = currentCount;
            }
        }, stepTime);
    };

    // --- CONFIGURACIÓN DEL OBSERVER ---
    const observerOptions = {
        root: null, 
        rootMargin: '0px',
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !animationStarted) {
                counters.forEach(counter => {
                    // Prepara el contador con el valor inicial '0' y lanza la animación
                    counter.textContent = '0'; 
                    runCounter(counter);
                });
                
                animationStarted = true;
                observer.unobserve(factsSection); 
            }
        });
    }, observerOptions);

    if (factsSection) {
        observer.observe(factsSection);
    }
});