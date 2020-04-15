<template>

        <div class="row justify-content-center">
            <div class="col-md-12 text-right ">
                <a href="/customers/create" class="btn btn-primary mt-20">Create</a>
            </div>
            <div class="col-md-12">
                <table class="table table-hover table-bordered table-responsive">
                   <thead>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th> Cargo</th>
                    <th>Empresa</th>
                    <th colspan="2">Actions</th>
                   </thead>
                   <tbody>
                       <tr v-for="user in users" :key="user.id">
                           <td>{{ user.id }}</td>
                           <td> {{ user.name }}</td>
                           <td> {{ user.email }}</td>
                           <td> {{ user.role }}</td>
                           <td> {{ user.company }}</td>
                           <td>
                               <a :href="'/customers/'+user.id+'/edit'" class="btn btn-warning btn-sm">
                                   <i class="fas fa-edit"></i>
                               </a>
                           </td>
                           <td>
                               <a href="#">
                                   <a href="#" class="btn btn-danger btn-sm">
                                   <i class="fas fa-trash"></i>
                               </a>
                               </a>
                           </td>
                       </tr>
                   </tbody>
                </table>
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
