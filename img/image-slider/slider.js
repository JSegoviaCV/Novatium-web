// 1. Verificación de Elementos (Mejor Práctica)
const sliderControls = document.querySelector(".slider-controls");

// Si el contenedor principal no existe, detenemos la ejecución para evitar errores
if (!sliderControls) {
  console.error("No se encontró el contenedor '.slider-controls'. Deteniendo script.");
  // Si estuviera dentro de una función, usaríamos 'return'.
}

// Inicializamos con un array vacío si no se encuentran los tabs
const sliderTabs = sliderControls?.querySelectorAll(".slider-tab") || [];
const sliderIndicator = sliderControls?.querySelector(".slider-indicator");

// ----------------------------------------------------------------------
// ## Función de Actualización del Indicador
// Usamos solo el 'index' para obtener el tab, haciendo la función más flexible
const updateIndicator = (index) => {
  // Salimos si faltan elementos críticos para evitar el TypeError
  if (!sliderTabs.length || !sliderIndicator) {
    return;
  }
  
  const tab = sliderTabs[index];

  // 1. Quitar 'current' al elemento que lo tiene actualmente
  const currentTab = sliderControls.querySelector(".slider-tab.current");
  if (currentTab) {
      currentTab.classList.remove("current");
  }

  // 2. Asignar 'current' al nuevo tab activo
  tab.classList.add("current");

  // 3. Posicionar el indicador (usamos clientWidth y offsetLeft para precisión)
  const controlWidth = sliderControls.clientWidth;
  const tabWidth = tab.offsetWidth;

  // Ajustar la posición X para que se alinee (ajusta el '-20' si es el margen)
  sliderIndicator.style.transform = `translateX(${tab.offsetLeft - 20}px)`;
  sliderIndicator.style.width = `${tabWidth}px`;

  // 4. Calcular scroll y desplazar al centro
  const scrollLeft = tab.offsetLeft - (controlWidth / 2) + (tabWidth / 2);
  sliderControls.scrollTo({ 
    left: scrollLeft, 
    behavior: "smooth" 
  });
}

// ----------------------------------------------------------------------
// ## Inicialización de Swiper
const swiper = new Swiper(".slider-container", {
  // Mantenemos 'fade' para el efecto de "fusión" (crossfade)
  effect: "fade", 
  
  // La velocidad de la transición (fade). 
  // ¡6500ms es muy largo! Lo bajamos, pero lo dejamos lento (ej. 1500ms)
  // Si quieres un fade MUY lento, ajústalo.
  speed: 4500, // Duración de 1.5 segundos para la transición
  
  autoplay: { 
    // Este es el tiempo que espera ANTES de pasar al siguiente slide.
    delay: 6000, // Espera 4 segundos antes de iniciar la siguiente transición.
    disableOnInteraction: false, 
  },
  
  navigation: {
    prevEl: "#slide-prev",
    nextEl: "#slide-next",
  },
  
  // Eventos para sincronizar
  on: {
    // Al finalizar la transición, actualizamos el indicador
    slideChangeTransitionEnd: function() {
      updateIndicator(this.activeIndex);
    },
    // Recalculamos el indicador al cambiar el tamaño de la ventana
    resize: function() {
        updateIndicator(this.activeIndex);
    }
  },
});

// ----------------------------------------------------------------------
// ## Listeners y Llamada Inicial

// 1. Manejar el clic en las pestañas
sliderTabs.forEach((tab, index) => {
  tab.addEventListener("click", () => {
    // Solo deslizamos el Swiper; el evento 'slideChangeTransitionEnd' se encarga de actualizar el indicador.
    swiper.slideTo(index); 
  });
});

// 2. Llamada inicial
// Usamos un pequeño delay para asegurar que todas las dimensiones (ancho, posición) sean correctas al cargarse el CSS.
setTimeout(() => {
    // Si no hay tabs, no intentamos actualizar
    if (sliderTabs.length > 0) {
        updateIndicator(0);
    }
}, 50);

// Se elimina el listener de 'resize' de window, ya que el evento 'resize' de Swiper lo maneja.