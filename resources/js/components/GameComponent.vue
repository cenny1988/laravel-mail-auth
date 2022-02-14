<template>
    <div class="container text-dark">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Videogames</div>

                    <div class="card-body" v-for="videogame in videogames" :key="videogame.id">
                        {{videogame.title}} - {{videogame.sub_title}} - {{videogame.rating}}  
                        <button v-if="user" @click="videogameDelete(videogame.id)" class="btn btn-danger">Delete</button>
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
        props: {
            user: String,
        },
        methods: {
            videogameDelete(id){
                axios.get(`/api/videogame/delete/${id}`)
                
                    .then((result) => {
                        const ind = this.getIndexById(id);
                        this.videogames.splice(ind, 1);

                    }).catch((err) => {

                        console.error(err);
                    }); 
            },
            getIndexById(id){
                // for (let x = 0; x < this.videogames.length; x++) {
                //     const videogame = this.videogames[x];
                //     this.videogames.forEach(element => {
                //         if (videogame.id == id) {
                //             return x;
                //         }
                //         return -1;
                //     });
                // }
                this.videogames.forEach(element => {
                    if (element.id == id) {
                        return element.id
                    }
                    return -1
                });
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
