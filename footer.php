<footer class="footer-section">
    <canvas id="footer-canvas"></canvas>
    <div class="footer-container">

        <!-- Top Grid -->
        <div class="footer-grid">

            <!-- Brand -->
            <div class="footer-brand">
                <p class="footer-title">M-Nagelbeauty</p>
                <p class="footer-subtitle">Nageldesign & Fußpflege</p>

                <p class="footer-text">
                    Mária Feldman<br>
                    Neuendettelsau, Bayern
                </p>
            </div>

            <!-- Navigation -->
            <div class="footer-nav">
                <p class="footer-heading">Navigation</p>

                <nav class="footer-links">
                    <button onclick="scrollToSection('#home')" class="footer-link">Startseite</button>
                    <button onclick="scrollToSection('#services')" class="footer-link">Leistungen</button>
                    <button onclick="scrollToSection('#gallery')" class="footer-link">Galerie</button>
                    <button onclick="scrollToSection('#about')" class="footer-link">Über mich</button>
                    <button onclick="scrollToSection('#contact')" class="footer-link">Kontakt</button>
                </nav>
            </div>

            <!-- Contact -->
            <div class="footer-contact">
                <p class="footer-heading">Kontakt</p>

                <a href="tel:01728560520" class="footer-link">0172 / 856-0520</a>
                <a href="https://wa.me/491728560520" target="_blank" class="footer-link">WhatsApp</a>

                <p class="footer-note">Termine nur nach Vereinbarung</p>
            </div>

        </div>

        <!-- Divider -->
        <div class="footer-divider"></div>

        <!-- Bottom -->
        <div class="footer-bottom">
            <p class="footer-copy">
                © <?php echo date('Y'); ?> M-Nagelbeauty · Alle Rechte vorbehalten
            </p>

            <div class="footer-bottom-links">
                <a href="/impressum" class="footer-bottom-link">Impressum</a>
                <a href="/datenschutz" class="footer-bottom-link">Datenschutz</a>
            </div>
        </div>

    </div>
</footer>

<?php wp_footer(); ?>


<!-- ===========================
     COOKIE BANNER
=========================== -->
<div id="cookie-banner" class="cookie-banner" style="display:none;">
    <div class="cookie-inner">
        <div class="cookie-text">
            <p class="cookie-title">🍪 Diese Website verwendet Cookies</p>
            <p class="cookie-desc">
                Wir nutzen Google Maps zur Darstellung unseres Standorts. Dabei werden Daten an Google übertragen.
                Mit Klick auf "Akzeptieren" stimmen Sie dem zu.
                <a href="/datenschutz" class="cookie-link">Mehr erfahren</a>
            </p>
        </div>
        <div class="cookie-actions">
            <button id="cookie-decline" class="cookie-btn cookie-btn-decline">Ablehnen</button>
            <button id="cookie-accept" class="cookie-btn cookie-btn-accept">Akzeptieren</button>
        </div>
    </div>
</div>

<script>
// ===============================
// NUMBER COUNTER – 10+ Jahre
// ===============================

document.addEventListener("DOMContentLoaded", () => {
    const counter = document.getElementById("experience-counter");
    if (!counter) return;

    let counted = false;

    const observer = new IntersectionObserver(([entry]) => {
        if (entry.isIntersecting && !counted) {
            counted = true;
            let start = 0;
            const target = 10;
            const step = 1800 / target;

            const interval = setInterval(() => {
                start++;
                counter.textContent = start;
                if (start >= target) clearInterval(interval);
            }, step);
        } else if (!entry.isIntersecting) {
            counted = false;
            counter.textContent = "0";
        }
    }, { threshold: 0.5 });

    observer.observe(counter);
});
</script>

<script>
// ===============================
// Smooth Scroll (Fallback ohne Lenis)
// ===============================

function scrollToSection(id) {
    const el = document.querySelector(id);
    if (el) el.scrollIntoView({ behavior: "smooth" });
}

// ===============================
// Mobile Navigation
// ===============================

function toggleMobileMenu() {
    const menu = document.getElementById("mobile-menu");
    const btn = document.querySelector(".nav-mobile-btn");

    menu.classList.toggle("active");
    btn.classList.toggle("open");
}

