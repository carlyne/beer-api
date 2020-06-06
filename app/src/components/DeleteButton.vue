<template>
  <button class="btn btn-outline-danger" @click="onClick">Supprimer</button>
</template>

<script>
  export default {
    name: 'DeleteButton',
    props: {
      url: {
        type: String,
        required: true,
      }
    },
    methods: {
      onClick() {
        if (confirm('Voulez vous vraiment supprimer ceci ?')) {
          fetch(this.url, { method: 'DELETE' })
            .then(() => this.$router.go());
        }
      }
    }
  };
</script>
