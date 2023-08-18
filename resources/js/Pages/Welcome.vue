<script setup>
import { Head, Link } from '@inertiajs/vue3';


</script>

<template>
<Head title="Test Vocacional" />

<div class="w-full min-h-screen bg-neutral-950 grid grid-cols-1 lg:grid-cols-2 overflow-hidden ">

    <div class="fixed flex items-center justify-center bg-neutral-950 w-full py-4 px-10 fill-zinc-100 z-30">
        <!-- Menu -->
        <div class="flex items-center gap-8 animate-fade-left animate-ease-in-out animate-duration-[3000ms] ">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 286 64" class="object-contain w-20"><g><g><defs><path id="SVGID_1_" d="M47.5 17.6L25 4.8v52.6l9-5.2V37.4l6.8 3.9-.1-10.1-6.7-3.9v-5.9l13.5 7.9z"/></defs><clipPath id="SVGID_2_"><use xlink:href="#SVGID_1_" overflow="visible"/></clipPath><g clip-path="url(#SVGID_2_)"><linearGradient id="SVGID_3_" gradientUnits="userSpaceOnUse" x1="-1.6" y1="335.05" x2="53.6" y2="335.05" gradientTransform="translate(0 -304)"><stop offset="0" stop-color="#ff6f00"/><stop offset="1" stop-color="#ffa800"/></linearGradient><path d="M-1.6 4.6h55.2v52.9H-1.6V4.6z" fill="url(#SVGID_3_)"/></g></g></g><g><g><defs><path id="SVGID_4_" d="M.5 17.6L23 4.8v52.6l-9-5.2V21.4L.5 29.3z"/></defs><clipPath id="SVGID_5_"><use xlink:href="#SVGID_4_" overflow="visible"/></clipPath><g clip-path="url(#SVGID_5_)"><linearGradient id="SVGID_6_" gradientUnits="userSpaceOnUse" x1="-1.9" y1="335.05" x2="53.3" y2="335.05" gradientTransform="translate(0 -304)"><stop offset="0" stop-color="#ff6f00"/><stop offset="1" stop-color="#ffa800"/></linearGradient><path d="M-1.9 4.6h55.2v52.9H-1.9V4.6z" fill="url(#SVGID_6_)"/></g></g></g><path style="fill:#fff" d="M88.2 21.1h-10v27.7h-5.6V21.1h-10v-4.5h25.6v4.5z"/><path style="fill:#fff" d="M94.9 49.2c-3.4 0-6.2-1.1-8.3-3.2-2.1-2.1-3.2-5-3.2-8.6v-.7c0-2.2.4-4.4 1.4-6.4.9-1.8 2.2-3.3 3.9-4.4 1.7-1.1 3.6-1.6 5.6-1.6 3.3 0 5.8 1 7.6 3.1s2.7 5 2.7 8.8v2.2H88.9c.1 1.8.8 3.4 2 4.7 1.2 1.2 2.7 1.8 4.4 1.7 2.4.1 4.6-1.1 6-3l2.9 2.8c-1 1.4-2.3 2.6-3.8 3.3-1.8 1-3.6 1.4-5.5 1.3zm-.6-20.5c-1.4-.1-2.7.5-3.6 1.5-1 1.2-1.6 2.7-1.7 4.3h10.3v-.4c-.1-1.8-.6-3.2-1.4-4.1-1-.8-2.3-1.4-3.6-1.3zm19.4-3.9l.2 2.8c1.7-2.1 4.3-3.3 7-3.2 5 0 7.5 2.9 7.6 8.6v15.8h-5.4V33.3c0-1.5-.3-2.6-1-3.4-.7-.7-1.7-1.1-3.2-1.1-2.1-.1-4 1.1-4.9 2.9v17h-5.4v-24l5.1.1zm32.2 17.5c0-.9-.4-1.7-1.2-2.2-1.2-.7-2.6-1.1-3.9-1.3-1.6-.3-3.1-.8-4.6-1.5-2.7-1.3-4-3.2-4-5.6 0-2 1-4 2.6-5.2 1.7-1.4 4-2.1 6.6-2.1 2.9 0 5.2.7 6.9 2.1 1.7 1.3 2.7 3.4 2.6 5.5h-5.4c0-1-.4-1.9-1.2-2.6-.9-.7-1.9-1.1-3.1-1-1 0-2 .2-2.9.8-.7.5-1.1 1.3-1.1 2.2 0 .8.4 1.5 1 1.9.7.5 2.1.9 4.2 1.4 1.7.3 3.4.9 5 1.7 1.1.5 2 1.3 2.7 2.3.6 1 .9 2.1.9 3.3 0 2.1-1 4-2.7 5.2-1.8 1.3-4.1 2-7 2-1.8 0-3.6-.3-5.2-1.1-1.4-.6-2.7-1.6-3.6-2.9-.8-1.2-1.3-2.6-1.3-4h5.2c0 1.1.5 2.2 1.4 2.9 1 .7 2.3 1.1 3.5 1 1.4 0 2.5-.3 3.2-.8 1-.4 1.4-1.2 1.4-2zm8.1-5.7c0-2.2.4-4.4 1.4-6.3.9-1.8 2.2-3.3 3.9-4.3 1.8-1 3.8-1.6 5.8-1.5 3.2 0 5.9 1 7.9 3.1s3.1 4.8 3.3 8.3v1.3c0 2.2-.4 4.3-1.4 6.3-.8 1.8-2.2 3.3-3.9 4.3-1.8 1-3.8 1.6-5.9 1.5-3.4 0-6.1-1.1-8.1-3.4-2-2.2-3-5.2-3.1-9l.1-.3zm5.3.5c0 2.5.5 4.4 1.5 5.8 1.8 2.3 5.1 2.8 7.5 1 .4-.3.7-.6 1-1 1-1.4 1.5-3.5 1.5-6.2 0-2.4-.5-4.3-1.6-5.8-1.7-2.3-5-2.8-7.4-1.1-.4.3-.8.7-1.1 1-.8 1.4-1.4 3.5-1.4 6.3zm33.1-7.3c-.7-.1-1.5-.2-2.2-.2-2.5 0-4.1.9-5 2.8v16.4h-5.4v-24h5.1l.1 2.7c1.3-2.1 3.1-3.1 5.4-3.1.6 0 1.3.1 1.9.3l.1 5.1zm22.5 5.3h-13v13.7h-5.6V16.6h20.5v4.5h-14.9v9.6h13v4.4zm10.7 13.7h-5.4V16.5h5.4v32.3zm3.9-12.2c0-2.2.4-4.4 1.4-6.3.9-1.8 2.2-3.3 3.9-4.3 1.8-1 3.8-1.6 5.8-1.5 3.2 0 5.9 1 7.9 3.1s3.1 4.8 3.3 8.3v1.3c0 2.2-.4 4.3-1.3 6.3-.8 1.8-2.2 3.3-3.9 4.3-1.8 1-3.8 1.6-5.9 1.5-3.4 0-6.1-1.1-8.1-3.4-2-2.2-3.1-5.2-3.1-9v-.3zm5.4.5c0 2.5.5 4.4 1.5 5.8 1 1.4 2.6 2.2 4.3 2.1 1.7.1 3.3-.7 4.2-2.1 1-1.4 1.5-3.5 1.5-6.2 0-2.4-.5-4.3-1.6-5.8-1.7-2.3-5-2.8-7.4-1.1-.4.3-.8.7-1.1 1-.9 1.4-1.4 3.5-1.4 6.3zm41.2 4.3l3.8-16.5h5.2l-6.5 24h-4.4l-5.1-16.5-5.1 16.5h-4.4l-6.6-24h5.3l3.9 16.4 4.9-16.4h4.1l4.9 16.5z"/></svg>

            <img src="/img/assets/logos/neuuniuniversidad.png" class="object-contain w-14" alt="">

            <svg viewBox="0 0 1180 320" xmlns="http://www.w3.org/2000/svg" class="object-contain w-16"><path d="m367.44 153.84c0 52.32 33.6 88.8 80.16 88.8s80.16-36.48 80.16-88.8-33.6-88.8-80.16-88.8-80.16 36.48-80.16 88.8zm129.6 0c0 37.44-20.4 61.68-49.44 61.68s-49.44-24.24-49.44-61.68 20.4-61.68 49.44-61.68 49.44 24.24 49.44 61.68z"/><path d="m614.27 242.64c35.28 0 55.44-29.76 55.44-65.52s-20.16-65.52-55.44-65.52c-16.32 0-28.32 6.48-36.24 15.84v-13.44h-28.8v169.2h28.8v-56.4c7.92 9.36 19.92 15.84 36.24 15.84zm-36.96-69.12c0-23.76 13.44-36.72 31.2-36.72 20.88 0 32.16 16.32 32.16 40.32s-11.28 40.32-32.16 40.32c-17.76 0-31.2-13.2-31.2-36.48z"/><path d="m747.65 242.64c25.2 0 45.12-13.2 54-35.28l-24.72-9.36c-3.84 12.96-15.12 20.16-29.28 20.16-18.48 0-31.44-13.2-33.6-34.8h88.32v-9.6c0-34.56-19.44-62.16-55.92-62.16s-60 28.56-60 65.52c0 38.88 25.2 65.52 61.2 65.52zm-1.44-106.8c18.24 0 26.88 12 27.12 25.92h-57.84c4.32-17.04 15.84-25.92 30.72-25.92z"/><path d="m823.98 240h28.8v-73.92c0-18 13.2-27.6 26.16-27.6 15.84 0 22.08 11.28 22.08 26.88v74.64h28.8v-83.04c0-27.12-15.84-45.36-42.24-45.36-16.32 0-27.6 7.44-34.8 15.84v-13.44h-28.8z"/><path d="m1014.17 67.68-65.28 172.32h30.48l14.64-39.36h74.4l14.88 39.36h30.96l-65.28-172.32zm16.8 34.08 27.36 72h-54.24z"/><path d="m1163.69 68.18h-30.72v172.32h30.72z"/><path d="m297.06 130.97c7.26-21.79 4.76-45.66-6.85-65.48-17.46-30.4-52.56-46.04-86.84-38.68-15.25-17.18-37.16-26.95-60.13-26.81-35.04-.08-66.13 22.48-76.91 55.82-22.51 4.61-41.94 18.7-53.31 38.67-17.59 30.32-13.58 68.54 9.92 94.54-7.26 21.79-4.76 45.66 6.85 65.48 17.46 30.4 52.56 46.04 86.84 38.68 15.24 17.18 37.16 26.95 60.13 26.8 35.06.09 66.16-22.49 76.94-55.86 22.51-4.61 41.94-18.7 53.31-38.67 17.57-30.32 13.55-68.51-9.94-94.51zm-120.28 168.11c-14.03.02-27.62-4.89-38.39-13.88.49-.26 1.34-.73 1.89-1.07l63.72-36.8c3.26-1.85 5.26-5.32 5.24-9.07v-89.83l26.93 15.55c.29.14.48.42.52.74v74.39c-.04 33.08-26.83 59.9-59.91 59.97zm-128.84-55.03c-7.03-12.14-9.56-26.37-7.15-40.18.47.28 1.3.79 1.89 1.13l63.72 36.8c3.23 1.89 7.23 1.89 10.47 0l77.79-44.92v31.1c.02.32-.13.63-.38.83l-64.41 37.19c-28.69 16.52-65.33 6.7-81.92-21.95zm-16.77-139.09c7-12.16 18.05-21.46 31.21-26.29 0 .55-.03 1.52-.03 2.2v73.61c-.02 3.74 1.98 7.21 5.23 9.06l77.79 44.91-26.93 15.55c-.27.18-.61.21-.91.08l-64.42-37.22c-28.63-16.58-38.45-53.21-21.95-81.89zm221.26 51.49-77.79-44.92 26.93-15.54c.27-.18.61-.21.91-.08l64.42 37.19c28.68 16.57 38.51 53.26 21.94 81.94-7.01 12.14-18.05 21.44-31.2 26.28v-75.81c.03-3.74-1.96-7.2-5.2-9.06zm26.8-40.34c-.47-.29-1.3-.79-1.89-1.13l-63.72-36.8c-3.23-1.89-7.23-1.89-10.47 0l-77.79 44.92v-31.1c-.02-.32.13-.63.38-.83l64.41-37.16c28.69-16.55 65.37-6.7 81.91 22 6.99 12.12 9.52 26.31 7.15 40.1zm-168.51 55.43-26.94-15.55c-.29-.14-.48-.42-.52-.74v-74.39c.02-33.12 26.89-59.96 60.01-59.94 14.01 0 27.57 4.92 38.34 13.88-.49.26-1.33.73-1.89 1.07l-63.72 36.8c-3.26 1.85-5.26 5.31-5.24 9.06l-.04 89.79zm14.63-31.54 34.65-20.01 34.65 20v40.01l-34.65 20-34.65-20z"/></svg>
        </div>
    </div>

    <!-- Main content -->
    <div class="w-full h-full flex items-center justify-center px-10">
        <div class="text-zinc-100 max-w-md animate-fade-up animate-ease-in-out animate-duration-[2000ms]">
            <h1 class="text-4xl font-extrabold">Test Vocacional</h1>
            <h3 class="text-lg font-semibold mt-1 tracking-wide">Powered by <span class="font-extrabold text-teal-400">Nevil</span></h3>
            <p class="font-medium my-5 tracking-wide">A través del poder de la Inteligencia Artificial, experimente un análisis rapido y preciso para encontrar tu mejor opcion en base a tus habilidades y aptitudes.</p>
            <Link href="/testvocacional" class="px-8 py-2 bg-teal-500 hover:bg-teal-300 text-neutral-950 font-bold rounded transition-all duration-300">Empezar</Link>

        </div>
    </div>

    <div class="w-full h-full hidden lg:flex flex-col items-center justify-center animate-fade-left animate-ease-in-out animate-duration-[1000ms] ">
        <!-- <img src="/img/nevil/NevilGreeting.png" class="z-20 w-60 object-contain" alt="Nevil">
        <div class="absolute w-48 h-48 rounded-full z-10 bg-teal-300 blur-3xl"></div>
        <div class="absolute w-48 h-48 rounded-full z-10 bg-blue-500 blur-3xl"></div> -->
        <img src="/img/nevil/NevilIdea.png" class="z-20 w-1/3 object-contain " alt="Nevil">
        <div class="absolute w-48 h-48 rounded-full z-10 bg-teal-300 blur-3xl "></div>

        <div class="w-full flex items-center justify-center z-20 mt-10 gap-5 fill-zinc-50 animate-fade-left animate-delay-[250ms]">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" ><path d="M7 2H5v3H2v2h3v3h2V7h3V5H7V2zm7 3h8v2h-8zm0 10h8v2h-8zm0 4h8v2h-8zm-5.71-4.71L6 16.59l-2.29-2.3-1.42 1.42L4.59 18l-2.3 2.29 1.42 1.42L6 19.41l2.29 2.3 1.42-1.42L7.41 18l2.3-2.29-1.42-1.42z"></path></svg>

            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" ><path d="M4 21h17v-2H5V3H3v17a1 1 0 0 0 1 1z"></path><circle cx="10" cy="8" r="2"></circle><circle cx="18" cy="12" r="2"></circle><circle cx="11.5" cy="13.5" r="1.5"></circle><circle cx="16.5" cy="6.5" r="1.5"></circle></svg>

            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" ><path d="M19 2.01H6c-1.206 0-3 .799-3 3v14c0 2.201 1.794 3 3 3h15v-2H6.012C5.55 19.998 5 19.815 5 19.01c0-.101.009-.191.024-.273.112-.575.583-.717.987-.727H20c.018 0 .031-.009.049-.01H21V4.01c0-1.103-.897-2-2-2zm0 14H5v-11c0-.806.55-.988 1-1h7v7l2-1 2 1v-7h2v12z"></path></svg>

            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" ><path d="M21.928 11.607c-.202-.488-.635-.605-.928-.633V8c0-1.103-.897-2-2-2h-6V4.61c.305-.274.5-.668.5-1.11a1.5 1.5 0 0 0-3 0c0 .442.195.836.5 1.11V6H5c-1.103 0-2 .897-2 2v2.997l-.082.006A1 1 0 0 0 1.99 12v2a1 1 0 0 0 1 1H3v5c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2v-5a1 1 0 0 0 1-1v-1.938a1.006 1.006 0 0 0-.072-.455zM5 20V8h14l.001 3.996L19 12v2l.001.005.001 5.995H5z"></path><ellipse cx="8.5" cy="12" rx="1.5" ry="2"></ellipse><ellipse cx="15.5" cy="12" rx="1.5" ry="2"></ellipse><path d="M8 16h8v2H8z"></path></svg>

            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" ><path d="M18.277 8c.347.596.985 1 1.723 1a2 2 0 0 0 0-4c-.738 0-1.376.404-1.723 1H16V4a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H5.723C5.376 5.404 4.738 5 4 5a2 2 0 0 0 0 4c.738 0 1.376-.404 1.723-1H8v.368C5.134 9.839 4.319 12.534 4.092 14H3a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-.877c.197-.959.718-2.406 2.085-3.418A.984.984 0 0 0 9 11h6a.98.98 0 0 0 .792-.419c1.373 1.013 1.895 2.458 2.089 3.419H17a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-1.092c-.227-1.466-1.042-4.161-3.908-5.632V8h2.277zM14 9h-4V5h4v4z"></path></svg>


        </div>
    </div>


    <!-- Footer -->
    <div class="absolute bottom-0 right-0 py-4  flex items-center gap-4 pl-5 pr-10">
        <div class="w-2 h-2 bg-teal-300 rounded-full animate-ping absolute left-0"></div>
        <div class="w-2 h-2 bg-teal-500 rounded-full absolute left-0"></div>
        <a href="https://unineuuni.edu.mx/" target="_blank" class="text-xs text-zinc-50 hover:text-teal-400 font-semibold tracking-wider transition-all duration-300">Neuuni Universidad</a>
    </div>


</div>


</template>
