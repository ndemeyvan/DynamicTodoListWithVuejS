<template>
    <div>
        <!-- Button trigger modal -->
        <button
            type="button"
            class="btn btn-primary"
            data-toggle="modal"
            data-target="#exampleModal"
        >
            Ajouter une tache
        </button>

        <!-- Modal -->
        <div
            class="modal fade"
            id="exampleModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Ajouter une tache
                        </h5>
                     
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1"
                                    >Description de la tache</label
                                >
                                <textarea
                                    name="name"
                                    v-model="name"
                                    class="form-control"
                                    id="exampleFormControlTextarea1"
                                    rows="3"
                                ></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal"
                        >
                            Annuler
                        </button>
                        <button
                            type="button"
                            class="btn btn-primary"
                            @click="storeData"
                        >
                            Sauvegarder
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:{
        data:{

        }
    },
    data() {
        return {
            name: ""
        };
    },
    methods: {
        storeData: function() {
            axios
                .post("http://localhost:8000/taskList", { name: this.name })
                .then(response => this.$emit('task-added',response))
                .catch(error => console.log(error));
        }
    }
};
</script>

<style></style>
