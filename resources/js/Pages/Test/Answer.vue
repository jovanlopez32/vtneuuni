<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import axios from 'axios';
import { ref, onMounted } from 'vue';
import anime from 'animejs/lib/anime.es.js';

const props = defineProps({
    answerPrediction: {
        type: Array,
    }
});

/* Sorted the array for get the first place*/
const sortedData = props.answerPrediction.slice().sort((a, b) => b - a);

const first = sortedData[0];
const second = sortedData[1];
const third = sortedData[2]

const indexFirst = props.answerPrediction.indexOf(first);
const indexSecond = props.answerPrediction.indexOf(second);
const indexThird = props.answerPrediction.indexOf(third);


const college_degree = ['Licenciatura en Derecho', 'Ingeniería Industrial', 'Licenciatura en Mercadotecnia y Diseño Digital', 'Licenciatura en Administración de Negocios', ];
const areaCD = ['Ciencias Sociales y Humanidades.', 'Ingeniería y Tecnología.', 'Negocios y Comunicación.', 'Negocios.'];


/* OPEN IA */
const responseChatInitial = ref(null);
const responseChat = ref(null);

responseChat.value = 'Bien hecho! Ahora preguntame sobre alguna cosa que tengas duda sobre tu area profesional o sobre alguna carrera en especifico.'

onMounted(()=>{
    anime({
        targets: '#load',
        rotate:  360,
        loop: true,
        duration: 800,
        easing: 'easeInOutSine',
    });

    anime({
        targets: '.chatanimation',
        rotate:   anime.random(100, 360),
        loop: true,
        duration: 1000,
        direction: 'alternate',
        easing: 'easeInOutQuad'
    });


    axios.post(route('openia.textcompletevt'), {college_degree: college_degree[indexFirst], professional_area: areaCD[indexFirst]}).then(response => {
        console.log(response.data);
        responseChatInitial.value = response.data;
    });
});

const form = useForm({
    question: '',
    college_degree: college_degree[indexFirst],
    professional_area: areaCD[indexFirst],
});

const submit = () => {

    responseChat.value = null;

    axios.post(route('openia.textresponseq'), form).then(response => {
        console.log(response.data);
        responseChat.value = response.data;
    });

};

</script>

<template>

