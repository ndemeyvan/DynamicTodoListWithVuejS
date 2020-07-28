import '../../../vendor/symfony/error-handler/Resources/assets/css/error.css';
<template>
    <div class="container">
        <div class="justify-content-center">
            <form clas="my-3">
                <div class="form-row">
                    <div class="col">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Rechercher une tache ..."
                            @keyup="searchTask"
                            v-model="textSearch"
                        />
                    </div>
                </div>
            </form>

            <app-add-component
                class="my-3"
                @task-added="refresh"
            ></app-add-component>
            <h1>Bienvenue sur Task Component</h1>
            <ul class="list-group">
                <li
                    class="list-group-item"
                    v-for="task in tasks.data"
                    :key="task.id"
                >
                    {{ task.name }}
                    <div class="float-right">
                        <button
                            type="button"
                            class="btn btn-primary "
                            data-toggle="modal"
                            data-target="#editModal"
                            @click="getData(task.id)"
                        >
                            Modifier
                        </button>
                        <button
                            type="button"
                            class="btn btn-danger "
                            @click="deleteData(task.id)"
                        >
                            Supprimer
                        </button>
                    </div>
                </li>
                <app-edit-component
                    :data="taskToEdit"
                    @task-update="refresh"
                ></app-edit-component>
                <!-- Button trigger modal -->
            </ul>
            <pagination
                class="mt-5"
                :data="tasks"
                @pagination-change-page="getResults"
            ></pagination>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            tasks: {},
            taskToEdit: "",
            textSearch: ""
        };
    },

    created: function() {
        axios
            .get("http://localhost:8000/taskList")
            .then(response => (this.tasks = response.data))
            .catch(error => console.log(error));
    },
    methods: {
        getResults: function(page = 1) {
            axios
                .get("http://localhost:8000/taskList?page=" + page)
                .then(response => {
                    this.tasks = response.data;
                })
                .catch(error => console.log(error));
        },
        refresh: function(tasks) {
            this.tasks = tasks.data;
        },
        getData: function(id) {
            axios
                .get("http://localhost:8000/taskList/edit/" + id)
                .then(response => (this.taskToEdit = response.data))
                .catch(error => console.log(error));
        },
        deleteData: function(id) {
            //statement
            axios
                .delete("http://localhost:8000/taskList/" + id)
                .then(response => (this.tasks = response.data))
                .catch(error => console.log(error));
        },
        searchTask: function() {
            if (this.textSearch.length > 3) {
                axios
                    .get("http://localhost:8000/taskList/" + this.textSearch)
                    .then(response => (this.tasks = response.data))
                    .catch(error => console.log(error));
            } else {
                axios
                    .get("http://localhost:8000/taskList")
                    .then(response => (this.tasks = response.data))
                    .catch(error => console.log(error));
            }
        }
    }
};
</script>
