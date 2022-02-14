<template>
    <div class="container text-dark">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Videogames</div>

                    <div class="card-body" v-for="videogame in videogames" :key="videogame.id">
                        {{videogame.title}} - {{videogame.sub_title}} - {{videogame.rating}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                videogames:[],
            }
        },
        mounted() {
            axios.get('/api/videogames/list')
                .then((result) => {
                    console.log(result.data);
                    this.videogames = result.data;
                }).catch((err) => {
                    console.error(err);
                });
        }
    }
</script>
