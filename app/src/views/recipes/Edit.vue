<template>
  <div class="home">
    <section class="container">
      <h1>Edition de la recette</h1>

      <div class="alert alert-danger" v-if="errors.length">
        <ul class="list-unstyled m-0">
          <li v-for="error in errors">
            <strong>{{ error.label }}</strong> {{ error.message }}
          </li>
        </ul>
      </div>

      <div @submit.prevent="onSubmit" v-html="form"></div>
      <button class="btn btn-success" type="submit" form="recipe">Valider</button>
    </section>
  </div>
</template>

<script>
  export default {
    name: 'EditRecipe',
    data() {
      return {
        form: null,
        errors: [],
      }
    },
    created() {
      fetch(`/api/recipes/${this.$route.params.id}/edit`)
        .then((response) => response.text())
        .then((data) => this.form = data);
    },
    methods: {
      onSubmit({ target }) {
        this.errors = [];
        const body = new FormData(target);

        fetch(`/api/recipes/${this.$route.params.id}/edit`, { method: 'POST', body })
          .then((response) => response.json())
          .then((data) => {
            if (data.errors) {
              this.errors = data.errors;
            } else {
              this.$router.push({ name: 'Recipes' });
            }
          });
      }
    }
  };
</script>