<Head title="Resultado" />
<div class="min-h-screen w-full bg-neutral-950 grid grid-cols-1 lg:grid-cols-2 text-zinc-100">

    <div class=" w-full flex items-center justify-center ">
        <div class="animate-fade-up animate-duration-[1500ms] max-w-xl p-10">
            <!-- Title -->
            <div class="flex flex-col gap-1">
                <h3 class="text-sm font-semibold">Basado en tus respuestas tu area profesional es la siguiente:</h3>
                <h1 class=" font-extrabold text-4xl">{{ areaCD[indexFirst] }}</h1>
            </div>

            <!-- Prediction -->
            <div class=" flex flex-wrap items-stretch gap-5 pt-8">
                <div v-for="(porcent, index) in props.answerPrediction" class="text-xs flex flex-col gap-1">
                    <p class="font-bold">{{ areaCD[index] }}</p>
                    <p class="font-bold text-teal-300">{{ porcent.toFixed(2) }}%</p>
                </div>
            </div>


            <!-- Top College Degree -->
            <div class="flex flex-col gap-3 animate-fade-right animate-duration-[1500ms] mt-6">

                <div class="flex items-center  gap-3">
                    <div class="w-6 h-6 p-2 bg-yellow-400 rounded-full flex items-center justify-center">
                        <p class="font-extrabold text-neutral-950 text-sm">1</p>
                    </div>
                    <p class="font-bold text-sm">{{ college_degree[indexFirst] }}</p>
                </div>

                <div class="flex items-center  gap-3">
                    <div class="w-6 h-6 p-2 bg-gray-400 rounded-full flex items-center justify-center">
                        <p class="font-extrabold text-neutral-950 text-sm">2</p>
                    </div>
                    <p class="font-bold text-sm">{{ college_degree[indexSecond] }}</p>
                </div>

                <div class="flex items-center  gap-3">
                    <div class="w-6 h-6 p-2 bg-amber-700 rounded-full flex items-center justify-center">
                        <p class="font-extrabold text-neutral-950 text-sm">3</p>
                    </div>
                    <p class="font-bold text-sm">{{ college_degree[indexThird] }}</p>
                </div>
            </div>

            <!-- Answer Prediction -->
            <div v-if="responseChatInitial == null" class="fill-zinc-100 my-10">
                <svg id="load" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 22c5.421 0 10-4.579 10-10h-2c0 4.337-3.663 8-8 8s-8-3.663-8-8c0-4.336 3.663-8 8-8V2C6.579 2 2 6.58 2 12c0 5.421 4.579 10 10 10z" ></path></svg>
            </div>
            <div class="my-8 animate-fade-up animate-duration-[1500ms] " v-else>
                <p class="text-sm tracking-wide font-semibold border-t-2 pt-4">{{ responseChatInitial }}</p>
            </div>


        </div>
    </div>

    <div class="relative w-full h-full flex items-center justify-center p-10">

        <div class="absolute top-0 right-0 w-20 h-20 bg-teal-200 blur-3xl">

        </div>

        <div class="w-full relative">

            <div class="relative inline-flex pr-5 items-center gap-5">
                <img src="/img/nevil/NevilFace.png" class="w-12 object-contain" alt="Nevil">
                <p class="text-xl font-extrabold underline underline-offset-8 decoration-2 decoration-teal-500 leading-loose">NEVILE CHAT</p>
                <div class="w-3 h-3 rounded-full absolute top-0 right-0 bg-teal-400"></div>
                <div class="w-3 h-3 animate-ping rounded-full absolute top-0 right-0 bg-teal-400"></div>
            </div>

            <div class="my-10 flex items-center h-full lg:h-48 w-full overflow-y-scroll scrollbar bg-gray-400 rounded bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-10 py-5 px-4">

                <div v-show="responseChat == null" class=" animate-fade-up animate-duration-[1500ms] rounded-lg rounded-bl-none px-8 py-3 bg-teal-400 text-neutral-950 flex gap-2 items-center">
                    <div class="w-2 h-2 rounded-[2px] bg-neutral-900 chatanimation"></div>
                    <div class="w-3 h-3 rounded-[2px] bg-neutral-900 chatanimation"></div>
                    <div class="w-2 h-2 rounded-[2px] bg-neutral-900 chatanimation"></div>
                </div>

                <div v-show="responseChat != null" class=" animate-fade-up animate-duration-[1500ms] rounded-xl rounded-bl-none px-4 py-2 bg-teal-400 text-neutral-950 pb-4">
                    <p class="font-semibold text-sm">{{ responseChat }}</p>
                </div>

            </div>

            <form @submit.prevent="submit" >
                <textarea v-model="form.question" class="w-full h-32 bg-neutral-900 border-2 border-zinc-400 rounded focus:border-teal-400 focus:ring-teal-400 text-sm placeholder:text-zinc-300 py-4 font-semibold tracking-wider " placeholder="Sugerencia: Cual es el campo laboral de mi carrera."></textarea>
                <div class="w-full flex justify-end my-3" >
                    <button class="px-8 py-2 border-2 border-teal-500 hover:bg-teal-300 text-zinc-100 hover:text-neutral-950 font-bold rounded transition-all duration-300 text-sm select-none">Preguntar</button>
                </div>
            </form>

            <div class=" flex items-center justify-end w-full flex-wrap text-xs text-zinc-100 font-semibold gap-4 my-5">
                <button @click="form.question = 'Cual es el campo laboral de mi area profesional?'" class=" px-5 py-2 rounded-full bg-neutral-700">
                    <p>Cual es el campo laboral de mi area profesional?</p>
                </button>
                <button @click="form.question = 'En que empresas puedo trabajar?'" class=" px-5 py-2 rounded-full bg-neutral-700">
                    <p>En que empresas puedo trabajar?</p>
                </button>
            </div>

        </div>

    </div>

</div>


</template>