document.addEventListener("DOMContentLoaded", () => {
    const mobileLinks = document.querySelectorAll("#mobile-menu a");
    mobileLinks.forEach(link => {
        link.addEventListener("click", () => toggleMobileMenu());
    });
});

// ===============================
// Sticky Header
// ===============================

window.addEventListener("scroll", () => {
    const header = document.getElementById("site-header");
    if (window.scrollY > 60) header.classList.add("scrolled");
    else header.classList.remove("scrolled");
});

// ===============================
// Quote Section Animation
// ===============================

document.addEventListener("DOMContentLoaded", () => {
    const section = document.querySelector(".quote-section");
    const quoteMark = document.querySelector(".quote-mark");
    const quoteText = document.querySelector(".quote-text");
    const quoteAuthor = document.querySelector(".quote-author");

    if (!section || !quoteText) return;

    // Jeden Textknoten in einzelne Wörter aufteilen
    function wrapWords(el) {
        const walker = document.createTreeWalker(el, NodeFilter.SHOW_TEXT);
        const textNodes = [];
        let node;
        while (node = walker.nextNode()) {
            if (node.textContent.trim()) textNodes.push(node);
        }
        textNodes.forEach(textNode => {
            const words = textNode.textContent.split(/(\s+)/);
            const fragment = document.createDocumentFragment();
            words.forEach(word => {
                if (word.trim()) {
                    const span = document.createElement("span");
                    span.classList.add("quote-word");
                    span.textContent = word;
                    fragment.appendChild(span);
                } else if (word) {
                    fragment.appendChild(document.createTextNode(" "));
                }
            });
            textNode.parentNode.replaceChild(fragment, textNode);
        });
    }

    wrapWords(quoteText);

    const words = quoteText.querySelectorAll(".quote-word");
    let animated = false;

    const observer = new IntersectionObserver(([entry]) => {
        if (entry.isIntersecting) {
            animated = true;
            if (quoteMark) setTimeout(() => quoteMark.classList.add("visible"), 100);
            words.forEach((word, i) => {
                setTimeout(() => word.classList.add("visible"), 400 + i * 55);
            });
            setTimeout(() => {
                if (quoteAuthor) quoteAuthor.classList.add("visible");
            }, 400 + words.length * 55 + 200);
        } else {
            animated = false;
            if (quoteMark) quoteMark.classList.remove("visible");
            words.forEach(word => word.classList.remove("visible"));
            if (quoteAuthor) quoteAuthor.classList.remove("visible");
        }
    }, { threshold: 0.4 });

    observer.observe(section);
});

// ===============================
// Gallery Header + CTA Animation
// ===============================

document.addEventListener("DOMContentLoaded", () => {
    const header = document.querySelector(".gallery-header");
    const cta = document.querySelector(".gallery-cta");

    if (!header) return;

    const headerObserver = new IntersectionObserver(([entry]) => {
        if (entry.isIntersecting) {
            header.classList.add("visible");
            if (cta) cta.classList.add("visible");
        } else {
            header.classList.remove("visible");
            if (cta) cta.classList.remove("visible");
        }
    }, { threshold: 0.2 });

    headerObserver.observe(header);
});

// ===============================
// Gallery Lightbox
// ===============================

document.addEventListener("DOMContentLoaded", () => {
    const items = document.querySelectorAll(".gallery-item");
    const lightbox = document.getElementById("gallery-lightbox");
    const lightboxImg = document.getElementById("lightbox-img");
    const closeBtn = document.querySelector(".lightbox-close");

    if (!lightbox) return;

    items.forEach(item => {
        item.addEventListener("click", () => {
            const img = item.querySelector("img");
            lightboxImg.src = img.src;
            lightbox.classList.add("active");
        });
    });

    closeBtn.addEventListener("click", () => lightbox.classList.remove("active"));
    lightbox.addEventListener("click", () => lightbox.classList.remove("active"));
});

// ===============================
// Gallery Filter + Load More
// ===============================

