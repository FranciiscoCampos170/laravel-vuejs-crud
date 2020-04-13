<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-right ">
                <a href="/create" class="btn btn-primary mt-20">Create</a>
            </div>
            <div class="col-md-8">
                <table class="table table-hover table-bordered">
                   <thead>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th> Cargo</th>
                    <th>Empresa</th>
                   </thead>
                   <tbody>
                       <tr v-for="user in users" :key="user.id">
                           <td>{{ user.id }}</td>
                           <td> {{ user.name }}</td>
                           <td> {{ user.email }}</td>
                           <td> {{ user.role }}</td>
                           <td> {{ user.company }}</td>
                       </tr>

                   </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data (){
            return {
                url: '/api/customers',
                dados : 'Ola dados!',
                users: [],
            }
        },
        mounted() {
            this.getCustomers()
        },
        methods: {
            getCustomers() {
                let $this = this
                fetch(this.url, {
                    method: 'get',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                }).then((response) => response.json())
                    .then((res) => {
                    this.users = res;
                    }).catch((error) => {
                        console.error(error)
                });
            },
            }
        }

</script>
