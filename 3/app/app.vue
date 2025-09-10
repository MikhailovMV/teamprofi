<style lang="scss">
@use "~/assets/scss/main.scss";
</style>
<template>
<h1>Vue</h1>
<div id="response" ref="myResponse"></div>
<center><img src="/img/flip-flop.gif" ref="myLoader"/></center>
<div id="hello">
</div>
<div v-for="(item, index) in items" :key="index" id="author">
<span>
  <span class="author">{{ item.name }} </span>
  <span class="author">{{ item.username }} </span>
  <span class="author">{{ item.email }} </span>
</span>
</div>
<div id="vue" v-html="helloElement"></div>
</template>
<script>
  import { mapGetters } from 'vuex';
  import axios from 'axios'

export default {
    data: () => {
      return {
        items: [{name: "Mikhail"}, {username: "Mikhailov"}, {email: "mikhailoff@inbox.ru"}]
      };
    },
    
    
  async mounted() {
    const itemsD = await this.fetchPeoples();
    const items = itemsD.data;
    console.log(items);

    function draw_cards(cards){
        cards.forEach(function(entry) {    
            document.getElementById("hello").innerHTML+=("<div class='border button'><span>" + entry.name + "</span><br/><span>" + entry.username + "</span><br/><span>" + entry.email + "</span><div>");
            console.log(entry.name + entry.username + entry.email);

        });
    }

    const myLoader = this.$refs.myLoader;
    let api = axios.create({
      baseURL: 'https://jsonplaceholder.typicode.com/users',
      success: myLoader.outerHTML = ""
    });
    
    let cards = Array();
    let u = api.get().then(value => {cards = value.data; draw_cards(cards);});  

        
  }, 
  methods: {
    async fetchPeoples() {
        const items = await axios.get(
          'https://jsonplaceholder.typicode.com/users',
        );
        return items;
      }

  },

  computed: {
      
  }
    
}



</script>