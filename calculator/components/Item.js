// Pulsante.js
export default {
  props: ['title', 'color'],
  methods: {
    ccolor: function() {
      return 'w3-' + (this.color ?? 'grey')
    }
  },
  data() {
    return {
      'asd': 'w3-green'
    }
  },
  template: `<button class="w3-button w3-card w3-round-large" :class="ccolor()">{{ title }}</button>`
}