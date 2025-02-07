import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import router from './routes.js'
import { defineRule, configure } from 'vee-validate'
import { required, integer, regex } from '@vee-validate/rules'

// Define the validation rules
defineRule('required', required)
defineRule('integer', integer)
defineRule('decimal', regex)

// Configure global options
configure({
  generateMessage: (context) => {
    switch (context.rule) {
      case 'required':
        return `${context.field} is required`;
      case 'integer':
        return `${context.field} must be a whole number`;
      case 'decimal':
        return `${context.field} must be a decimal number`;
      default:
        return `${context.field} is not valid`;
    }
  }
})

const app = createApp(App)
app.use(router)
app.mount('#app')