document.addEventListener("DOMContentLoaded", () => {
    const filterBtns   = document.querySelectorAll(".filter-btn");
    const allItems     = Array.from(document.querySelectorAll(".gallery-item"));
    const loadMoreBtn  = document.getElementById("gallery-load-more");
    const loadLessBtn  = document.getElementById("gallery-load-less");
    const STEP         = 6;

    if (!allItems.length) return;

    let activeFilter  = "alle";
    let visibleCount  = STEP;

    // Gefilterte Items basierend auf aktivem Filter
    function getFiltered() {
        return allItems.filter(item =>
            activeFilter === "alle" || item.dataset.kategorie === activeFilter
        );
    }

    // Gallery updaten – smooth animation beim Einblenden neuer Items
    function updateGallery(animateFrom = 0) {
        const filtered = getFiltered();

        allItems.forEach(item => {
            item.classList.remove("visible");
            item.style.display = "none";
        });

        filtered.forEach((item, i) => {
            if (i < visibleCount) {
                item.style.display = "";
                // Neue Items (ab animateFrom) smooth einblenden
                if (i >= animateFrom) {
                    item.style.opacity = "0";
                    item.style.transform = "scale(0.94)";
                    requestAnimationFrame(() => {
                        setTimeout(() => {
                            item.style.transition = "opacity 0.5s ease, transform 0.5s cubic-bezier(0.16,1,0.3,1)";
                            item.style.opacity = "1";
                            item.style.transform = "scale(1)";
                            item.classList.add("visible");
                        }, (i - animateFrom) * 60);
                    });
                } else {
                    item.style.opacity = "1";
                    item.style.transform = "scale(1)";
                    item.style.transition = "";
                    item.classList.add("visible");
                }
            }
        });

        // Buttons steuern
        const total = filtered.length;

        if (loadMoreBtn) {
            loadMoreBtn.style.display = visibleCount >= total ? "none" : "inline-block";
        }
        if (loadLessBtn) {
            loadLessBtn.style.display = visibleCount <= STEP ? "none" : "inline-block";
        }
    }

    // Filter Buttons
    filterBtns.forEach(btn => {
        btn.addEventListener("click", () => {
            activeFilter = btn.dataset.filter;
            visibleCount = STEP;
            filterBtns.forEach(b => b.classList.remove("active"));
            btn.classList.add("active");
            updateGallery(0);
        });
    });

    // Mehr anzeigen
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener("click", () => {
            const prevCount = visibleCount;
            visibleCount += STEP;
            updateGallery(prevCount);
        });
    }

    // Weniger anzeigen
    if (loadLessBtn) {
        loadLessBtn.addEventListener("click", () => {
            visibleCount = Math.max(STEP, visibleCount - STEP);
            updateGallery(0);
            // Sanft zurück zur Galerie scrollen
            const gallerySection = document.getElementById("gallery");
            if (gallerySection) {
                gallerySection.scrollIntoView({ behavior: "smooth", block: "start" });
            }
        });
    }

    // Initial
    updateGallery(0);
});
</script>

