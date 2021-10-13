<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="https://unpkg.com/vue@next"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
</head>
<body class="container">
<h1>Descripción Pelicula</h1>
<div id="peliculas" class="mt-3">
    <div class="text-end position-relative">
        <img src="https://d1nhio0ox7pgb.cloudfront.net/_img/g_collection_png/standard/256x256/shopping_cart.png"
             width="30">
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
        {{cantidad}}
        </span>
    </div>
    <div v-for="item in contenido">
        <div v-if="item.id===<?= $_GET["id"] ?>" class="row mt-2">
            <div class="col-3">
                <img :src="item.poster" width="250">
            </div>
            <div class="col">
                <h2>{{item.titulo}} ({{item.año}})</h2>
                <b>Sinopsis:</b> {{item.descripcion}}<br>
                <div class="mt-2">
                    <button v-on:click="comprar" class="btn btn-small btn-primary" :disabled="disabled">Comprar</button>
                    <button v-on:click="cancelar" class="btn btn-small btn-secondary ms-2">Cancelar</button>
                </div>
                <div v-if="stock===0" class="h3 text-danger mt-2">
                    Stock agotado
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ"
        crossorigin="anonymous"></script>
<script>
    const Peliculas = {
        data() {
            return {
                cantidad: 0,
                stock: 10,
                disabled: false,
                contenido: [
                    {
                        id: 1,
                        titulo: "Dune",
                        año: 2021,
                        descripcion: "Adaptación de la novela de ciencia ficción de Frank Herbert sobre el hijo de una familia noble que trata de vengarse de la muerte de su padre y al mismo tiempo salvar un planeta que se le ha encomendado proteger.",
                        poster: "https://m.media-amazon.com/images/M/MV5BN2FjNmEyNWMtYzM0ZS00NjIyLTg5YzYtYThlMGVjNzE1OGViXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_FMjpg_UX509_.jpg",
                        ver: "descripcion.php?id=1"
                    },
                    {
                        id: 2,
                        titulo: "Alien, el octavo pasajero",
                        año: 1979,
                        descripcion: "Un buque espacial mercante percibe una transmisión desconocida como una llamada de socorro. Aterrizan en la luna de origen y encuentra a uno de los tripulantes atacados por una misteriosa forma de vida.",
                        poster: "https://m.media-amazon.com/images/M/MV5BMmQ2MmU3NzktZjAxOC00ZDZhLTk4YzEtMDMyMzcxY2IwMDAyXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_FMjpg_UY720_.jpg",
                        ver: "descripcion.php?id=2"
                    },
                    {
                        id: 3,
                        titulo: "Joker",
                        año: 2019,
                        descripcion: "En Gotham, Arthur Fleck, un comediante con problemas de salud mental, es marginado y maltratado por la sociedad. Se adentra en una espiral de crimen que resulta revolucionaria. Pronto conoce a su alter-ego, el Joker.",
                        poster: "https://m.media-amazon.com/images/M/MV5BNGVjNWI4ZGUtNzE0MS00YTJmLWE0ZDctN2ZiYTk2YmI3NTYyXkEyXkFqcGdeQXVyMTkxNjUyNQ@@._V1_FMjpg_UY720_.jpg",
                        ver: "descripcion.php?id=3"
                    },
                    {
                        id: 4,
                        titulo: "El exorcista",
                        año: 1973,
                        descripcion: "Una adolescente es poseída por una entidad malévola y su madre obtiene la ayuda de dos curas para que la liberen.",
                        poster: "https://i.blogs.es/b50080/b3bd3242fcd44a9f1e7a10073fcf51cb/450_1000.jpg",
                        ver: "descripcion.php?id=4"
                    },
                    {
                        id: 5,
                        titulo: "Sin tiempo para morir",
                        año: 2021,
                        descripcion: "Bond ha dejado el servicio. Su recién encontrada paz es interrumpida por una visita de su amigo de la CIA Felix Leiter. Bond y Leiter le siguen la pista a un misterioso villano en posesión de peligrosas nuevas tecnologías.",
                        poster: "https://m.media-amazon.com/images/M/MV5BYWQ2NzQ1NjktMzNkNS00MGY1LTgwMmMtYTllYTI5YzNmMmE0XkEyXkFqcGdeQXVyMjM4NTM5NDY@._V1_FMjpg_UY720_.jpg",
                        ver: "descripcion.php?id=5"
                    }
                ]
            }
        },
        methods: {
            comprar(){
                this.stock--;
                this.cantidad++;
                if(this.stock===0){
                    this.disabled = true;
                }
            },
            cancelar(){
                this.stock=10;
                this.cantidad=0;
                this.disabled = false;
            }
        }
    }
    Vue.createApp(Peliculas).mount("#peliculas");
</script>
</body>
</html>