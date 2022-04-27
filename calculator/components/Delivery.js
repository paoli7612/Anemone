// Pulsante.js
export default {
  props: ['title', 'color'],
  data() {
    return {
    }
  },
  template: `<Item :color="color" :title=title :class="delivery"></Item>`
}