<script>
    document.addEventListener("DOMContentLoaded", () => {
    const aboutGrid = document.getElementById("about-animate");
    if (!aboutGrid) return;

    // Bild-Seite: einmal als ganzes reinfliegen von links
    const imageWrap = aboutGrid.querySelector(".about-image-wrap");
    if (imageWrap) {
        imageWrap.style.opacity = "0";
        imageWrap.style.transform = "translateX(-40px)";
        imageWrap.style.transition = "opacity 0.9s cubic-bezier(0.16,1,0.3,1), transform 0.9s cubic-bezier(0.16,1,0.3,1)";
    }

    // Content: jedes .about-reveal Element einzeln mit data-delay
    const reveals = aboutGrid.querySelectorAll(".about-reveal");

    const observer = new IntersectionObserver(([entry]) => {
        if (entry.isIntersecting) {
            if (imageWrap) {
                setTimeout(() => {
                    imageWrap.style.opacity = "1";
                    imageWrap.style.transform = "translateX(0)";
                }, 100);
            }
            reveals.forEach(el => {
                const delay = parseInt(el.dataset.delay || 0);
                setTimeout(() => el.classList.add("visible"), 200 + delay);
            });
        } else {
            if (imageWrap) {
                imageWrap.style.opacity = "0";
                imageWrap.style.transform = "translateX(-40px)";
            }
            reveals.forEach(el => el.classList.remove("visible"));
        }
    }, { threshold: 0.15 });

    observer.observe(aboutGrid);
});
</script>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const contactSection = document.getElementById("contact");
    if (!contactSection) return;

    const header = document.getElementById("contact-animate");
    const reveals = contactSection.querySelectorAll(".contact-reveal");

    // Karte von rechts reinfliegen
    const mapWrap = contactSection.querySelector(".contact-map-wrap");
    if (mapWrap) {
        mapWrap.style.opacity = "0";
        mapWrap.style.transform = "translateX(40px)";
        mapWrap.style.transition = "opacity 0.9s cubic-bezier(0.16,1,0.3,1), transform 0.9s cubic-bezier(0.16,1,0.3,1)";
    }

    let animated = false;

    const observer = new IntersectionObserver(([entry]) => {
        if (entry.isIntersecting) {
            if (header) header.classList.add("visible");
            if (mapWrap) {
                setTimeout(() => {
                    mapWrap.style.opacity = "1";
                    mapWrap.style.transform = "translateX(0)";
                    mapWrap.classList.add("visible");
                }, 150);
            }
            reveals.forEach(el => {
                if (el === mapWrap) return;
                const delay = parseInt(el.dataset.delay || 0);
                setTimeout(() => el.classList.add("visible"), 200 + delay);
            });
        } else {
            if (header) header.classList.remove("visible");
            if (mapWrap) {
                mapWrap.style.opacity = "0";
                mapWrap.style.transform = "translateX(40px)";
                mapWrap.classList.remove("visible");
            }
            reveals.forEach(el => el.classList.remove("visible"));
        }
    }, { threshold: 0.12 });

    observer.observe(contactSection);
});
</script>

<script>
function scrollToSection(id) {
    const el = document.querySelector(id);
    if (el) el.scrollIntoView({ behavior: "smooth" });
}
</script>



<script>
document.addEventListener("DOMContentLoaded", () => {
    const section = document.querySelector(".services-section");

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                section.classList.add("visible");
            } else {
                section.classList.remove("visible");
            }
        });
    }, { threshold: 0.2 });

    observer.observe(section);
});
</script>

<script>
// ===============================
// SMOOTH SCROLL
// ===============================

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            e.preventDefault();
            const top = target.getBoundingClientRect().top + window.scrollY - 80;
            window.scrollTo({ top, behavior: 'smooth' });
        }
    });
});

window.scrollToSection = function(id) {
    const el = document.querySelector(id);
    if (el) {
        const top = el.getBoundingClientRect().top + window.scrollY - 80;
        window.scrollTo({ top, behavior: 'smooth' });
    }
};

// ===============================
// CUSTOM CURSOR
// ===============================

document.addEventListener("DOMContentLoaded", () => {
    const dot  = document.getElementById("cursor-dot");
    const ring = document.getElementById("cursor-ring");
    if (!dot || !ring) return;

    let mouseX = 0, mouseY = 0;
    let ringX  = 0, ringY  = 0;

    // Nur auf Desktop
    if (window.innerWidth <= 768) return;

    document.addEventListener("mousemove", (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;
        dot.style.left = mouseX + "px";
        dot.style.top  = mouseY + "px";
    });

    // Ring folgt mit Verzögerung via rAF
    function animateRing() {
        ringX += (mouseX - ringX) * 0.12;
        ringY += (mouseY - ringY) * 0.12;
        ring.style.left = ringX + "px";
        ring.style.top  = ringY + "px";
        requestAnimationFrame(animateRing);
    }
    animateRing();

    // Hover auf interaktiven Elementen
    const hoverTargets = document.querySelectorAll(
        "a, button, .service-card, .gallery-item, .filter-btn, .card-toggle, .contact-cta-card, .gallery-load-btn"
    );

    hoverTargets.forEach(el => {
        el.addEventListener("mouseenter", () => {
            dot.classList.add("hovering");
            ring.classList.add("hovering");
        });
        el.addEventListener("mouseleave", () => {
            dot.classList.remove("hovering");
            ring.classList.remove("hovering");
        });
    });

    // Click State
    document.addEventListener("mousedown", () => {
        dot.classList.add("clicking");
        ring.classList.add("clicking");
    });
    document.addEventListener("mouseup", () => {
        dot.classList.remove("clicking");
        ring.classList.remove("clicking");
    });

    // Cursor verstecken wenn Maus das Fenster verlässt
    document.addEventListener("mouseleave", () => {
        dot.style.opacity = "0";
        ring.style.opacity = "0";
    });
    document.addEventListener("mouseenter", () => {
        dot.style.opacity = "1";
        ring.style.opacity = "1";
    });
});

