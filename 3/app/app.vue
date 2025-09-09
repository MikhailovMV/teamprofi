<style lang="scss">
@use "~/assets/scss/main.scss";
</style>
<template>
<h1>Vue</h1>
<div id="response" ref="myResponse"></div>
<center><img src="/img/flip-flop.gif" ref="myLoader"/></center>
<div id="hello">
</div>
<li v-for="card in cardt">
  {{ card }}
</li>
<!--li v-for="n in 10">
  {{ n }}
</li-->
<div id="vue" v-html="helloElement"></div>
</template>
<script language="javascript">
  import axios from 'axios'
 // let a = this.$axios.get('https://jsonplaceholder.typicode.com/users');//.then(data=>{console.log(data)});
  // Создаем экземпляр Axios с базовым URL
//let cardt = CardtFunc();
//const peoples = document.getElementById("hello").innerText;
function get_peoples(myResponse){
   // myResponse.innerText = "hhhhhhhhhhhhh";
    return 1;
}
   //cardt = new Array();
export default {
  data() {
    return {
  //    cardt: ,
      peoples: "",
    };
  },
    
    
  mounted() {
    function give_cards(){
      return
    }
    //console.log(cardt[0]);
    function draw_cards(cards){
        cards.forEach(function(entry) {    
            document.getElementById("hello").innerHTML+=("<div class='border'><span>" + entry.name + "</span><br/><span>" + entry.username + "</span><br/><span>" + entry.email + "</span><div>");
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
    console.log("=======");  
    console.log(u); 
        
  }, 
  methods: {

  },

  computed: {
      
  }
    
}



</script>