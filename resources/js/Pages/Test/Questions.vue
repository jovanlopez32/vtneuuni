<script setup>
import { Head, useForm, router } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import anime from 'animejs/lib/anime.es.js';
import * as tf from '@tensorflow/tfjs';

const q = useForm({
    first_option: 20,
    second_option: 20,
});

const questions = [
' Me gusta encontrar soluciones justas para todos en un problema.',
' Investigo sobre los derechos y responsabilidades de las personas en diferentes ámbitos de la vida diaria.',
' Analizo situaciones complicadas y tomo decisiones justas basadas en la información disponible.',
' Escucho diversos puntos de vista sobre un tema para luego argumentar mi opinión de manera clara y convincente.',


' Es prioritario para mi proteger los derechos de los demás y luchar por la justicia en mi comunidad',
' Tengo curiosidad por el funcionamiento de maquinarias o equipos tecnológicos',
' Me adapto y aprendo fácilmente sobre el uso de nuevas tecnologías y equipos.',
' Mediante el análisis, resuelvo problemas técnicos relacionados con maquinas o computadoras.',
' Me atrae la idea de utilizar herramientas de simulación y programas para analizar y mejorar procesos.',


' Me intriga saber cómo se realiza un producto pieza por pieza.',
' Se me facilita resolver problemas matemáticos.',
' Pongo especial atención en cómo se comporta la gente al elegir productos o servicios en su vida diaria.',
' Soy creativo y original para promocionar productos o servicios de forma atractiva.',
' Mi comunicación es efectiva y logro persuadir a los demás para que se interesen en algo que te gusta o crees que es valioso.',


' Estoy al tanto de las últimas tendencias y novedades en tecnología, redes sociales y diseño gráfico.',
' Tomo decisiones estratégicas basadas en en análisis e investigación al elegir qué productos ofrecer un determinado público.',
' Soy una persona organizada que gusta de planificar sus tareas diarias, como hacer una lista de pendientes o establecer horarios de estudio.',
' Disfrutas trabajar en equipo y coordinar actividades para alcanzar metas comunes.',


' Cuando pienso en una situación, tomo decisiones y encuentro formas de resolver problemas de mi día a día.',
' Gestiono sin dificultad mis finanzas personales, como hacer presupuestos o administrar el dinero de manera eficiente.',
' Me interesa aprender sobre cómo se organizan y gestionan las empresas, desde el manejo de recursos humanos hasta la toma de decisiones estratégicas.'
];

/* Cuando finalize el test desabilitar los botones */
const dis = ref(false);

const index = ref(0);
const answers = ref([]);

let bar_progress = null;
let tx = null;
/* Count for translate  */
let count = 0;
/* Count for rotate  */
let count_s = 0;
/* width progress */
const wp = ref(0);

onMounted(() => {
    /* Get the element bar and its width for the translate animation */
    bar_progress = document.getElementById('bar');
    /* increasing variable*/
    tx = bar_progress.offsetWidth / 10;
    anime({
        targets: '#dataprocess',
        opacity:  0,
        duration: 0,
        easing: 'easeInOutSine',
    });
});

const nextQuestion = () => {
    count = count + tx;
    count_s = count_s + 36;
    wp.value += tx;
    anime({
        targets: '#circle',
        translateX: count,
        rotate: count_s,
        delay: function(el, i) { return i * 100; },
        easing: 'easeInOutSine',
        duration: 700,
    });
    if(answers.value[index.value] && answers.value[index.value + 1]) {
        /* Actualizamos las respuestas que anterior mente habian llenado */
        answers.value[index.value] = parseInt(q.first_option);
        answers.value[index.value + 1] = parseInt(q.second_option);
        console.log('Existe el registro');
        index.value = index.value + 2;
        if(answers.value[index.value + 1] == null && answers.value[index.value + 2] == null) {
            console.log('Hola')
            q.first_option = 20;
            q.second_option = 20;
        } else {
            q.first_option = answers.value[index.value];
            q.second_option = answers.value[index.value + 1];
        }
    } else {
        console.log('No existe');
        index.value = index.value + 2;
        answers.value.push(parseInt(q.first_option));
        answers.value.push(parseInt(q.second_option));
        q.first_option = 20;
        q.second_option = 20;
    }
};

