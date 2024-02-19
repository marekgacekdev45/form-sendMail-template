<template>
    <div class="flex justify-center items-center mt-40">
      <!-- <form @submit.prevent="form.post('/send-mail')"> -->
      <form @submit.prevent="submit">
        <div>
          <label for="email">Email:</label>
          <input id="email" type="email" v-model="form.email" />
        </div>
        <div>
          <label for="message">Message:</label>
          <textarea id="message" v-model="form.message"></textarea>
        </div>
        <div>
          <button type="submit" :disabled="form.processing">Send</button>
        </div>
      </form>
    </div>

    <div v-if="sendForm" class="text-center mt-12"><h1 class="text-red-600 text-5xl">formularz został wysłany</h1></div>

  </template>
  
  <script setup>
import { useForm } from '@inertiajs/vue3'
import { ref } from 'vue';

const form = useForm({
  email: '',
  message: '',
})

const sendForm = ref(false);

const submit = () => {
    form.post("/send-mail", {
        preserveScroll: true,
        onSuccess: () => {
            sendForm.value = !sendForm.value;
            console.log('udało się');
        },
    });
};


</script>