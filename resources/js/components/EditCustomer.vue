<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Edit Customers
                                <a href="/customers" class="btn btn-dark text-right">Back</a>
                        </div>
                    <div class="card-body">
                       <form method="PATCH">

                           <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" v-model="name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" v-model="email">
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <input type="text" class="form-control" id="role" name="role" v-model="role">
                            </div>
                            <div class="form-group">
                                <label for="company">Company</label>
                                <input type="text" class="form-control" id="company" name="company" v-model="company">
                            </div>
                            <button type="button" class="btn btn-primary" v-on:click="editCustomer()">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['id'],
       data() {
           return {
               name: '',
               email: '',
               role: '',
               company: '',
               url: '/api/customers/'+this.id,
           }
       },
       mounted() {
           console.log(this.id);

          fetch(this.url, {
                   method: 'get',
                   name: this.name,
                   email: this.email,
                   role: this.role,
                   company: this.company,
                headers: {
                    'Content-Type': 'application/json'
                },
               }).then((response) => response.json())
                    .then((res) => {
                        var customer = res;
                        this.name = customer.name,
                        this.email = customer.email,
                        this.role = customer.role,
                        this.company = customer.company
                    console.log(res);

                    }).catch((error) => {
                        console.error(error)
                });
       },
       methods: {
           editCustomer() {
               console.log(this.name);

               fetch(this.url, {
                   method: 'PATCH',
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
