<template>
	<div class="screenDemo">
        <h2>{{data.title}}</h2>
        <div v-html="data.main_copy"></div> 
    </div>
</template>
<script>
export default{
	props:{
    	data:{}
    }
}
</script>
<style languge="sass">
    .screenDemo{
        margin: 0 auto;
        border:1px solid #ccc;
        width:800px;
        height:600px;
        padding:20px;
    }

</style>