import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from '../views/Home.vue';
import Recipes from "../views/Recipes";
import NewRecipe from '../views/recipes/New';
import EditRecipe from "../views/recipes/Edit";

Vue.use(VueRouter);

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
  },
  {
    path: '/recipes',
    name: 'Recipes',
    component: Recipes,
  },
  {
    path: '/recipes/new',
    name: 'NewRecipe',
    component: NewRecipe,
  },
  {
    path: '/recipes/:id/edit',
    name: 'EditRecipe',
    component: EditRecipe,
  }
];

const router = new VueRouter({
  routes,
});

export default router;
