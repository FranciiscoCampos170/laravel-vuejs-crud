<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Criar Novos Clientes</div>

                    <div class="card-body">
                       <form method="POST">

                           <div class="form-group">
                                <label for="name">Nome Completo</label>
                                <input type="text" class="form-control" id="name" name="name" v-model="name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" v-model="email">
                            </div>
                            <div class="form-group">
                                <label for="role">Cargo</label>
                                <input type="text" class="form-control" id="rple" name="role" v-model="role">
                            </div>
                            <div class="form-group">
                                <label for="company">Empresa</label>
                                <input type="text" class="form-control" id="company" name="company" v-model="company">
                            </div>
                            <button type="button" class="btn btn-primary" v-on:click="addCustomer()">Salvar</button>
                        </form>
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
               name: '',
               email: '',
               role: '',
               company: '',
               url: '/api/customers'
           }
       },
       methods: {
           addCustomer() {
               console.log(this.name);

               fetch(this.url, {
                   method: 'post',
                   name: this.name,
                   email: this.email,
                   role: this.role,
                   company: this.company,
                headers: {
                    'Content-Type': 'application/json'
                },
                body:JSON.stringify({
                    name: this.name,
                    email: this.email,
                    role: this.role,
                    company: this.company
                })
               }).then((response) => response.json())
                    .then((res) => {
                    console.log(res);

                    }).catch((error) => {
                        console.error(error)
                });
           }
       }
    }
</script>