const previousQuestion = () => {
    count = count - tx;
    count_s = count_s - 36;
    wp.value -= tx;
    anime({
        targets: '#circle',
        translateX: count,
        rotate: count_s,
        delay: function(el, i) { return i * 100; },
        easing: 'easeInOutSine',
        duration: 500,
    });
    const i = index.value;
    q.first_option = answers.value[i-2]
    q.second_option = answers.value[i-1]
    index.value = index.value-2;
    console.log('Regrese al grupo anterior.' + i);
};

const porcent = ref(0);

const processTest = () => {
    if (answers.value.length == 21){return null;}

    dis.value = true;
    answers.value.push(parseInt(q.first_option));
    anime({
        targets: '#content',
        opacity:  0,
        duration: 900,
        easing: 'easeInOutSine',
    });
    anime({
        targets: '#dataprocess',
        opacity:  1,
        duration: 800,
        delay: 900,
        easing: 'easeInOutSine',
    });
    anime({
        targets: '#load',
        rotate:  360,
        loop: true,
        duration: 800,
        easing: 'easeInOutSine',
    });

    const data = [
        [20, 20, 20, 20, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 20, 20, 20, 20, 20, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 10, 20, 20, 20, 20, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 20, 10, 20, 20, 20, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 20, 20, 10, 20, 20, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 20, 20, 20, 10, 20, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 20, 20, 20, 20, 10, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 20, 20, 20, 20, 20, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 20, 20, 20, 20, 20, 0, 0, 0, 0, 0],
        [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 20, 20, 20, 20, 20],
        [10, 0, 20, 10, 20, 20, 20, 20, 20, 20, 20, 10, 0, 0, 20, 20, 20, 20, 20, 20, 20],
        [20, 0, 10, 20, 20, 20, 20, 0, 0, 0, 10, 0, 20, 10, 10, 10, 20, 0, 10, 20, 10],
        [20, 0, 20, 20, 20, 0, 0, 0, 0, 0, 10, 20, 0, 20, 20, 0, 0, 0, 20, 10, 20],
        [20, 20, 20, 20, 20, 10, 20, 10, 20, 20, 10, 20, 20, 20, 20, 20, 20, 20, 10, 20, 20],
        [20, 20, 10, 20, 20, 10, 20, 10, 20, 10, 0, 20, 10, 20, 20, 20, 20, 20, 20, 10, 20],
        [10, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 10, 20, 20, 20, 20, 20, 20, 20, 20],
        [20, 20, 20, 20, 20, 10, 10, 10, 0, 20, 0, 20, 20, 20, 10, 20, 10, 20, 20, 10, 20],
        [20, 0, 20, 10, 10, 0, 20, 0, 0, 10, 0, 0, 10, 10, 10, 10, 20, 10, 20, 10, 10],
        [20, 20, 20, 10, 10, 20, 20, 10, 20, 20, 0, 10, 20, 20, 10, 20, 0, 20, 20, 20, 10],
        [20, 20, 20, 20, 20, 10, 10, 10, 20, 10, 20, 10, 20, 20, 10, 20, 10, 20, 20, 10, 20],
        [10, 10, 20, 20, 20, 0, 10, 0, 0, 0, 0, 20, 20, 20, 20, 10, 20, 20, 20, 20, 20],
        [10, 0, 20, 0, 0, 10, 20, 0, 0, 10, 10, 0, 0, 10, 0, 10, 20, 20, 20, 20, 20],
        [20, 20, 20, 10, 0, 10, 0, 0, 0, 0, 0, 10, 10, 10, 20, 20, 20, 10, 10, 20, 20],
        [0, 0, 10, 0, 0, 10, 10, 20, 20, 20, 20, 20, 10, 10, 10, 0, 10, 0, 0, 10, 0],
        [20, 20, 20, 20, 10, 10, 20, 20, 20, 20, 20, 10, 10, 10, 0, 0, 10, 10, 20, 20, 0],
        [10, 0, 10, 10, 10, 20, 20, 20, 20, 10, 0, 10, 10, 0, 10, 10, 20, 20, 20, 20, 10],
        [20, 10, 20, 10, 20, 10, 10, 10, 0, 0, 0, 0, 0, 10, 10, 0, 0, 20, 20, 20, 10],
        [10, 10, 10, 0, 0, 20, 20, 20, 20, 20, 20, 20, 10, 20, 10, 10, 20, 10, 20, 10, 20],
        [20, 20, 10, 10, 0, 20, 10, 20, 10, 0, 0, 0, 0, 10, 20, 0, 0, 0, 20, 20, 20],
        [0, 0, 0, 20, 20, 20, 20, 20, 20, 10, 0, 10, 10, 20, 20, 0, 10, 20, 10, 0, 20]
    ];

    const data2 = [
        [100, 0, 0, 0],
        [0, 100, 0, 0],
        [0, 100, 0, 0],
        [0, 100, 0, 0],
        [0, 100, 0, 0],
        [0, 100, 0, 0],
        [0, 100, 0, 0],
        [0, 100, 0, 0],
        [0, 0, 100, 0],
        [0, 0, 0, 100],
        [60, 100, 50, 100],
        [70, 50, 50, 60],
        [80, 10, 60, 50],
        [100, 90, 100, 90],
        [90, 70, 90, 90],
        [90, 100, 90, 100],
        [100, 50, 90, 80],
        [80, 30, 40, 70],
        [80, 90, 80, 70],
        [100, 80, 80, 80],
        [80, 10, 90, 100],
        [30, 50, 20, 100],
        [70, 10, 70, 80],
        [10, 100, 50, 20],
        [90, 100, 30, 60],
        [40, 90, 40, 90],
        [80, 30, 20, 70],
        [30, 100, 50, 80],
        [80, 60, 30, 60],
        [40, 90, 60, 60]
    ];

    const inputData = tf.tensor2d(data, [data.length, data[0].length]);
    const targetData = tf.tensor2d(data2, [data2.length, data2[0].length]);

    // Definir el modelo de la red neuronal
    const model = tf.sequential();
    model.add(tf.layers.dense({ units: 32, inputShape: [inputData.shape[1]], activation: 'relu' }));
    model.add(tf.layers.dense({ units: 16, activation: 'relu' }));
    model.add(tf.layers.dense({ units: targetData.shape[1], activation: 'linear' }));

    // Compilar el modelo
    model.compile({ optimizer: 'adam', loss: 'meanSquaredError' });

    // Entrenar el modelo
    const epochs = 300;
    const batchSize = 4;

    console.log('Data load successfuly.');

    (async () => {
        for (let epoch = 0; epoch < epochs; epoch++) {
            const history = await model.fit(inputData, targetData, {
            epochs: 1,
            batchSize: batchSize,
            shuffle: true,
            });
            console.log(`Epoch ${epoch + 1}/${epochs}, loss: ${history.history.loss[0]}`);
            porcent.value = (epoch + 1) / 3;
        }

        // Definir el contenedor que quieres predecir
        /* const contenedor = tf.tensor2d([[20, 20, 20, 20, 20, 10, 10, 10, 20, 10, 20, 10, 20, 20, 10, 20, 10, 20, 20, 10, 10]]); */ //Test
        const contenedor = tf.tensor2d([answers.value]);
        answers.value
        // Realizar la predicción
        const prediction = model.predict(contenedor);

        // Imprimir la predicción
        console.log('Prediction:');
        prediction.print();

        const predictionArray = await prediction.array();

        console.log(predictionArray);

        router.post(route('test.process.answer'), {answer: predictionArray});

    })();


};
</script>

