<template>
  <div class="home">
    <section class="container">
      <h1>Recettes</h1>

      <div class="btn-toolbar">
        <div class="btn-group">
          <router-link to="/recipes/new" class="btn btn-outline-primary">Nouvelle</router-link>
        </div>
      </div>

      <table class="table">
        <tr><th>Id</th><th>Nom</th><th>Actions</th></tr>
        <tr v-for="(recipe, index) in recipes" :key="index">
          <td>{{ recipe.id }}</td>
          <td>{{ recipe.name }}</td>
          <td>
            <router-link :to="'/recipes/' + recipe.id + '/edit'" class="btn btn-outline-primary">Editer</router-link>
            <DeleteButton :url="'/api/recipes/' + recipe.id"></DeleteButton>
          </td>
        </tr>
      </table>
    </section>
  </div>
</template>

<script>
  import DeleteButton from "../components/DeleteButton";

  export default {
    name: 'Recipes',
    data() {
      return {
        recipes: [],
      }
    },
    created() {
      fetch('/api/recipes/')
        .then((response) => response.json())
        .then((data) => this.recipes = data.recipes);
    },
    components: {
      DeleteButton,
    }
  };
</script>
