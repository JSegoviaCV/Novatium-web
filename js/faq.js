  // Selecciona todos los botones de las preguntas
                                const faqQuestions = document.querySelectorAll('.faq-question');

                                faqQuestions.forEach(button => {
                                    button.addEventListener('click', () => {
                                        const answer = button.nextElementSibling;
                                        const icon = button.querySelector('.faq-icon');

                                        // 1. Verifica si el botón estaba activo ANTES del clic
                                        const wasOpen = button.classList.contains('active');

                                        // 2. Cierra todos los demás y resetea sus iconos a '+'
                                        faqQuestions.forEach(otherButton => {
                                            const otherAnswer = otherButton.nextElementSibling;
                                            const otherIcon = otherButton.querySelector('.faq-icon');

                                            // Asegura que todos los demás estén cerrados y tengan icono '+'
                                            otherAnswer.classList.remove('open');
                                            otherButton.classList.remove('active');
                                            otherIcon.textContent = '+';
                                        });

                                        // 3. Si el botón no estaba abierto originalmente (es decir, se debe abrir ahora)
                                        if (!wasOpen) {
                                            // Abre el panel actual
                                            answer.classList.add('open');
                                            // Activa el botón actual
                                            button.classList.add('active');
                                            // Cambia el icono a menos
                                            icon.textContent = '–';
                                        }
                                        // Nota: Si 'wasOpen' era true, el paso 2 ya cerró y reseteó este botón.
                                    });
                                });