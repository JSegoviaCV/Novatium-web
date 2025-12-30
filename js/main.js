e()(() => {
    var t, n;
    e()(".animate").length &&
        ((t = (t) => {
            var e = document.querySelectorAll(t);
            for (let t = 0; t < e.length; t++) n(e[t]) && e[t].classList.add("active");
        }),
        (n = (t) => t.getBoundingClientRect().top <= (window.innerHeight / 8) * 6),
        t(".animate"),
        window.addEventListener("scroll", function () {
            t(".animate");
        })),
        e()(".article-wrapper article").length &&
        (function () {
            let t = window.innerWidth,
                e = !1,
                n = document.getElementById("articleTask"),
                i = document.getElementById("articleSidebar"),
                r = n.offsetHeight,
                o = i.offsetHeight;
            if (null !== n && null !== i) {
                let n = Qi.matchMedia();
                n.add("(min-width: 992px)", () => {
                    r > o &&
                        window.addEventListener("load", () => {
                            e = Qi.timeline({
                                scrollTrigger: {
                                    trigger: "#stickySidebarContent",
                                    pin: !0,
                                    scrub: !0,
                                    start: () => "top 90",
                                    end: () => "+=" + (r - o - 90),
                                    invalidateOnRefresh: !0,
                                },
                            });
                        });
                }),
                    n.add("(max-width: 991px)", () => {}),
                    window.addEventListener("resize", (n) => {
                        (t = window.innerWidth),
                            t > 992
                                ? ((r = document.getElementById("articleTask").offsetHeight),
                                    (o = document.getElementById("articleSidebar").offsetHeight),
                                    sa.killAll(),
                                    (e = Qi.timeline({
                                        scrollTrigger: {
                                            trigger: "#stickySidebarContent",
                                            pin: !0,
                                            scrub: !0,
                                            start: () => "top 90",
                                            end: () => "+=" + (r - o - 90),
                                            invalidateOnRefresh: !0,
                                        },
                                    })))
                                : sa.disable();
                    }),
                    (window.requestAnimFrame =
                        window.requestAnimationFrame ||
                        window.webkitRequestAnimationFrame ||
                        window.mozRequestAnimationFrame ||
                        function (t) {
                            window.setTimeout(t, 1e3 / 60);
                        });
            }
        })(),
        e()(".object-fit-img").length && a()(),
        e()(".location-contact").length &&
        (function () {
            let t = document.querySelectorAll(".location-contact .cta");
            for (let n = 0; n < t.length; n++)
                t[n].addEventListener("click", function (i) {
                    i.preventDefault(),
                        i.stopPropagation(),
                        navigator.clipboard.writeText(t[n].getAttribute("href")),
                        e("Contact copied to clipboard", "success", t[n].parentElement);
                });
            const e = (t, e, n) => {
                const i = document.createElement("div");
                (i.innerHTML = [
                    '<div class="alert alert-' + e + ' alert-dismissible mt-2" role="alert">',
                    '   <div>' + t + '</div>',
                    '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
                    "</div>",
                ].join("")),
                    n.append(i);
            };
        })(),
        new o(
            ".navbar-list.level-0 > .navbar-list-item > .navbar-link.has-children:not(.open-on-click)",
            ".navbar-list.level-1 > .navbar-list-item > .navbar-link",
            ".navbar-list.level-0 > .navbar-list-item > .navbar-link:not(.has-children)",
            ".navbar-list.level-0 > .navbar-list-item > .navbar-link.open-on-click"
        ).init();
    const i = document.getElementById("navbarLevel0Collapse");
    i &&
        (i.addEventListener("show.bs.offcanvas", function () {
            e()(".navbar-toggler").removeClass("collapsed");
        }),
        i.addEventListener("hide.bs.offcanvas", function () {
            e()(".navbar-toggler").addClass("collapsed");
        })),
        e()(".country-selector").click(() => {
            setTimeout(() => {
                e()("#inputCountry").focus();
            }, 500);
        }),
        u()(".date-picker.has-default-date", { mode: "range", dateFormat: "d-m-y" }),
        u()(".date-picker.has-american-date", { mode: "range", dateFormat: "m-d-y" }),
        e()(".scroll-progress").length &&
        e()(window).scroll(function () {
            var t =
                ((document.body.scrollTop || document.documentElement.scrollTop) /
                    (document.documentElement.scrollHeight -
                        document.documentElement.clientHeight)) *
                100;
            e()(".scroll-progress").width(t + "%");
        });
});
// 1. Espera a que todo el contenido HTML se cargue
document.addEventListener('DOMContentLoaded', (event) => {

    // 2. Ejecuta el código *solo después* de que el HTML esté listo
    const year = new Date().getFullYear();
    const yearElement = document.getElementById('current-year');

    // 3. Ya que el elemento existe, ahora se puede actualizar su contenido
    if (yearElement) {
        yearElement.textContent = year;
    }
});
