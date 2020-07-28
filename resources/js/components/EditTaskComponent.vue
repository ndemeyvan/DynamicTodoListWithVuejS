<template>
    <div>
        <!-- Modal -->
        <div
            class="modal fade"
            id="editModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Editer une tache
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
                                    class="form-control"
                                    id="exampleFormControlTextarea1"
                                    rows="3"
                                    v-model="data.name"
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
                            @click="updateData"
                            data-dismiss="modal"
                        >
                            Enregistrer
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        data: {}
    },
    methods: {
        updateData: function() {
            //sytatement
            axios
                .put("http://localhost:8000/taskList/edit/" + this.data.id, {
                    name: this.data.name
                })
                .then(response => this.$emit("task-update", response))
                .catch(error => console.log(error));
        }
    }
};
</script>

<style scoped></style>
