<template>
  <div>
    <form @submit.prevent="handleSubmit">
      <input v-model="newAssignment" placeholder="Enter new assignment" />
      <button type="submit">Add Assignment</button>
    </form>
  </div>
</template>
<script>
export default {
  data() {
    return {
      newAssignment: ''
    };
  },
  methods: {
    handleSubmit() {
      this.$emit('add-assignment', this.newAssignment);
      this.newAssignment = '';
    }
  }
};
</script>

<style scoped>
/* Add your styles here */
</style>
