<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <Link :href="'/'">
        <svg
            class="size-16"
            viewBox="0 0 48 48"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
        >
            <path d="M11.395 44.428C4.557 40.198 0 32.632 0 24 0 10.745 10.745 0 24 0a23.891 23.891 0 0113.997 4.502c-.2 17.907-11.097 33.245-26.602 39.926z" fill="#6875F5" />
            <path d="M14.134 45.885A23.914 23.914 0 0024 48c13.255 0 24-10.745 24-24 0-3.516-.756-6.856-2.115-9.866-4.659 15.143-16.608 27.092-31.75 31.751z" fill="#6875F5" />
        </svg>

        <svg 
            id="logo_ari_care" 
            data-name="Capa Logo" 
            xmlns="http://www.w3.org/2000/svg" 
            viewBox="0 0 285.55 85"><defs><style>.cls-1{font-size:24.04px;font-family:Nasalization-Regular, Nasalization;}.cls-1,.cls-5{fill:#3e3ef4;}.cls-2{fill:#88949e;}.cls-3{fill:#0d53fc;}.cls-4{fill:#49c496;}.cls-6{fill:#4198f7;}.cls-7{fill:#263446;}.cls-8{fill:#c6cdd8;}.cls-9{fill:#dee5f1;}</style></defs><text class="cls-1" transform="translate(173.71 54.56)">ARI<tspan class="cls-2" x="42.77" y="0">CARE</tspan></text><rect class="cls-3" width="40" height="40"/><rect class="cls-4" y="45" width="40" height="40"/><rect class="cls-5" x="44" width="40" height="40"/><rect class="cls-6" x="44" y="45" width="40" height="40"/><rect class="cls-7" x="94" width="40" height="18"/><rect class="cls-2" x="94" y="22" width="40" height="18"/><rect class="cls-8" x="94" y="44.67" width="40" height="18"/><rect class="cls-9" x="94" y="67" width="40" height="18"/>
        </svg>

    </Link>
</template>
