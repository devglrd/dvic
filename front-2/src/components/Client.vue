<template>
  <div>
    <form
      id="app"
      @submit="checkForm"
      action="https://vuejs.org/"
      method="post">
      <p>
        <label for="name">Project Name</label>
        <input id="name" v-model="name" type="text" name="name" />
      </p>

      <p>
        <label for="age">Durée</label>
        <input id="age" v-model="time" type="number" name="age" min="0" />
      </p>

      <p>
        <input type="submit" value="Submit" />
      </p>
    </form>
  </div>
</template>

<script>
export default {
  name: "ProjectDescription",
  data() {
    return {
      errors: [],
      name: null,
      time: null
    };
  },
  methods: {
    checkForm(e) {
      if (this.name && this.age) {
        return true;
      }

      this.errors = [];

      if (!this.name) {
        this.errors.push("Name required.");
      }
      if (!this.age) {
        this.errors.push("Age required.");
      }
      console.log("ici");

      e.preventDefault();
      return true;
    }
  }
};
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
