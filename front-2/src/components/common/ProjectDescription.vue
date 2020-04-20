<template>
    <div class="row">
        <div class="col-md-6">
            <form
                    id="app"
                    @submit="checkForm"
                    method="post">
                <p class="form-group">
                    <label for="name">Project Name</label>
                    <input id="name" v-model="name" type="text" name="name" class="form-control"/>
                </p>

                <p class="form-group">
                    <label for="age">Durée</label>
                    <input id="age" v-model="time" type="number" name="age" min="0" class="form-control"/>
                </p>

                <p class="form-group">
                    <input type="submit" style="border: 1px solid black;border-radius: 10px;padding: 7px"
                           value="Submit"/>
                </p>
            </form>
            <div>
                <div style="display: flex;flex-direction: column;align-items: center" v-if="!loading">
                    <div v-for="pro in projects">
                        Nom :
                        <br>
                        <span style="margin: 0px 10px">{{ pro.name }}</span>
                        Durée :
                        <br>
                        <span style="margin: 0px 10px">{{ pro.time }}</span>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <form
                    id="app2"
                    @submit="checkClientForm"
                    method="post">
                <p class="form-group">
                    <label>Client Name</label>
                    <input v-model="nameClient" type="text" name="name" class="form-control"/>
                </p>


                <p class="form-group">
                    <input type="submit" style="border: 1px solid black;border-radius: 10px;padding: 7px"
                           value="Submit"/>
                </p>
            </form>
            <div>
                <div style="display: flex;flex-direction: column;align-items: center" v-if="!loadingClient">
                    <div v-for="cl in clients">
                        Nom du client :
                        <br>
                        <span style="margin: 0px 10px">{{ cl.name }}</span>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

  export default {
    name: 'ProjectDescription',
    data() {
      return {
        errors: [],
        name: null,
        nameClient :null,
        time: null,
        projects: [],
        loading: true,
        loadingClient: true,
        clients: []
      }
    },
    mounted() {
      axios.get('http://127.0.0.1:8002/api/project').then(response => {
        this.projects = response.data.data
        this.loading = false
      }).catch(error => {
        console.log(error)
      })

      axios.get('http://127.0.0.1:8002/api/client').then(response => {
        this.clients = response.data.data
        this.loadingClient = false
      }).catch(error => {
        console.log(error)
      })
    },
    methods: {
      checkForm(e) {

        this.errors = []

        if (!this.name) {
          this.errors.push('Name required.')
        }
        if (!this.age) {
          this.errors.push('Age required.')
        }
        console.log('ici')

        axios.post('http://127.0.0.1:8002/api/project', { name: this.name, time: this.time }).then(response => {
          console.log(response)
          axios.get('http://127.0.0.1:8002/api/project').then(response => {
            console.log(response.data.data)
            this.projects = response.data.data
            console.log(this.projects)
            this.loading = false
          }).catch(error => {
            console.log(error)
          }).finally(() => this.loading = false)
        }).catch(error => {
          console.log(error)
        }).finally(() => this.loading = false)

        e.preventDefault()
        return true
      },
      checkClientForm(e) {

        this.errors = []

        if (!this.name) {
          this.errors.push('Name required.')
        }

        console.log('ici')

        axios.post('http://127.0.0.1:8002/api/client', { name: this.nameClient }).then(response => {
          console.log(response)
          axios.get('http://127.0.0.1:8002/api/client').then(response => {
            console.log(response.data.data)
            this.clients = response.data.data
            this.loading = false
          }).catch(error => {
            console.log(error)
          })
        }).catch(error => {
          console.log(error)
        })

        e.preventDefault()
        return true
      }
    }
  }
</script>

<style>
    @import url("https://fonts.googleapis.com/css?family=Cookie");

    .bmc-button img {
        width: 27px !important;
        margin-bottom: 1px !important;
        box-shadow: none !important;
        border: none !important;
        vertical-align: middle !important;
    }

    .bmc-button {
        line-height: 36px !important;
        height: 37px !important;
        text-decoration: none !important;
        display: inline-flex !important;
        color: #ffffff !important;
        background-color: #ff813f !important;
        border-radius: 3px !important;
        border: 1px solid transparent !important;
        padding: 1px 9px !important;
        font-size: 22px !important;
        letter-spacing: 0.6px !important;
        margin: 0 auto !important;
        font-family: "Cookie", cursive !important;
        -webkit-box-sizing: border-box !important;
        box-sizing: border-box !important;
        -o-transition: 0.3s all linear !important;
        -webkit-transition: 0.3s all linear !important;
        -moz-transition: 0.3s all linear !important;
        -ms-transition: 0.3s all linear !important;
        transition: 0.3s all linear !important;
    }
</style>
