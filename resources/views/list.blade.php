<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


    <title>My英単語</title>
</head>
<body>
 <div id="app">
<div class="container">
<h1 class="main-title">My Business English Word</h1>
<label for="word">英単語</label>
<input v-model="word">
<label for="text">意味</label>
<input v-model="text">
<button type="button" @click="send()" class="btn-primary">登録</button>
<button class="answer-button" @mouseover="displayShow" @mouseleave="hiddenShow">Answer</button>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col"></th>
      <th scope="col">英語</th>
      <th scope="col">意味</th>
    </tr>
  </thead>
  <tbody>
  <tr v-for="(list,index) in lists" :key="index" >
    <td>@{{ index+1 }}</td>
    <td>@{{ list.word }}</td>
    <td v-show="show" >@{{ list.text }}</td>

  </tr>
  
  
  </tbody>
</table>




</div>
</div>
    
    
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
    <script>


new Vue({
    el:'#app',
    data:{
        word: '',
        text: '',
        lists: [],
        show: false,
    },
    methods: {
      
        send(){
            const url = '/ajax/send';
            const params = {
                word: this.word,
                text: this.text
            };
            axios.post(url,params)
            .then((response)=> {
                this.word = '';
                this.text = '';
            
                this.getWordLists();
            });
        },
        getWordLists(){
            const url ="/ajax/word";
            axios.get(url)
            .then((res) => {
                this.lists = res.data;
            });
          
        },
        displayShow(){
                this.show = true;
        },
        hiddenShow(){
                this.show = false;
        },
       
    },
    mounted(){
        this.getWordLists();
    }

})

</script>
<style>
.table{
    margin-top:20px;
}
.main-title{
    margin-bottom:20px;
}
.container{
    border:solid 3px ;
    background-color:lightgreen;
}
.answer-button{
    margin-left:10px;
    padding:0 50px 0 50px;
    position:fixed;
}
</style>