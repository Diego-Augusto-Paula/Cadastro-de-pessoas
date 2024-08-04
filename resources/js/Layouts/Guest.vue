<template>
    <div class="min-h-screen min-w-screen bg-gray-100">
        <div>
            <header>
                <slot name="header"></slot>
            </header>
            <main class="w-full">
                <slot></slot>
           
            </main>
        </div>
    </div>
</template>

<script>
import BreezeApplicationLogo from '@/Components/ApplicationLogo'

export default {
    components: {
        BreezeApplicationLogo,
    },
    props: [],
    methods: {
        navToggle() {
            var btn = document.getElementById('menuBtn');
            var nav = document.getElementById('menu');

            btn.classList.toggle('open');
            nav.classList.toggle('flex');
            nav.classList.toggle('hidden');
        }
    },
    mounted() {
        const nav = document.getElementById('site-menu');
        const header = document.getElementById('top');

        window.addEventListener('scroll', function() {
            if (window.scrollY >=400) { // adjust this value based on site structure and header image height
                nav.classList.add('nav-sticky');
                header.classList.add('pt-scroll');
            } else {
                nav.classList.remove('nav-sticky');
                header.classList.remove('pt-scroll');
            }
        });
    }
}

</script>
<style>
/* custom non-Tailwind CSS */

@media (max-width: 576px) {
    .content {
        padding-top: 51px;
    }
}

@media (min-width: 577px) {
    .pt-scroll {
        padding-top: 51px;
    }

    .nav-sticky {
        position: fixed!important;
        min-width: 100%;
        top: 0;
        box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .1);
        transition: all .25s ease-in;
        z-index: 1;
    }
}

/* HAMBURGER MENU */

.hamburger {
    cursor: pointer;
    width: 48px;
    height: 48px;
    transition: all 0.25s;
}

.hamburger__top-bun,
.hamburger__bottom-bun {
    content: '';
    position: absolute;
    width: 24px;
    height: 2px;
    background: #000;
    transform: rotate(0);
    transition: all 0.5s;
}

.hamburger:hover [class*="-bun"] {
    background: #333;
}

.hamburger__top-bun {
    transform: translateY(-5px);
}

.hamburger__bottom-bun {
    transform: translateY(3px);
}

.open {
    transform: rotate(90deg);
    transform: translateY(-1px);
}

.open .hamburger__top-bun {
    transform:
        rotate(45deg)
        translateY(0px);
}

.open .hamburger__bottom-bun {
    transform:
        rotate(-45deg)
        translateY(0px);
}
</style>