// ===============================
// PARALLAX HERO
// ===============================

document.addEventListener("DOMContentLoaded", () => {
    const heroBg = document.querySelector(".hero-bg img");
    if (!heroBg) return;

    window.addEventListener("scroll", () => {
        const offset = window.scrollY * 0.35;
        heroBg.style.transform = "translateY(" + offset + "px)";
    }, { passive: true });
});

// ===============================
// SECTION LINES
// ===============================

document.addEventListener("DOMContentLoaded", () => {
    const lines = document.querySelectorAll(".section-line");
    if (!lines.length) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add("visible");
            } else {
                entry.target.classList.remove("visible");
            }
        });
    }, { threshold: 0.1 });

    lines.forEach(line => observer.observe(line));
});

// ===============================
// PAGE TRANSITION
// ===============================

document.addEventListener("DOMContentLoaded", () => {
    const overlay = document.getElementById("page-transition");
    if (!overlay) return;

    // Eingangsanimation beim Laden
    overlay.classList.add("entering");
    setTimeout(() => overlay.classList.remove("entering"), 600);

    // Ausgangsanimation bei internen Links
    document.querySelectorAll("a").forEach(link => {
        const href = link.getAttribute("href");
        if (!href || href.startsWith("#") || href.startsWith("tel:") || href.startsWith("mailto:") || href.startsWith("http") || link.target === "_blank") return;

        link.addEventListener("click", (e) => {
            e.preventDefault();
            overlay.classList.add("leaving");
            setTimeout(() => {
                window.location.href = href;
            }, 500);
        });
    });
});

// ===============================
// SCROLL PROGRESS BAR
// ===============================

window.addEventListener("scroll", () => {
    const progress = document.getElementById("scroll-progress");
    if (!progress) return;
    const scrollTop = window.scrollY;
    const docHeight = document.documentElement.scrollHeight - window.innerHeight;
    progress.style.width = (scrollTop / docHeight * 100) + "%";
}, { passive: true });

// ===============================
// MAGNETIC BUTTONS
// ===============================

document.addEventListener("DOMContentLoaded", () => {
    const magneticEls = document.querySelectorAll(".hero-call, .cta-secondary, .nav-call, .whatsapp-float");

    magneticEls.forEach(el => {
        el.classList.add("magnetic");

        el.addEventListener("mousemove", (e) => {
            const rect = el.getBoundingClientRect();
            const cx = rect.left + rect.width / 2;
            const cy = rect.top + rect.height / 2;
            const dx = (e.clientX - cx) * 0.35;
            const dy = (e.clientY - cy) * 0.35;
            el.style.transform = "translate(" + dx + "px, " + dy + "px)";
        });

        el.addEventListener("mouseleave", () => {
            el.style.transform = "translate(0, 0)";
        });
    });
});

// ===============================
// FOOTER ANIMATION
// ===============================

document.addEventListener("DOMContentLoaded", () => {
    const footer = document.querySelector(".footer-section");
    if (!footer) return;

    const observer = new IntersectionObserver(([entry]) => {
        if (entry.isIntersecting) {
            footer.classList.add("visible");
        } else {
            footer.classList.remove("visible");
        }
    }, { threshold: 0.1 });

    observer.observe(footer);
});

// ===============================
// Cookie Banner + Google Maps Consent
// ===============================