<template>
<Head title="Test Vocacional" />

<div class="w-full min-h-screen overflow-hidden bg-neutral-950">
<div class="w-full min-h-screen flex flex-col items-center justify-center gap-y-10 bg-neutral-950 px-10 py-10 [&>div]:animate-fade-up [&>div]:animate-ease-in-out [&>div]:animate-duration-[2000ms]" >
    <div class="relative max-w-lg w-full h-1 bg-teal-100 " id="bar">
        <!-- <div class="absolute w-4 h-4  bg-teal-500 -top-1.5 left-0" id="circle"></div> -->
        <img src="/img/nevil/NevilFace.png" class="object-contain absolute w-6 h-6 -top-2.5 left-0 z-20" id="circle" alt="">
        <div class="absolute max-w-lg h-1 bg-teal-400 z-10 transition-all duration-700" :style="'width: ' + wp + 'px'" id="bar_complete"></div>
    </div>
    <!-- <p class="text-white absolute bottom-0 py-10">{{ answers }} , {{ q.first_option }} , {{ q.second_option }} - index: {{ index }} - length: {{ answers.length }}</p> -->
    <div class="max-w-lg w-full" >

        <div class="flex flex-wrap max-w-sm items-center justify-start -z-10 my-10 transition-all duration-300 gap-5 fill-zinc-50 absolute" id="dataprocess">
            <svg id="load" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 22c5.421 0 10-4.579 10-10h-2c0 4.337-3.663 8-8 8s-8-3.663-8-8c0-4.336 3.663-8 8-8V2C6.579 2 2 6.58 2 12c0 5.421 4.579 10 10 10z" ></path></svg>
            <div>
                <h1 class="font-extrabold text-zinc-100">Entrenando y procesando los datos.</h1>
                <p class="text-sm my-1 font-semibold text-zinc-400">Porcentaje: {{ Math.round(porcent) }}%</p>
            </div>
        </div>

        <h1 class="font-bold text-zinc-100 tracking-wide text" id="content">{{index+1}}.- {{ questions[index] }}</h1>
        <div class="w-full flex flex-wrap items-center my-5 gap-5 text-sm" id="content">
            <div class="flex items-center gap-2">
                <input v-model="q.first_option" id="first_twenty" value="20" type="radio" class="hidden peer" required>
                <label for="first_twenty" class="flex items-center justify-between w-full py-1 px-4 text-zinc-100 bg-neutral-800 border border-neutral-800  rounded cursor-pointer peer-checked:bg-teal-500 peer-checked:border-teal-600 peer-checked:text-neutral-900 hover:text-neutral-600 hover:bg-zinc-200 transition-all duration-300 select-none">
                    <span class="w-full text-sm font-semibold">Me identifico con esto</span>
                </label>
            </div>

            <div class="flex items-center gap-2">
                <input v-model="q.first_option" id="first_ten" value="10" type="radio" class="hidden peer" required>
                <label for="first_ten" class="flex items-center justify-between w-full py-1 px-4 text-zinc-100 bg-neutral-800 border border-neutral-800  rounded cursor-pointer peer-checked:bg-teal-500 peer-checked:border-teal-600 peer-checked:text-neutral-900 hover:text-neutral-600 hover:bg-zinc-200 transition-all duration-300 select-none">
                    <span class="w-full text-sm font-semibold">Ocasionalmente</span>
                </label>
            </div>

            <div class="flex items-center gap-2">
                <input v-model="q.first_option" id="first_zero" value="0" type="radio" class="hidden peer" required>
                <label for="first_zero" class="flex items-center justify-between w-full py-1 px-4 text-zinc-100 bg-neutral-800 border border-neutral-800  rounded cursor-pointer peer-checked:bg-teal-500 peer-checked:border-teal-600 peer-checked:text-neutral-900 hover:text-neutral-600 hover:bg-zinc-200 transition-all duration-300 select-none">
                    <span class="w-full text-sm font-semibold">No me identifico</span>
                </label>
            </div>
        </div>
    </div>
    <div class="max-w-lg w-full"  >
        <div  v-show="(index+2) < questions.length">
            <h1 class="font-bold text-zinc-100 tracking-wide">{{index+2}}.- {{ questions[index+1] }}</h1>
            <div class="w-full flex flex-wrap items-center my-5 gap-4 text-sm">
                <div class="flex items-center gap-2">
                    <input v-model="q.second_option" id="second_twenty" value="20" type="radio" class="hidden peer" required>
                    <label for="second_twenty" class="flex items-center justify-between w-full py-1 px-4 text-zinc-100 bg-neutral-800 border border-neutral-800  rounded cursor-pointer peer-checked:bg-teal-500 peer-checked:border-teal-600 peer-checked:text-neutral-900 hover:text-neutral-600 hover:bg-zinc-200 transition-all duration-300 select-none">
                        <span class="w-full text-sm font-semibold">Me identifico con esto</span>
                    </label>
                </div>

                <div class="flex items-center gap-2">
                    <input v-model="q.second_option" id="second_ten" value="10" type="radio" class="hidden peer" required>
                    <label for="second_ten" class="flex items-center justify-between w-full py-1 px-4 text-zinc-100 bg-neutral-800 border border-neutral-800  rounded cursor-pointer peer-checked:bg-teal-500 peer-checked:border-teal-600 peer-checked:text-neutral-900 hover:text-neutral-600 hover:bg-zinc-200 transition-all duration-300 select-none">
                        <span class="w-full text-sm font-semibold">Ocasionalmente</span>
                    </label>
                </div>

                <div class="flex items-center gap-2">
                    <input v-model="q.second_option" id="second_zero" value="0" type="radio" class="hidden peer" required>
                    <label for="second_zero" class="flex items-center justify-between w-full py-1 px-4 text-zinc-100 bg-neutral-800 border border-neutral-800  rounded cursor-pointer peer-checked:bg-teal-500 peer-checked:border-teal-600 peer-checked:text-neutral-900 hover:text-neutral-600 hover:bg-zinc-200 transition-all duration-300 select-none">
                        <span class="w-full text-sm font-semibold">No me identifico</span>
                    </label>
                </div>
            </div>
        </div>
        <!-- Next Button -->
        <div v-show="(index+2) < questions.length" class="w-full flex items-stretch justify-end mt-10 gap-3">
            <button @click="previousQuestion" v-show="index > 0" class="flex items-center justify-center bg-teal-700 hover:bg-teal-300 border-2 border-teal-400 rounded transition-all duration-300  fill-neutral-950 px-2 select-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" ><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path></svg>
            </button>
            <button @click="nextQuestion"  class="w-full lg:w-fit px-8 py-2 border-2 border-teal-500 hover:bg-teal-300 text-zinc-100 hover:text-neutral-950 font-bold rounded transition-all duration-300  text-sm select-none">Siguiente </button>
        </div>
        <!-- Finish Button -->
        <div v-show="(index+2) >= questions.length" class="w-full flex items-stretch justify-end gap-3 " id="content">
            <button :disabled="dis" @click="previousQuestion" class="flex items-center justify-center bg-teal-700 hover:bg-teal-300 border-2 border-teal-400 rounded transition-all duration-300 fill-neutral-950 px-2 select-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" ><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path></svg>
            </button>
            <button @click="processTest"  class="w-full lg:w-fit px-8 py-2 border-2 border-teal-500 hover:bg-teal-300 text-zinc-100 hover:text-neutral-950 font-bold rounded transition-all duration-300 text-sm select-none" :disabled="dis">Finalizar</button>
        </div>


    </div>

</div>

</div>


</template>