document.addEventListener("DOMContentLoaded", () => {
    const banner      = document.getElementById("cookie-banner");
    const acceptBtn   = document.getElementById("cookie-accept");
    const declineBtn  = document.getElementById("cookie-decline");
    const mapIframe   = document.getElementById("google-map-iframe");
    const mapHolder   = document.getElementById("map-placeholder");
    const mapConsentBtn = document.getElementById("map-consent-btn");

    const COOKIE_KEY  = "mnb_cookie_consent";

    function loadMap() {
        if (!mapIframe) return;
        mapIframe.src = mapIframe.dataset.src;
        mapIframe.style.display = "block";
        if (mapHolder) mapHolder.style.display = "none";
    }

    function setConsent(value) {
        localStorage.setItem(COOKIE_KEY, value);
        banner.style.display = "none";
        if (value === "accepted") loadMap();
    }

    // Beim Laden prüfen
    const saved = localStorage.getItem(COOKIE_KEY);
    if (saved === "accepted") {
        loadMap();
    } else if (!saved) {
        // Banner nach kurzer Verzögerung zeigen
        setTimeout(() => {
            if (banner) {
                banner.style.display = "block";
            }
        }, 1500);
    }

    if (acceptBtn) acceptBtn.addEventListener("click", () => setConsent("accepted"));
    if (declineBtn) declineBtn.addEventListener("click", () => setConsent("declined"));

    // Direkt auf der Karte zustimmen
    if (mapConsentBtn) {
        mapConsentBtn.addEventListener("click", () => {
            setConsent("accepted");
        });
    }
});
</script>

<script>
// ===============================
// MAGNETIC BUTTONS
// ===============================

document.addEventListener("DOMContentLoaded", () => {
    const magneticEls = document.querySelectorAll(".hero-call, .cta-secondary, .nav-call");

    magneticEls.forEach(el => {
        el.classList.add("magnetic");

        el.addEventListener("mousemove", (e) => {
            const rect = el.getBoundingClientRect();
            const cx = rect.left + rect.width / 2;
            const cy = rect.top + rect.height / 2;
            const dx = (e.clientX - cx) * 0.35;
            const dy = (e.clientY - cy) * 0.35;
            el.style.transform = "translate(" + dx + "px, " + dy + "px)";
        });

        el.addEventListener("mouseleave", () => {
            el.style.transform = "translate(0, 0)";
        });
    });
});

// ===============================
// ABOUT IMAGE TILT
// ===============================

document.addEventListener("DOMContentLoaded", () => {
    const imageInner = document.querySelector(".about-image-inner");
    if (!imageInner) return;

    imageInner.addEventListener("mousemove", (e) => {
        const rect = imageInner.getBoundingClientRect();
        const cx = rect.left + rect.width / 2;
        const cy = rect.top + rect.height / 2;
        const dx = (e.clientX - cx) / rect.width * 12;
        const dy = (e.clientY - cy) / rect.height * 12;
        imageInner.style.transform = "perspective(800px) rotateY(" + dx + "deg) rotateX(" + (-dy) + "deg) scale(1.02)";
    });

    imageInner.addEventListener("mouseleave", () => {
        imageInner.style.transform = "perspective(800px) rotateY(0deg) rotateX(0deg) scale(1)";
        imageInner.style.transition = "transform 0.6s cubic-bezier(0.16,1,0.3,1)";
    });

    imageInner.addEventListener("mouseenter", () => {
        imageInner.style.transition = "transform 0.1s ease";
    });
});

// ===============================
// FOOTER PARTIKEL
// ===============================

document.addEventListener("DOMContentLoaded", () => {
    const canvas = document.getElementById("footer-canvas");
    if (!canvas) return;

    const ctx = canvas.getContext("2d");
    const footer = canvas.parentElement;

    function resize() {
        canvas.width  = footer.offsetWidth;
        canvas.height = footer.offsetHeight;
    }
    resize();
    window.addEventListener("resize", resize);

    const particles = Array.from({ length: 55 }, () => ({
        x: Math.random() * canvas.width,
        y: Math.random() * canvas.height,
        r: Math.random() * 1.5 + 0.3,
        dx: (Math.random() - 0.5) * 0.3,
        dy: (Math.random() - 0.5) * 0.3,
        alpha: Math.random() * 0.6 + 0.1,
    }));

    function draw() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        particles.forEach(p => {
            ctx.beginPath();
            ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
            ctx.fillStyle = "rgba(201,169,110," + p.alpha + ")";
            ctx.fill();

            p.x += p.dx;
            p.y += p.dy;

            if (p.x < 0 || p.x > canvas.width)  p.dx *= -1;
            if (p.y < 0 || p.y > canvas.height) p.dy *= -1;
        });
        requestAnimationFrame(draw);
    }
    draw();
});
</script>

</body>
</html>